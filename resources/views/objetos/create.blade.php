<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Doa aí meu irmão') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl m-auto mt-2 p-2">
        <form action="{{ route('objetos.store') }}" method="POST">
            @csrf
            <div>
                <x-label for="nome" :value="__('Nome')" />
                <input id="nome" class="block mb-2 w-full" type="text" name="nome" required autofocus />
            </div>
            <div>
                <x-label for="descricao" :value="__('Descrição')" />
                <input id="descricao" class="block mb-2 w-full" type="text" name="descricao" required autofocus />
            </div>
            <div>
                <x-label for="cep" :value="__('CEP')" />
                <input id="cep" class="block mb-2 w-full" type="text" name="cep" required autofocus />
            </div>
            <div> 
                <x-label for="tipo" :value="__('Tipo de objeto')" />
                <select name="tipo" id="tipo" class="mb-2">
                    @foreach (\App\Models\Tipo::all() as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Fazer doação</button>
            </div>
        </form>
    </div>
</x-app-layout>