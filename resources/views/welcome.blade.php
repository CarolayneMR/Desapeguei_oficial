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
            <div class="flex justify-between">
                <img class="h-14 w-14" src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/7ace94c4ef6f5ebfcc9c5050e02d0419f4215662/resources/views/assets/img/logo-desapeguei.png">
                <h1 class="pl-3 m-auto text-3xl">Desapeguei!</h1>
            </div>

            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">Cadastre-se</a>
                        @endif
                    @endauth
        </nav>
    </div>
    @endif
    <main>
        <div class="relative">
            <img class="absolute inset-y-2 right-20 w-4/12"
                src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/536ae531434fad856abcbbac047830a064144c11/resources/views/assets/img/comp-fundo-blue.png"
                alt="Computadores empilhados">
        </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 col-start-1 col-end-7">
            <h1 class="font-bold text-5xl">
                <span class="text-blue-500">Doar</span>
                ou
                <span class="text-blue-500">Reciclar</span>
                eletrônicos
                <br>
                preserva nossos recursos
                <br>
                naturais.
            </h1>
            <p class="mt-5 text-2xl">Lorem Ipsum has been the industry's standard dummy text
                <br>
                ever since the 1500s, when an unknown printer took a
                <br>
                galley of type and scrambled it to make a type specimen book.
            </p>
            <button
                class="mt-6 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 border border-blue-700 rounded">SAIBA
                MAIS</button>
        </div>
    </main>
</body>

</html>
