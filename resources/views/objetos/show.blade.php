<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Realize seu agendamento') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl m-auto mt-2 p-2">
        <h1>{{ $objeto->nome }}</h1>
        <form action="{{ route('agendamentos.store', $objeto) }}" method="POST">
            @csrf
            <div>
                <x-label for="data" :value="__('Data')" />
                <input id="data" class="block mb-2 w-full" type="datetime-local" name="data" required autofocus />
            </div>
            <div>
                <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Realizar agendamento</button>
            </div>
        </form>
    </div>
</x-app-layout>