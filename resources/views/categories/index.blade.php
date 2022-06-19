@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center p-8">
    <div class="bg-white mt-10 p-8 w-full h-full rounded-md">
        <p class="font-sans text-2xl font-medium text-gray-600">Categorias</p>
        <div class="flex flex-row align-center justify-between mt-4">
            <form action="{{ route('categories.index') }}" method="GET">
                <div class="flex flex-row align-center gap-2">
                    <label class="relative block">
                        <span class="sr-only">Search</span>
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        </span>
                    </label>
                    <input
                        name="name"
                        type="text"
                        placeholder="Buscar categoria..."
                        class="placeholder:italic placeholder:text-slate-400 block bg-white border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                    />
                    <button>
                        <x-heroicon-s-search class="w-6" />
                    </button>
                </div>
            </form>

            <a href="{{ route('categories.create') }}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Adicionar categoria
                </button>
            </a>
        </div>

        <div class="-my-2 overflow-x-auto mt-8 sm:-mx-6 lg:-mx-8">
            <div class="w-full py-2 align-middle inline-block">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    ID
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Categoria
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Descrição
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Categoria
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($categories as $c)
                                <tr>
                                    <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                                        {{ $c->id }}
                                    </td>
                                    <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                                        {{ $c->name }}
                                    </td>
                                    <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                                        {{ $c->description }}
                                    </td>
                                    <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                                        {{ $c->type_category }}
                                    </td>
                                    <td class="flex flex-row align-center gap-2 justify-center mt-2">
                                        <a href="{{ route('categories.show', $c->id) }}">
                                            <button>
                                                <x-bx-show class="w-4" style="color: #2893ED" />
                                            </button>
                                        </a>

                                        <a href="{{ route('categories.edit', $c->id) }}">
                                            <button>
                                                <x-gmdi-edit class="w-4" style="color: #0e9f6e" />
                                            </button>
                                        </a>

                                        <form name="frDelete" action="{{ route('categories.destroy', $c->id )}}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <div
                                                id="popup-modal"
                                                tabindex="-1"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full"
                                            >
                                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button
                                                            type="button"
                                                            data-modal-toggle="popup-modal"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        >
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                        <div class="p-6 text-center">
                                                            <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                            <h3
                                                                class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"
                                                            >
                                                                Tem certeza que deseja excluir esta categoria?
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

                                            <button data-modal-toggle="popup-modal" type="button">
                                                <x-gmdi-delete class="w-4" color="#c82558" />
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
