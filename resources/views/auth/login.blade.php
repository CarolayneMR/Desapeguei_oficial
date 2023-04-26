<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Usuário') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="senha" required autocomplete="current-password" />
                 
  </button>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-1 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="bg-blue-350 grid grid-cols-1  p-2 px-4 rounded">
               
                <x-button  class="bg-blue-350 grid grid-cols-1  p-2 px-4 rounded" >
                    {{ __('Entrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
