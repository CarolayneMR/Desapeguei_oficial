<x-app-layout>
    <div class="py-8">
        <div class="px-8">
            <a href="/objetos/create"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 25 25" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Doar um objeto
            </a>
        </div>
        <div class="py-6 px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
            @foreach (\App\Models\Objeto::all() as $objeto)
                <span>
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <img class="md:w-full" src="/img/objetos/{{ $objeto->imagem }}" alt="Imagem do objeto" />
                        </a>
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $objeto->nome }} </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                Descrição: {{ $objeto->descricao }}
                                <br>
                                CEP do doador: {{ $objeto->cep }}
                                <br>
                                Tipo do objeto: {{ $objeto->tipos->descricao }}
                                <br>
                               <a href=""> Nome do doador: {{$objeto->usuarioDoador->name}} </a>
                            </p>
                            <a href="/objetos/{{ $objeto->id }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                </span>
            @endforeach
        </div>
    </div>
</x-app-layout>