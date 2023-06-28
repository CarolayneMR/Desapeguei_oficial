<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus objetos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('msg'))
        <div class="flex p-4 mb-4 text-sm text-white rounded-lg bg-green-600" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            <span class="px-1 font-bold text-base">
                {{ session('msg') }}
            </span>
        </div>
    @endif
        <div x-data="{ existeObj: false }" class="px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
            @foreach (\App\Models\Objeto::all() as $objeto)
                @if ($objeto->user_id == auth()->id())
                    <div x-model="existeObj = true" x-data="{ editMode: false, showDelete: false }">
                        <div>
                            <template x-if="!editMode">
                                <span>
                                    <div
                                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                                        <img class="md:w-full" src="/img/objetos/{{ $objeto->imagem }}"
                                            alt="Imagem do objeto" />
                                        </a>
                                        <div class="p-5">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                                {{ $objeto->nome }} </h5>
                                            <p class="mb-3 font-normal text-gray-700">
                                                Descrição: {{ $objeto->descricao }}
                                                <br>
                                                CEP do doador: {{ $objeto->cep }}
                                                <br>
                                                Tipo do objeto: {{ $objeto->tipos->descricao }}
                                            </p>
                                            <template x-if="!editMode">
                                                <div class="cursor-pointer inline-flex items-center w-full px-24 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none"
                                                    @click="editMode = true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                    <span class="px-1">Editar</span>
                                                </div>
                                            </template>
                                            <div class="py-2">
                                                <button @click="showDelete = true"
                                                    class="cursor-pointer inline-flex items-center w-full px-24 py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                    <span class="px-1">Excluir</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </template>
                            <div x-show="editMode"
                                class="absolute top-0 bottom-0 left-0 right-0 bg-gray-900 bg-opacity-20 z-0">
                                <div class="md:w-96 bg-white p-4 relative rounded-lg left-1/3 right-1/3 top-1/4 z-50">
                                    <button type="button" @click="editMode = false"
                                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="editModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Fechar</span>
                                    </button>
                                    <h3 class="text-lg font-medium text-black">Atualize as informações!
                                    </h3>
                                    <form action="{{ route('objetos.update', $objeto) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="py-1">
                                            <label class="font-medium mb-2" for="nome">Nome:</label>
                                            <input class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500"
                                                type="text" name="nome" value="{{ $objeto->nome }}" />
                                        </div>
                                        <div class="py-1">
                                            <label class="font-medium mb-2" for="descricao">Descrição:</label>
                                            <input class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500"
                                                type="text" name="descricao" value="{{ $objeto->descricao }}" />
                                        </div>
                                        <div class="py-1">
                                            <label class="font-medium mb-2" for="imagem">Selecione uma imagem</label>
                                            <input class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500"
                                                type="file" id="imagem" name="imagem">
                                        </div>
                                        <div class="py-1">
                                            <label class="font-medium mb-2" for="cep">CEP:</label>
                                            <input class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500"
                                                type="text" name="cep" value="{{ $objeto->cep }}" />
                                        </div>
                                        <div class="py-1">
                                            <label class="font-medium mb-2" for="tipo">Selecione o tipo do
                                                objeto</label>
                                            <select class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500"
                                                name="tipo" id="tipo">
                                                @foreach (\App\Models\Tipo::all() as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->descricao }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="py-1">
                                            <button
                                                class="w-full py-2 px-3 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-900">Salvar</button>
                                        </div>
                                    </form>
                                    <div class="py-1">
                                        <button
                                            class="w-full py-2 px-3 text-sm font-medium text-gray-800 bg-transparent rounded-lg border border-gray-500 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                            @click="editMode = false">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-show="showDelete"
                            class="absolute top-0 bottom-0 left-0 right-0 bg-gray-900 bg-opacity-20 z-0">
                            <div class="md:w-96 bg-white p-4 relative rounded-lg left-1/3 right-1/3 top-1/4 z-50">
                                <form class="py-2 w-full text-center"
                                    action="{{ route('objetos.destroy', $objeto) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" @click="showDelete = false"
                                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="deleteModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Fechar</span>
                                    </button>
                                    <svg class="text-black dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                        aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="mb-4 text-black">Tem certeza que deseja excluir
                                        este objeto?</p>
                                    <button @click="showDelete = true"
                                        class="w-full py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Sim,
                                        tenho certeza</button>
                                </form>
                                <button
                                    class="w-full py-2 px-3 text-sm font-medium text-gray-800 bg-transparent rounded-lg border border-gray-500 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                    @click="showDelete = false">Não, cancelar</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div x-show="existeObj == false">Você não possui objetos.</div>
        </div>
    </div>
</x-app-layout>
