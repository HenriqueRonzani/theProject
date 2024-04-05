<x-app-layout>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        $(document).ready(function(){
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Realizar Cadastro') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{route('datas.store')}}">
                        @csrf

                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block my-1 w-full" type="text" name="nome"  required autofocus/>
    
                        <div class="flex w-11/12 mx-auto">
                            <div class="flex-1 w-1/3 mr-3">
                                <x-input-label for="idade" class="flex-1" :value="__('Idade')" />
                                <x-text-input id="idade" class="my-1 w-full" type="text" name="idade"  required autofocus/>
                            </div>

                            <div class="flex-1 w-1/3 mx-3">
                                <x-input-label for="cargo" :value="__('Cargo')" />
                                <x-text-input id="cargo" class=" my-1 w-full" type="text" name="cargo"  required autofocus/>
                            </div>

                            <div class="flex-1 w-1/3 ml-3">
                                <x-input-label for="telefone" :value="__('Telefone')" />
                                
                                <x-text-input id="telefone" class=" my-1 w-full" type="tel" name="telefone" placeholder="( )     -    " required autofocus/>
                            </div>
                            
                        </div>

                        <x-primary-button class="ml-0 mt-2">
                            {{ __('Registrar dados') }}
                        </x-primary-button>
                    
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>