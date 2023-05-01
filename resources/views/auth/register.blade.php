<div class="grid grid-cols-2 gap-0 m-auto">

    <div class="bg-blue-500">
        <div class="font-bold text-5xl m-6 flex">
            <img src="https://i.ibb.co/5kL227w/dummy-60x60-ffffff-cccccc-x.png">
            <div class="ml-5">Desapeguei!</div>
        </div>

        <img class="m-auto" src="https://raw.githubusercontent.com/CarolayneMR/Desapeguei-v2/536ae531434fad856abcbbac047830a064144c11/resources/views/assets/img/caixa-eletronicos.png" alt="Uma caixa com varios objetos eletronicos dentro.">
    </div>

<x-guest-layout>
        <x-authentication-card>
            <div>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>    
            </div>

            <div class="font-bold text-2xl mt-3">
                JUNTE-SE A NÓS!
            </div>    

            <br>

            <x-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Nome completo') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Insira seu nome" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="seu@email.com" />
                </div>

                <div class="mt-4">
                    <x-label for="cpf" value="{{ __('CPF') }}" />
                    <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" placeholder="Insira seu CPF" />
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Telefone') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" placeholder="(99) 99999-9999" />
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <x-label for="password" value="{{ __('Senha') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Digite aqui"/>
                    </div>
                    <div>
                        <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Digite aqui"/>
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Já é cadastrado?') }}
                    </a>
                    <x-button class="ml-4">
                        {{ __('Cadastre-se') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </x-guest-layout>
</div>