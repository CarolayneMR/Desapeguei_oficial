<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Desapeguei</title>

</head>

<body class="antialiased py-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 font-bold">
        <nav class="relative z-50 sm:top-0 flex justify-between text-xl">
            <h1>Desapeguei!</h1>
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Cadastre-se</a>
                        @endif
                    @endauth
        </nav>
    </div>
    @endif
    <main>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10">
            <h1 class="font-bold text-2xl">
                <span class="text-blue-500">Doar</span>
                ou
                <span class="text-blue-500">Reciclar</span>
                eletrônicos preserva nossos recursos naturais.
            </h1>
            <p class="text-xl">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                unknown printer
                took a galley of type and scrambled it to make a type specimen book.</p>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded"">SAIBA
                MAIS</button>
                <div>
                    @foreach (\App\Models\Objeto::all() as $objeto)
                    <span>
                        {{ $objeto->nome }}
                        -
                        {{ $objeto->descricao }}
                        -
                        {{ $objeto->cep }}
                        -
                        {{ $objeto->tipo_id }}
                        <button>
                    <a href="{{ url('/agendamento/agenda') }}">
                                REALIZAR AGENDAMENTO 
                        </button>    
                    </span>
                    @endforeach
                </div>
        </div>
    </main>
</body>

</html>
