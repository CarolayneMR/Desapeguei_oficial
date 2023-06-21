<x-guest-layout>
    <div class="grid grid-cols-2 gap-0 m-auto">
        <div class="bg-blue-500">
            <div class="font-bold text-5xl m-5 flex">
                <img class="h-20 w-20" src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/7ace94c4ef6f5ebfcc9c5050e02d0419f4215662/resources/views/assets/img/logo-desapeguei.png">
                <div class="ml-5 m-auto">Desapeguei!</div>
            </div>

            <img class="m-auto" src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/main/resources/views/assets/img/reset-password.png" alt="Um cadeado .">
        </div>
        
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
        <x-authentication-card>

            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                <h1 style="font-size: 19px; color:black">Esqueceu sua senha?</h1>
                <h3>Digite o endereço de e-mail da sua conta e enviaremos um link de redefinição de senha.</h3>
            </div>

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
                <br>
                <div class="flex items-center justify-center mt-3">
                    <x-button style="width: 400px; height: 40px;">
                        <h1 style="font-size: 19px; color: black; text-align: center; margin: 0 auto;">Enviar E-mail</h1>
                    </x-button>
                </div>
                <br>
                <div class="flex items-center justify-center mt-4">
                    @if (Route::has('login'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-500 hover:text-gray-900 dark:hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Voltar para login') }}
                    </a>
                    @endif
                </div></br>
                <hr style="height: 50px">

                <h2 style="color: black; text-align: center; margin: 0 auto;">Não possui uma conta?</h2>
                <div class="flex items-center justify-center mt-4">
                    @if (Route::has('register'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-500 hover:text-gray-900 dark:hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                        {{ __('Cadastre-se') }}
                    </a>
                    @endif
                </div>
            </form>
        </x-authentication-card>
    </div>
</x-guest-layout>