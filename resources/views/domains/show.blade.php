@extends('layouts.app')

@section('content')
<div class="flex flex-col p-8">
    <a href="{{ route('domains.index') }}">
        <span class="font-sans text-sm text-blue-700">Voltar</span>
    </a>

    <div class="bg-white mt-4 p-8 w-full h-full rounded-md">
        <p class="font-sans text-2xl font-medium text-gray-600 sm:px-2 lg:px-4">
            Informações sobre o domínio
        </p>

        <div class="-my-2 overflow-x-auto mt-8 sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-2 lg:px-4">
                <table class="overflow-hidden sm:rounded-lg">
                    <tbody>
                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">ID</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->id}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">ID do domínio</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->domain_id}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Nome</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">
                                {{ $domain->name .".". $domain->category->name }}
                            </td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Categoria</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->category->name}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Descrição</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->description}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">URL</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->url}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Servidor</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->server_name}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Proprietário do domínio</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->organization_name}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">E-mail do proprietário</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->email_organization}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Telefone do proprietário</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">{{ $domain->phone_organization}}</td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Data de expiração do domínio</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">
                                {{ \Carbon\Carbon::parse($domain->expiration_date)->format('d/m/Y')}}
                            </td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Cadastrado em</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">
                                {{\Carbon\Carbon::parse($domain->created_at)->format('d/m/Y H:i:s')}}
                            </td>
                        </tr>

                        <tr class="h-12">
                            <td class="px-4 py-2 w-64 font-medium text-gray-800">Última modificação</td>
                            <td class="px-4 py-2 text-gray-900 ml-8">
                                {{\Carbon\Carbon::parse($domain->updated_at)->format('d/m/Y H:i:s')}}
                            </td>
                        </tr>


                </table>
                <div class="flex flex-row gap-8 mt-4 p-4">
                    <a href="{{ route('domains.edit', $domain->id) }}">
                        <button
                            class="bg-transparent hover:bg-green-800 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded"
                        >
                            Editar
                        </button>
                    </a>

                    <form name="frDelete" action="{{ route('domains.destroy', $domain->id )}}" method="POST">


                        <div
                            id="popup-modal"
                            tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full"
                        >
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button
                                        type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-toggle="popup-modal"
                                    >
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                            Tem certeza que deseja excluir esse domínio?
                                        </h3>
                                        <button
                                            data-modal-toggle="popup-modal"
                                            type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                                        >
                                            Sim
                                        </button>
                                        <button
                                            data-modal-toggle="popup-modal"
                                            type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                        >
                                            Não
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @csrf
                        @method('DELETE')
                        <button data-modal-toggle="popup-modal" type="button" class="bg-transparent hover:bg-red-800 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
