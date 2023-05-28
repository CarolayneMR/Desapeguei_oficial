<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <a class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded" href="/objetos/create">Doar objeto</a>
        </div>
        <div class="py-4">
            @foreach (\App\Models\Objeto::all() as $objeto)
                <span>
                    <img src="/img/objetos/{{ $objeto->imagem }}" alt="Imagem do objeto">
                    {{ $objeto->nome }}
                    -
                    {{ $objeto->descricao }}
                    -
                    {{ $objeto->cep }}
                    -
                    {{ $objeto->tipo_id }}
                    <button>
                        <a href="/objetos/{{ $objeto->id }}">Realizar agendamento</a>
                    </button>
                </span>
            @endforeach
        </div>
    </div>
</x-app-layout>
