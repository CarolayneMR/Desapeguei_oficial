<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--<x-welcome />-->
                <h1>Uns objeto aí</h1>
                <div class="flex flex-col gap-2">
                @foreach (\App\Models\Objeto::all() as $objeto)
                    <div class="bg-gray-300 grid grid-cols-8 text-center p-2 relative">
                        <div class="col-span-6 text-left">
                                <span>
                                    Descrição: {{ $objeto->descricao }}
                                    -
                                    Tipo: {{ $objeto->tipo_id }}
                                </span>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div>
                <a class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded" href="/objetos/create">Doar</a>
            </div>
        </div>
        
    </div>
</x-app-layout>
