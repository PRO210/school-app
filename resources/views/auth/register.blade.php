<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <p class=" text-center m-2"><b>Registro de Novos Membros</b></p>
        <p><strong>Plano:</strong> {{ session('plan')->name ?? '-' }}</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Cnpj -->
            <div>
                <x-label for="cnpj" :value="__('Cnpj')" />
                <x-input id="cnpj" class="block mt-1 w-full" type="number" min="0" name="cnpj"  :value="old('cnpj')" required autofocus />
            </div>
            <!-- Empresa -->
            <div>
                <x-label for="empresa" :value="__('Empresa')" />
                <x-input id="empresa" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')" required  />
            </div>
            <!-- Empresa -->
            <div>
                <x-label for="empresa_email" :value="__('E-mail da Empresa')" />
                <x-input id="empresa_email" class="block mt-1 w-full" type="email" name="empresa_email" :value="old('empresa_email')" required  />
            </div>
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Gestor')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required  />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"  type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
