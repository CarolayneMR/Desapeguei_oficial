<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus objetos') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col gap-2">
                @foreach (\App\Models\Objeto::all() as $objeto)
                    @if ($objeto->user_id == auth()->id())
                        <div class="bg-gray-300 grid grid-cols-8 text-center p-2 relative" x-data="{ editMode: false }">
                            <div class="col-span-6 text-left">
                                <template x-if="!editMode">
                                    <span>
                                        {{ $objeto->nome }}
                                        -
                                        {{ $objeto->descricao }}
                                        -
                                        {{ $objeto->cep }}
                                        -
                                        {{ $objeto->tipos->descricao }}

                                        <img src="/img/objetos/{{ $objeto->imagem }}" alt="Imagem do objeto">
                                    </span>
                                </template>
                                <template x-if="editMode">
                                    <form 
                                        action="{{ route('objetos.update', $objeto) }}" 
                                        method="POST" 
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        @method('PUT')
                                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="nome" value="{{ $objeto->nome }}" />
                                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="descricao" value="{{ $objeto->descricao }}" />
                                        <input type="file" id="imagem" name="imagem">
                                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="cep" value="{{ $objeto->cep }}" />
                                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="tipo" id="tipo">
                                            @foreach (\App\Models\Tipo::all() as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                                            @endforeach
                                        </select>
                                        <button>Salvar</button>
                                    </form>
                                </template>
                            </div>
                            <template x-if="!editMode">
                                <div class="cursor-pointer hover:bg-gray-700 hover:text-white" @click="editMode = true">
                                    Editar
                                </div>
                            </template>
                            <template x-if="editMode">
                                <div class="cursor-pointer hover:bg-gray-700 hover:text-white" @click="editMode = false">
                                    Cancelar
                                </div>
                            </template>
                            <div class="cursor-pointer hover:bg-red-700 hover:text-white">
                                <form 
                                    action="{{ route('objetos.destroy', $objeto) }}" 
                                    method="POST" 
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button>Excluir</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>          
      </div>
    </div>
</x-app-layout>