<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Realize sua doação!') }}
        </h2>
    </x-slot>

    <div class="container p-7 mt-9 m-auto w-1/2 bg-white shadow-md rounded-lg border border-gray-200">
        <div class="p-1 border-dashed border-4 border-gray-300">

            <h1 class="flex flex-col text-center mb-2 p-2 w-full text-3xl font-extrabold text-gray-800 border bg-gray-100">Fazendo uma doação</h1>
            <div class="max-w-3xl m-auto mt-2 p-2">
                <form action="{{ route('objetos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label class="font-medium mb-2" for="nome">Nome:</label>
                        <input class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500" id="nome" type="text"
                            name="nome" placeholder="Nome do objeto" required autofocus />
                    </div>
                    <div class="mb-6">
                        <label class="font-medium mb-2" for="descricao">Descrição:</label>
                        <input class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500" id="descricao" type="text"
                            name="descricao" placeholder="Descrição do objeto" required autofocus />
                    </div>
                    <div class="mb-6">
                        <label class="font-medium mb-2" for="imagem">Selecione uma imagem</label>
                        <input class="text-sm rounded-lg w-full p-2.5 border cursor-pointer bg-gray-100 border-blue-500"
                            id="imagem" type="file" name="imagem" required autofocus>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <label class="font-medium mb-2" for="cep">CEP:</label>
                            <input class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500" id="cep" type="text"
                                name="cep" placeholder="00000-000" required autofocus />
                        </div>
                        <div class="mb-6">
                            <label class="font-medium mb-2" for="tipo">Selecione o tipo do objeto</label>
                            <select class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500" name="tipo"
                                id="tipo">
                                @foreach (\App\Models\Tipo::all() as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify justify-between items-center pb-2">
                        <button class="flex w-full px-4 py-4 items-center text-white rounded-lg bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none
                        focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <span>Realizar doação</span>
                            <div class="flex px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </div>
                        </button>
                    </div>               
                </form>
            </div>
        </div>
    </div>
</x-app-layout>