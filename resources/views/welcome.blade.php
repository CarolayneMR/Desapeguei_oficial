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
                <img class="h-14 w-14" src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/7ace94c4ef6f5ebfcc9c5050e02d0419f4215662/resources/views/assets/img/logo-desapeguei.png">
                <h1 class="pl-3 m-auto text-3xl">Desapeguei!</h1>
            </div>

            @if (Route::has('login'))
            <div class="">
                @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="">Entrar</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">Cadastre-se</a>
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
            <a href="#objetos" class="mt-6 inline-flex transparent hover:bg-blue-500 text-black font-regular py-2 px-4 border border-blue-500 rounded-full">
                Veja alguns objetos disponíveis
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 -mr-1">
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
                        @if ($objeto->agendamentos->where('status', 'entregue')->count() == 0 && $loop->index < 5)
                        <span>
                            <div class="max-w-sm py-2 bg-white border border-gray-200 rounded-lg shadow hover:-translate-y-1 hover:scale-105 duration-300">
                                <a href="" class="px-2 ml-2 font-regular text-gray-900">
                                    <span class="font-bold">
                                        {{ $objeto->usuarioDoador->name }}
                                    </span>
                                    publicou:
                                </a>
                                <img style="height: 400px; width:400px" class="md:w-full pt-2" src="/img/objetos/{{ $objeto->imagem }}" alt="Imagem do objeto" />
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
                                        <a href="/objetos/{{ $objeto->id }}" class="inline-flex px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Realizar agendamento
                                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
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

            <div class="mx-20">
                <div class="flex content-center p-1 m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                    </svg>
                    <h2 class="font-bold text-3xl tracking-tight text-slate-900 sm:text-4xl">Desenvolvedores</h2>
                </div>
                <p class="p-1 pl-3 m-2 text-gray-600">Esse sistema foi desenvolvido por:</p>
            </div>

            <div class="px-8 py-2 grid gap-5">
                <div class="grid grid-cols-5 gap-4 px-11">
                    <div class="pl-8">
                        <img class="h-auto max-w-full rounded-lg" src="https://octodex.github.com/images/kimonotocat.png" alt="">
                        <span class="font-bold flex flex-col text-center pl-8 text-xl bg-blue-400 border-b-4 border-black border-r-4">Carolayne Russel</span>
                        <div class="items-center content-center ">
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://github.com/CarolayneMR" target="_blank">CarolayneMR</a>
                            </div>
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://www.linkedin.com/in/carolayne-maria-b08512244/" target="_blank">Carolayne</a>
                            </div>
                        </div>
                    </div>

                    <div class="pl-8">
                        <img class="h-auto max-w-full rounded-lg" src="https://octodex.github.com/images/Fintechtocat.png" alt="">
                        <span class="font-bold flex flex-col text-center pl-8 text-xl bg-blue-400 border-b-4 border-black border-r-4">Eduardo Silvino</span>
                        <div class="items-center content-center ">
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://github.com/Dudu200313" target="_blank">Dudu200313</a>
                            </div>
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://www.linkedin.com/in/eduardo-silvino-764913259/" target="_blank">Eduardo</a>
                            </div>
                        </div>
                    </div>

                    <div class="pl-8">
                        <img class="h-auto max-w-full rounded-lg" src="https://octodex.github.com/images/privateinvestocat.jpg" alt="">
                        <span class="font-bold flex flex-col text-center pl-8 text-xl bg-blue-400 border-b-4 border-black border-r-4">Ian Elton</span>
                        <div class="items-center content-center ">
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://github.com/ianq1w1" target="_blank">ianq1w1</a>
                            </div>
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://www.linkedin.com/in/ian-elton-a22b6b23a/" target="_blank">Ian</a>
                            </div>
                        </div>
                    </div>

                    <div class="pl-8">
                        <img class="h-auto max-w-full rounded-lg" src="https://octodex.github.com/images/spidertocat.png" alt="">
                        <span class="font-bold flex flex-col text-center pl-8 text-xl bg-blue-400 border-b-4 border-black border-r-4">Mateus Lopes</span>
                        <div class="items-center content-center ">
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://github.com/Mateuslpds" target="_blank">Mateuslpds</a>
                            </div>
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://www.linkedin.com/in/mateus-lopes-98639a209/" target="_blank">Mateus</a>
                            </div>
                        </div>
                    </div>

                    <div class="pl-8">
                        <img class="h-auto max-w-full rounded-lg" src="https://octodex.github.com/images/Octogatos_Sticker1.png" alt="">
                        <span class="font-bold flex flex-col text-center pl-8 text-xl bg-blue-400 border-b-4 border-black border-r-4">Suelen Salvino</span>
                        <div class="items-center content-center ">
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://github.com/suelensalvino" target="_blank">suelensalvino</a>
                            </div>
                            <div class="flex content-center p-1 pl-3 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                </svg>
                                <a class="font-bold pl-4" href="https://www.linkedin.com/in/suelensalvino/" target="_blank">Suelen</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="flex flex-col items-center border-t border-blue-200 py-10 sm:flex-row-reverse sm:justify-between pr-8">
            <p class="mt-6 text-sm text-slate-500 sm:mt-0">
                Copyright © 2023
            </p>
        </div>
    </footer>
</body>

</html>