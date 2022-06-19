@extends('layouts.app')

@section('content')
<div class="flex flex-col p-8">
    <a href="{{ route('categories.index') }}">
        <span class="flex flex-row align-center font-sans text-sm text-blue-700">
            <x-heroicon-o-arrow-sm-left class="w-4" />
            Voltar
        </span>
    </a>
    <div class="bg-white mt-4 p-8 w-full h-full rounded-md">
        <p class="font-sans text-2xl font-medium text-gray-600 sm:px-2 lg:px-4">Editar categoria</p>

        <div class="-my-2 overflow-x-auto mt-8 sm:-mx-6 lg:-mx-8">
            <div class="w-full py-2 align-middle inline-block min-w-full sm:px-2 lg:px-4">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <form action="{{ route('categories.update', $category->id )}}" method="post" class="py-6 px-12">

                        @csrf
                        @method('PUT')

                        <div class="flex flex-row -mx-3 mb-4">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-name"
                                >
                                    Nome da categoria
                                </label>
                                <input
                                    name="name"
                                    id="grid-name"
                                    type="text"
                                    value="{{ $category->name }}"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('name') ? 'focus:outline-none border-red-500' : ''}}"
                                />

                                @if($errors->has('name'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-description"
                                >
                                    Descrição
                                </label>
                                <input
                                    name="description"
                                    id="grid-description"
                                    type="text"
                                    value="{{ $category->description }}"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('name') ? 'focus:outline-none border-red-500' : ''}}"
                                />

                                @if($errors->has('description'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-row -mx-3 mb-4">
                            <div class="w-1/2 md:w-1/6 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-type"
                                >
                                    Tipo da categoria
                                </label>
                                <select
                                    name="type_category"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('name') ? 'focus:outline-none border-red-500' : ''}}"
                                    id="grid-type"
                                >
                                    <option value="" selected disabled>Selecione uma opção</option>
                                    <option
                                        value="Genéricos"
                                        @if($category->type_category == "Genéricos")
                                            selected
                                        @endif>Genéricos
                                    </option>
                                    <option
                                        value="Cidades"
                                        @if($category->type_category == "Cidades")
                                            selected
                                        @endif>Cidades
                                    </option>
                                    <option
                                        value="Universidades"
                                        @if($category->type_category == "Universidades")
                                            selected
                                        @endif>Universidades
                                    </option>
                                    <option
                                        value="Pessoas físicas"
                                        @if($category->type_category == "Pessoas físicas")
                                            selected
                                        @endif>Pessoas físicas
                                    </option>
                                    <option
                                        value="Profissionais liberais"
                                        @if($category->type_category == "Profissionais liberais")
                                            selected
                                        @endif>Profissionais liberais
                                    </option>
                                    <option
                                        value="Pessoas jurídicas"
                                        @if($category->type_category == "Pessoas jurídicas")
                                            selected
                                        @endif>Pessoas jurídicas
                                    </option>
                                </select>

                                @if($errors->has('type_category'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-row -mx-3 mb-4">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <button
                                    type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                >
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
