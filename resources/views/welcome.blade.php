<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Desapeguei</title>
</head>

<body class="antialiased py-8">

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 font-bold">
        <nav class="relative z-50 sm:top-0 flex justify-between text-xl">
            <div class="flex justify-between">
                <img class="h-14 w-14"
                    src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/7ace94c4ef6f5ebfcc9c5050e02d0419f4215662/resources/views/assets/img/logo-desapeguei.png">
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
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-16 pt-20 text-center lg:pt-32">
            <h1 class="font-bold text-5xl">
                <span class="text-blue-500">Doar</span>
                ou
                <span class="text-blue-500">Reciclar</span>
                eletrônicos
                <br>
                preserva nossos recursos
                naturais.
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg tracking-tight text-black">
                Doar eletrônicos, como computadores, telefones celulares, tablets e outros dispositivos eletrônicos
                usados, permite que esses produtos continuem sendo úteis para outras pessoas.
            </p>
            <a href="#objetos"
                class="mt-6 inline-flex transparent hover:bg-blue-500 text-black font-regular py-2 px-4 border border-blue-500 rounded-full">
                Veja alguns objetos disponíveis
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 ml-2 -mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                </svg>
            </a>
        </div>
        <section id="objetos" class="relative overflow-hidden bg-blue-500 pb-28 pt-20 sm:py-32">
            <div class="max-w-2xl md:mx-auto md:text-center xl:max-w-none">
                <h2 class="font-bold text-3xl tracking-tight text-white sm:text-4xl md:text-5xl">Objetos disponíveis
                </h2>
                <p class="mt-6 text-lg tracking-tight text-blue-100">Alguns de nossos objetos disponíveis no site,
                    se cadastre para ter acesso a todos e também disponibilizar os que você possui.</p>
                <div class="py-6 px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
                    @foreach (\App\Models\Objeto::all() as $objeto)
                        @if ($objeto->id < 5)
                            <span>
                                <div
                                    class="max-w-sm py-2 bg-white border border-gray-200 rounded-lg shadow hover:-translate-y-1 hover:scale-105 duration-300">
                                    <a href="" class="px-2 ml-2 font-regular text-gray-900">
                                        <span class="font-bold">
                                            {{ $objeto->usuarioDoador->name }}
                                        </span>
                                        publicou:
                                    </a>
                                    <img style="height: 200px; width:200px" class="md:w-full pt-2"
                                        src="/img/objetos/{{ $objeto->imagem }}" alt="Imagem do objeto" />
                                    </a>
                                    <div class="p-5">
                                        <h5 class="flex flex-col mb-2 text-2xl tracking-tight text-gray-900">
                                            <div class="text-center"> {{ $objeto->nome }} </div>
                                            <hr>
                                        </h5>

                                        <p class="mb-3 font-normal text-gray-700">
                                            <b>Descrição:</b> {{ $objeto->descricao }}
                                            <br>
                                            <b>CEP do doador:</b> {{ $objeto->cep }}
                                            <br>
                                            <b>Tipo do objeto:</b> {{ $objeto->tipos->descricao }}
                                            <br>
                                        </p>
                                        <div class="flex flex-col items-center">
                                            <a href="/objetos/{{ $objeto->id }}"
                                                class="inline-flex px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Realizar agendamento
                                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <section class="pb-14 pt-20 sm:pb-20 sm:pt-32 lg:pb-32">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="font-bold text-3xl tracking-tight text-slate-900 sm:text-4xl">Desenvolvedores</h2>
                <p class="mt-6 text-lg tracking-tight text-gray-500">Esse sistema foi desenvolvido por:</p>
            </div>

            <div class="px-12 py-4 grid gap-4">
                <div class="grid grid-cols-5 gap-4">
                    <div>
                        <img class="py-2 h-auto max-w-full rounded-lg"
                            src="https://octodex.github.com/images/Octogatos_Sticker1.png" alt="">
                        <a class="font-bold flex flex-col items-center" href="https://github.com/CarolayneMR" target="_blank">Carolayne
                            Russel</a>
                    </div>
                    <div>
                        <img class="py-2 h-auto max-w-full rounded-lg"
                            src="https://octodex.github.com/images/Octogatos_Sticker3.png" alt="">
                        <a class="font-bold flex flex-col items-center" href="https://github.com/Dudu200313" target="_blank">Eduardo
                            Silvino</a>
                    </div>
                    <div>
                        <img class="py-2 h-auto max-w-full rounded-lg"
                            src="https://octodex.github.com/images/Octogatos_Sticker3.png" alt="">
                        <a class="font-bold flex flex-col items-center" href="https://github.com/ianq1w1" target="_blank">Ian Elton</a>
                    </div>
                    <div>
                        <img class="py-2 h-auto max-w-full rounded-lg"
                            src="https://octodex.github.com/images/Octogatos_Sticker3.png" alt="">
                        <a class="font-bold flex flex-col items-center" href="https://github.com/Mateuslpds" target="_blank">Mateus
                            Lopes</a>
                    </div>
                    <div>
                        <img class="py-2 h-auto max-w-full rounded-lg"
                            src="https://octodex.github.com/images/Octogatos_Sticker1.png" alt="">
                        <a class="font-bold flex flex-col items-center" href="https://github.com/suelensalvino" target="_blank">Suelen
                            Salvino</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="flex flex-col items-center border-t border-blue-200 py-10 sm:flex-row-reverse sm:justify-between">
            <p class="mt-6 text-sm text-slate-500 sm:mt-0">
                Copyright © 2023
            </p>
        </div>
    </footer>
</body>
</html>
