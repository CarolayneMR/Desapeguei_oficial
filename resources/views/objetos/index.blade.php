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
                <label for="descricao" :value="__('Objeto descricao')" />
                <input id="descricao" class="block mt-1 w-full" type="text" name="descricao" required autofocus />
            </div>
            <div>
                <label for="tipo" :value="__('Objeto tipo')" />
                <input id="tipo" class="block mt-1 w-full" type="text" name="tipo" required autofocus />
            </div>
            <div>
                <button class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded">Fazer doação</button>
            </div>
        </form>
    </div>
</x-app-layout>