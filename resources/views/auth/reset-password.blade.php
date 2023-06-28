<x-guest-layout>
<div class="grid grid-cols-2 gap-0 m-auto">
        <div class="bg-blue-500">
            <div class="font-bold text-5xl m-5 flex">
                <img class="h-20 w-20" src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/7ace94c4ef6f5ebfcc9c5050e02d0419f4215662/resources/views/assets/img/logo-desapeguei.png">
                <div class="ml-5 m-auto">Desapeguei!</div>
            </div>

            <img class="m-auto" src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/main/resources/views/assets/img/reset-password.png" alt="Um cadeado .">
        </div>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha Nova') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>
                    {{ __('Redefinir Senha') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
