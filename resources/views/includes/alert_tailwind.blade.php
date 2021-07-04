<!-- Button trigger modal -->
{{-- <button type="button"
    class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-blue-600"
    data-toggle="modal" data-target="#myModal">
    Launch modal two
</button> --}}
<style>
    .modal {
        z-index: 1072;
        @apply hidden fixed top-0 left-0 w-full h-full outline-none
    }

    .modal.show {
        @apply block
    }

    .modal-backdrop {
        z-index: 1040;
        width: 100vw;
        height: 100vh;
        @apply fixed bg-black top-0 left-0
    }

    .modal-backdrop.fade {
        @apply opacity-0
    }

    .modal-backdrop.show {
        @apply opacity-50
    }

    .modal.fade .modal-dialog {
        transition: -webkit-transform .3s ease-out;
        transition: transform .3s ease-out;
        transition: transform .3s ease-out, -webkit-transform .3s ease-out;
        -webkit-transform: translate(0, -50px);
        transform: translate(0, -50px);
    }

    .modal.show .modal-dialog {
        -webkit-transform: none;
        transform: none;
    }

</style>

@if (session('message'))
    <!-- Modal -->
    <div class="modal hidden fixed top-0 left-0 w-full h-full outline-none fade" id="myModal" tabindex="-1"
        role="dialog">
        <div class="modal-dialog relative w-auto pointer-events-none max-w-lg my-8 mx-auto px-4 sm:px-0"
            role="document">
            <div class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 rounded-lg">
                <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
                    <h5 class="mb-0 text-lg leading-normal"><b>Avisos</b></h5>
                    {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                </div>
                <div class="relative flex p-4 ">
                    <div
                        class="text-white text-center font-extrabold text-lg px-4 py-4 border-0 rounded relative bg-green-600 w-full">
                        <span> <b>{{ session('message') }}</b></span>
                    </div>
                </div>
                <div class="flex items-center justify-end p-4 border-t border-gray-300">
                    {{-- <button type="button"
                    class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-gray-600 mr-2"
                    data-dismiss="modal">Close</button> --}}
                    {{-- <button type="button"
                    class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-blue-600">Save
                    changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        $(document).ready(function() {

            $('#myModal').modal('show');

            setTimeout(function() {
                $('#myModal').modal('hide');
            }, 5000)
        });

    </script>

    @php
        session()->forget('message');
    @endphp

@endif


@if (session('error'))
    <!-- Modal -->
    <div class="modal hidden fixed top-0 left-0 w-full h-full outline-none fade" id="myModal_02" tabindex="-1"
        role="dialog">
        <div class="modal-dialog relative w-auto pointer-events-none max-w-lg my-8 mx-auto px-4 sm:px-0"
            role="document">
            <div class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 rounded-lg">
                <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
                    <h5 class="mb-0 text-lg leading-normal"><b>Avisos</b></h5>
                    {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                </div>
                <div class="relative flex p-4 ">
                    <div
                        class="text-white text-center font-extrabold text-lg px-4 py-4 border-0 rounded relative bg-red-500 w-full">
                        <span> <b>{{ session('error') }}</b></span>
                    </div>
                </div>
                <div class="flex items-center justify-end p-4 border-t border-gray-300">
                    {{-- <button type="button"
                    class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-gray-600 mr-2"
                    data-dismiss="modal">Close</button> --}}
                    {{-- <button type="button"
                    class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-blue-600">Save
                    changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('#myModal_02').modal('show');
            setTimeout(function() {
                $('#myModal_02').modal('hide');
            }, 5000)
        });

    </script>

@endif

@if ($errors->any())
    <div class="container alert alert-warning text-center " id="errors">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>

    <script type='text/javascript'>
        $(document).ready(function() {
            setTimeout(function() {
                $('#errors').hide();
            }, 10000)
        });

    </script>
@endif
