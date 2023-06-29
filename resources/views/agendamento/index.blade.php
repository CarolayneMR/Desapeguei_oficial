<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus agendamentos') }}
        </h2>
    </x-slot>
    <!--Agendamentos da pessoa-->
    <div>
        <div class="py-8" x-data="{ statusFilter: '' }">
            @if (session('msg'))
            <div class="flex p-4 mb-4 text-sm text-white rounded-lg bg-green-600" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <span class="px-1 font-bold text-base">
                    {{ session('msg') }}
                </span>
            </div>
        @endif
        @if ($errors->any())
            <div class="flex p-4 mb-4 text-sm text-white rounded-lg bg-red-600" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>
                <span class="px-1 font-bold text-base">
                    {{ $errors->first() }}
                </span>
            </div>
        @endif
            <div class="px-8">
                <select
                    class="py-3 px-4 pr-9 block w-100 border-blue-500 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500"
                    x-model="statusFilter" name="statusFilter" id="statusFilter">
                    <option value="">Clique aqui para filtrar os agendamentos por status</option>
                    <option value="aberto">Aberto</option>
                    <option value="em andamento">Em andamento</option>
                    <option value="entregue">Entregue</option>
                </select>
            </div>
            <div x-data="{ existeAgenda: false }" class="py-6 px-8">
                <h1 class="text-xl font-bold text-blue-500">Agendamentos solicitados</h1>
                <div class="flex flex-col gap-2">
                    
                    @foreach (\App\Models\Agenda::all() as $agenda)
                        @if ($agenda->usuarioDest_id == auth()->id())
                            <div x-model="existeAgenda = true" x-data="{ editMode: false, showDelete: false }" class="">
                                <div class="">
                                    <template x-if="statusFilter == '' || statusFilter == '{{ $agenda->status }}'">
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left">
                                                <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                                                    <th scope="col" class="px-6 py-3">
                                                        Objeto
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Data/Horário
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Usuário
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Ações
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Acompanhamento
                                                    </th>
                                                </thead>
                                                <tr class="bg-white border-b uppercase">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap">
                                                        {{ $agenda->objetos->nome }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $agenda->data }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $agenda->doadores->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $agenda->status }}
                                                    </td>
                                                    <td class="px-6 py-4 grid grid-cols-2">
                                                        <div class="cursor-pointer" @click="editMode = true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                        </div>
                                                        <div class="cursor-pointer" @click="showDelete = true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div>
                                                            <form x-data=" { status: '{{ $agenda->status }}' }" x-show="status != 'entregue'"
                                                                action="{{ route('agenda.updateStatus', $agenda) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <!-- criar aqui um x-data pra esse botão do confirmar recebimento sumir dps q for pressionado-->
                                                                <button
                                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border-b-2 border-blue-700 hover:border-blue-500 rounded-full"
                                                                    type="submit">Confirmar recebimento</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </template>
                                    <template x-if="editMode">
                                        <div class="absolute top-0 bottom-0 left-0 right-0">
                                            <div
                                                class="md:w-96 bg-white p-4 relative rounded-lg left-1/3 right-1/3 top-1/4 z-50">
                                                <button type="button" @click="editMode = false"
                                                    class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="editModal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Fechar</span>
                                                </button>
                                                <h1 class="py-4 font-bold">Atualize seu horário de agendamento!</h1>
                                                <form action="{{ route('agenda.update', $agenda) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <label class="font-regular mb-2" for="data">Selecione a nova
                                                            data e o horário desejado:</label>
                                                        <input id="data"
                                                            class="mb-2 text-sm rounded-lg w-full p-2.5 bg-gray-100 border-blue-500"
                                                            type="datetime-local" name="data"
                                                            value="{{ $agenda->data }}" required autofocus />
                                                    </div>
                                                    <button
                                                        class="cursor-point w-full py-2 px-3 text-sm font-bold text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-900">Salvar</button>
                                                </form>
                                                <template x-if="editMode">
                                                    <div class="py-1">
                                                        <button
                                                            class="cursor-point w-full py-2 px-3 text-sm font-medium text-gray-800 bg-transparent rounded-lg border border-gray-500 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                                            @click="editMode = false">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="showDelete"
                                    class="absolute top-0 bottom-0 left-0 right-0">
                                    <div
                                        class="md:w-96 bg-white p-4 relative rounded-lg left-1/3 right-1/3 top-1/4 z-50">
                                        <form class="py-2 w-full text-center"
                                            action="{{ route('agenda.destroy', $agenda) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" @click="showDelete = false"
                                                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="deleteModal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Fechar</span>
                                            </button>
                                            <svg class="text-black dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="mb-4 text-black">Tem certeza que deseja excluir
                                                este agendamento?</p>
                                            <button @click="showDelete = true"
                                                class="w-full py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Sim,
                                                tenho certeza</button>
                                        </form>
                                        <button
                                            class="w-full py-2 px-3 text-sm font-medium text-gray-800 bg-transparent rounded-lg border border-gray-500 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                            @click="showDelete = false">Não, cancelar</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div x-show="existeAgenda == false" class="font-medium text-gray-500">Você não solicitou nenhum agendamento ainda.</div>
                </div>
            </div>

            <!--Solicitações de agendamentos-->
            <div class="py-4 px-8">
                <h1 class="text-xl font-bold text-blue-500">Solicitação de agendamentos</h1>
                <div x-data="{ existeAgenda: false }" class="flex flex-col gap-2">
                    @foreach (\App\Models\Agenda::all() as $agenda)
                        @if ($agenda->usuarioDoar_id == auth()->id())
                            <div class="">
                                <div x-model="existeAgenda = true" class="">
                                    <template x-if="statusFilter == '' || statusFilter == '{{ $agenda->status }}'">
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left">
                                                <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                                                    <th scope="col" class="px-6 py-3">
                                                        Objeto
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Data/Horário
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Usuário
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Ações
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Envio
                                                    </th>
                                                </thead>
                                                <tr class="bg-white border-b uppercase">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap">
                                                        {{ $agenda->objetos->nome }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $agenda->data }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $agenda->doadores->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $agenda->status }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div x-data=" { status: '{{ $agenda->status }}' }" x-show="status != 'entregue'"
                                                            class="cursor-pointer">
                                                            <form action="{{ route('agenda.destroy', $agenda) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="w-6 h-6">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <!-- criar aqui um x-data pra esse botão do confirmar envio sumir dps q for pressionado-->
                                                        <div>
                                                            <form x-data=" { status: '{{ $agenda->status }}' }"
                                                                x-show="status != 'entregue'"
                                                                action="{{ route('agenda.updateStatus', $agenda) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <button
                                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border-b-2 border-blue-700 hover:border-blue-500 rounded-full"
                                                                    type="submit">Confirmar envio</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </template>
                                </div>
                        @endif
                    @endforeach
                    <div x-show="existeAgenda == false" class="font-medium text-gray-500">Não há nenhuma solicitação de agendamento para seus objetos.</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
