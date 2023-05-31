<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Realize seu agendamento!') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl m-auto mt-2 p-2 mb-2">
        <h1 class="mb-4 text-2xl font-bold tracking-tight text-black">{{ $objeto->nome }}</h1>
        <form action="{{ route('agendamentos.store', $objeto) }}" method="POST">
            @csrf
            <div>
                <label class="font-medium mb-2" for="data">Selecione a data e o horário desejado:</label>
                <input id="data" class="mb-2 text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500"
                    type="datetime-local" name="data" required autofocus />
            </div>
            <div>
                <button
                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Realizar agendamento</button>
            </div>
        </form>
    </div>
</x-app-layout>
