@vite(['resources/js/gatherData.js', 'resources/js/deleteData.js'])

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $(document).ready(function(){
        $('#contato').mask('(00) 00000-0000');
    });
</script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tela inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-11/12 mx-auto shadow-md">
                        @if(!count($datas) == 0)
                            <tr class="border-x border-slate-900 shadow-md">
                                <th class="bg-slate-50 border"><a class="border-b bg-slate border-slate-500">Nome</a></th>
                                <th class="bg-slate-50 border"><a class="border-b bg-slate border-slate-500">Bairro</a></th>
                                <th class="bg-slate-50 border"><a class="border-b bg-slate border-slate-500">Contato</a></th>
                                <th class="bg-slate-50 border"><a class="border-b bg-slate border-slate-500">Liderança</a></th>
                                <th class="bg-slate-50 border"><a class="border-b bg-slate border-slate-500">Resultado</a></th>
                            </tr>

                            @foreach ($datas as $data)
                                @php
                                    $count++;
                                @endphp
                                    @if ($count % 2 == 0 )
                                        <tr class="text-center justify-evenly bg-slate-200" x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'user-data')" data-id="{{$data->id}}">
                                    @else
                                        <tr class="text-center justify-evenly mt-2" x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'user-data')" data-id="{{$data->id}}">
                                    @endif
                                            <td class="w-1/5 h-10 border-r border-slate-300 name">{{ $data->nome }}</td>
                                            <td class="w-1/5 h-10 border-x border-slate-300 bairro">{{ $data->bairro}}</td>
                                            <td class="w-1/5 h-10 border-x border-slate-300 contato">{{ $data->contato}}</td>
                                            <td class="w-1/5 h-10 border-x border-slate-300 lideranca">{{ $data->lideranca}}</td>
                                            <td class="w-1/5 h-10 border-l border-slate-300 resultado">{{ $data->resultado}}</td>
                                        </tr>
                            @endforeach
                        @else
                            <div class="w-fit mx-auto">
                                <h2 class="text-gray-500">{{ 'Nenhum dado encontrado'}}</h2>
                            </div>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<x-modal name="user-data" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <div class="m-6">
        <form method="post" action="{{ route('datas.update') }}">
            @csrf
            @method('patch')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Alterar dados cadastrados') }}
            </h2>

            <input type="hidden" id="_id" name="_id" value="">

            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block my-1 w-full" type="text" name="nome"  required autofocus/>

            <x-input-label for="bairro" :value="__('Bairro')" />
            <x-text-input id="bairro" class="block my-1 w-full" type="text" name="bairro"  required autofocus/>

            <div class="flex w-11/12 mx-auto">
                <div class="flex-1 w-1/3 mr-3">
                    <x-input-label for="contato" class="flex-1" :value="__('Contato')" />
                    <x-text-input id="contato" class="my-1 w-full" type="tel" name="contato" placeholder="( )     -    " required autofocus/>
                </div>

                <div class="flex-1 w-1/3 mx-3">
                    <x-input-label for="lideranca" :value="__('Liderança')" />
                    <x-text-input id="lideranca" class=" my-1 w-full" type="text" name="lideranca" required autofocus/>
                </div>

                <div class="flex-1 w-1/3 ml-3">
                    <x-input-label for="resultado" :value="__('Resultado')" />

                    <x-text-input id="resultado" class=" my-1 w-full" type="text" name="resultado" required autofocus/>
                </div>

            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="mx-2">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button additional-classes="mx-2 focus:ring-red-500 bg-blue-500 hover:bg-blue-600">
                    {{ __('Atualizar dados') }}
                </x-danger-button>

                <x-secondary-button id="deleteButton" data-route="{{route('datas.destroy')}}" class="mx-2 bg-red-600 hover:bg-red-500 text-white">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </div>
</x-modal>
