<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Realize seu agendamento!') }}
        </h2>
    </x-slot>

    <div class="container p-7 mt-9 m-auto w-2/6 bg-white shadow-md rounded-lg border border-gray-200">
        <div class="p-1 border-dashed border-4 border-gray-300">        
            <div class="p-5">
                <div class="pb-2 flex">
                    <!---
                    <div class="flex pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    --->
                    <span class="text-2xl text-center bg-slate-100 w-full">Você está <b>agendando</b> o seguinte objeto: </span>
                </div>
                <img class="md:w-full" src="/img/objetos/{{ $objeto->imagem }}"
                                            alt="Imagem do objeto" />
                <h1 class="text-3xl font-bold items-center text-center font-mono text-blue-600 pt-2 cursor-pointer">{{ $objeto->nome }}</h1>

                <div class="max-w-xl m-auto mt-2 p-2">
                    <form action="{{ route('agendamentos.store', $objeto) }}" method="POST">
                        @csrf
                        <div>
                            <label class="font-medium mb-8" for="data">Selecione a data e o horário desejado:</label>
                            <input id="data" class="mb-2 text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500"
                                type="datetime-local" min="{{ now()->setTimezone('America/Sao_Paulo')->format('Y-m-d\TH:i') }}" name="data" required autofocus />
                        </div>
                        <div>
                            <button
                                class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Realizar agendamento</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>