<x-app-layout>
    <div class="py-12">
        <h2 class="py-2 px-8 text-gray-500 text-2xl">Aqui estão os resultados da sua busca:</h2>
        <div x-data= "{ existePesq: false }" class="py-2 px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
            @foreach ($objetos as $objeto)
                <span x-model="existePesq = true">
                    <div
                        class="max-w-sm py-2 bg-white border border-gray-200 rounded-lg shadow hover:-translate-y-1 hover:scale-105 duration-300">
                        <a href="" class="px-2 ml-2 font-regular text-gray-900">
                            <span class="font-bold">
                                {{ $objeto->usuarioDoador->name }}
                            </span>
                            publicou:
                        </a>
                        <img style="height: 400px; width:400px" class="md:w-full pt-2"
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
                            <div>
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
            @endforeach
              <span x-show="existePesq == false">

                <h3 class="py-2 px-8 text-red-500 text-2xl">Este objeto "{{$search}}" está indisponível ou não existe</h2>
                </span>
        </div>
    </div>
</x-app-layout>
