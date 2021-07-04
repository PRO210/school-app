    <div class="md:flex md:items-center mb-6">
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name">Nome:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="inline-full-name" type="text"  name="name" placeholder="Nome da Empresa"
                value="{{ $tenant->name ?? old('name') }}">
        </div>
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for=""> Cadastro:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="" type="text" placeholder="CADASTRO" name="CADASTRO" value="{{ $tenant->CADASTRO ?? old('CADASTRO') }}">
        </div>
    </div>

    <div class="md:flex md:items-center mb-6">
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name">Logo:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="inline-full-name" type="file" name="logo" placeholder="Logo da Empresa" value="">
        </div>
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for=""> Timbre:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="" type="file" placeholder="Timbre da Empresa" name="timbre" value="">
        </div>
    </div>
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name">Email:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="inline-full-name" type="email" name="email" placeholder="Email da Empresa"
                value="{{ $tenant->email ?? old('email') }}">
        </div>
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for=""> Cnpj:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="" type="number" placeholder="Cnpj da Empresa" name="cnpj"
                value="{{ $tenant->cnpj ?? old('cnpj') }}">
        </div>
    </div>
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name">ATO:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="inline-full-name" type="text" name="ATO" placeholder="Ato de Funcionamento"
                value="{{ $tenant->ATO ?? old('ATO') }}">
        </div>
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for=""> DO:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="" type="date" placeholder="Diário Oficial" name="DO" value="{{ $tenant->DO ?? old('DO') }}">
        </div>
    </div>
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name">ENDEREÇO:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="inline-full-name" type="text" name="ENDERECO" placeholder="Rua Exemplo, nº XX "
                value="{{ $tenant->ENDERECO ?? old('ENDERECO') }}">
        </div>
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="">CEP:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="" type="text" placeholder="XXXXX-XXX" name="CEP" value="{{ $tenant->CEP ?? old('CEP') }}">
        </div>
    </div>
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name">ESTADO:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="inline-full-name" type="text" name="ESTADO" placeholder=" "  value="{{ $tenant->ESTADO ?? old('ESTADO') }}">
        </div>
        <div class="md:w-2/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="">CIDADE:</label>
        </div>
        <div class="md:w-4/6">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="" type="text" placeholder="" name="CIDADE" value="{{ $tenant->CIDADE ?? old('CIDADE') }}">
        </div>
    </div>
    <div class="md:flex md:items-center mb-12">
        <div class="md:w-2/12">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">Ativo?</label>
        </div>
        <div class="md:w-4/12">
            <select name="active" class="form-control">
                <option value="Y" @if (isset($tenant) && $tenant->active == 'Y') selected @endif>SIM</option>
                <option value="N" @if (isset($tenant) && $tenant->active == 'N') selected @endif>Não</option>
            </select>
        </div>
        <div class="md:w-2/12">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">INEP</label>
        </div>
        <div class="md:w-4/12">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="" type="number" placeholder="" name="INEP" value="{{ $tenant->INEP ?? old('INEP') }}">
        </div>

    </div>

    <hr>
    <h3>Assinatura</h3>
    <div class="">
        <label>Data Assinatura (início):</label>
        <input type="date" name="subscription" class="form-control" placeholder="Data Assinatura (início):"
            value="{{ $tenant->subscription ?? old('subscription') }}">
    </div>
    <div class="">
        <label>Expira (final):</label>
        <input type="date" name="expires_at" class="form-control" placeholder="Expira:"
            value="{{ $tenant->expires_at ?? old('expires_at') }}">
    </div>
    <div class="">
        <label>Identificador:</label>
        <input type="text" name="subscription_id" class="form-control" placeholder="Identificador:"
            value="{{ $tenant->subscription_id ?? old('subscription_id') }}">
    </div>
    <div class="">
        <label>* Assinatura Ativa?</label>
        <select name="subscription_active" class="form-control">
            <option value="1" @if (isset($tenant) && $tenant->subscription_active) selected @endif>SIM</option>
            <option value="0" @if (isset($tenant) && !$tenant->subscription_active) selected @endif>Não</option>
        </select>
    </div>
    <div class="">
        <label>* Assinatura Cancelada?</label>
        <select name="subscription_suspended" class="form-control">
            <option value="1" @if (isset($tenant) && $tenant->subscription_suspended) selected @endif>SIM</option>
            <option value="0" @if (isset($tenant) && !$tenant->subscription_suspended) selected @endif>Não</option>
        </select>
    </div>
    <div class="">
        <button type="submit" class="btn btn-outline-success btn-block" onclick="return atualizar()">Atualizar</button>
    </div>
