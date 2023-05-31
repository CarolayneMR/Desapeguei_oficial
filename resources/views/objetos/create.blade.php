<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Realize sua doação!') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl m-auto mt-2 p-2">
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
            <div class="mb-6">
                <label class="font-medium mb-2" for="cep">CEP:</label>
                <input class="text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500" id="cep" type="text"
                    name="cep" placeholder="Ex: 00000-000" required autofocus />
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
            <div>
                <button
                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Realizar doação</button>
            </div>
        </form>
    </div>
</x-app-layout>
