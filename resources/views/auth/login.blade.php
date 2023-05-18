<div class="grid grid-cols-2 gap-0 m-auto">
    <div class="bg-blue-500">
        <div class="font-bold text-5xl m-6 flex">
            <img src="https://github.com/CarolayneMR/Desapeguei-v2/blob/main/resources/views/assets/img/dzin.png?raw=true">
            <div class="ml-5 mt-5">Desapeguei!</div>
        </div>

        <img class="m-auto" src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/536ae531434fad856abcbbac047830a064144c11/resources/views/assets/img/caixa-eletronicos.png" alt="Uma caixa com varios objetos eletronicos dentro.">
    </div>

    <x-guest-layout>
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot> 
            <div class="flex justify-center items-center"  style="height: 380px; width: 400px;">
                <form class="items-center w-80" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="text-center font-bold mb-5 text-2xl">Mantenha-se conectado!</h1>
                    <div class="mb-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Insira seu email"/>
                    </div>

                    <div class="mb-6">
                        <x-label for="password" value="{{ __('Senha') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Insira sua senha" />
                    </div>

                    <div class="mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm">{{ __('Manter conectado') }}</span>
                        </label>
                    </div>

                    <div class="flex justify-center items-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="width: 100%">
                            {{ __('Entrar') }}
                        </button>
                    </div>
                    
                    <div class="flex items-center justify-center mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-500 hover:text-gray-900 dark:hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                        @endif    
                    </div>
                </form>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
            
            </x-authentication-card>
        </x-guest-layout>
    </div>
</div>