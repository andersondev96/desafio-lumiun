@extends('layouts.app')

@section('content')
<div class="flex flex-col p-8">
    <a href="{{ route('domains.index') }}">
        <span class="flex flex-row align-center font-sans text-sm text-blue-700">
            <x-heroicon-o-arrow-sm-left class="w-4" />
            Voltar
        </span>
    </a>
    <div class="bg-white mt-4 p-8 w-full h-full rounded-md">
        <p class="font-sans text-2xl font-medium text-gray-600 sm:px-2 lg:px-4">
            Editar domínio
        </p>

        <div class="-my-2 overflow-x-auto mt-8 sm:-mx-6 lg:-mx-8">
            <div class="w-full py-2 align-middle inline-block min-w-full sm:px-2 lg:px-4">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <form action="{{ route('domains.update', $domain->id )}}" method="post" class="py-6 px-12">

                        @csrf
                        @method('PUT')

                        <div class="flex flex-row -mx-3 mb-4">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-name"
                                >
                                    Nome do domínio
                                </label>
                                <input
                                    name="name"
                                    id="grid-name"
                                    type="text"
                                    value="{{ $domain->name }}"
                                    placeholder="Digite o nome do domínio"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500{{$errors->has('name') ? 'focus:outline-none border-red-500' : ''}}"
                                />

                            </div>

                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-category"
                                >
                                    Categoria do domínio
                                </label>
                                <select
                                    name="category_id"
                                    id="grid-category"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('category_id') ? 'focus:outline-none border-red-500' : ''}}"
                                >

                                    @foreach($categories as $c)
                                        <option
                                            value="{{ $c->id}}"
                                            @if($c->id == $domain->category->id)
                                                selected
                                                @endif
                                            >
                                                {{ $c->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('category_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-row -mx-3 mb-4">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-description"
                                >
                                    Descrição
                                </label>
                                <input name="description" type="text" value="{{ $domain->description }}" placeholder="Digite a descrição do domínio" class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('description') ? 'focus:outline-none border-red-500' : ''}}" id="grid-description" />
                                @if($errors->has('description'))
                                <div class="text-red-500 text-sm">
                                    @foreach($errors->get('description') as $error)
                                    {{ $error }}
                                    @endforeach
                                </div>
                                @endif
                            </div>


                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-expiration_date"
                                >
                                    Data de expiração do domínio
                                </label>
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input
                                        name="expiration_date"
                                        id="grid-expiration_date"
                                        type="text"
                                        value="{{ \Carbon\Carbon::parse($domain->expiration_date )->format('d/m/Y') }}"
                                        placeholder="Selecione a data"
                                        datepicker
                                        datepicker-autohide
                                        datepicker-format="dd/mm/y"
                                        class="pl-10 p-2.5 appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('expiration_date') ? 'focus:outline-none border-red-500' : ''}}"
                                    />
                                </div>
                                @if($errors->has('expiration_date'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('expiration_date') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-row -mx-3 mb-4">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-url"
                                >
                                    URL
                                </label>
                                <input
                                    name="url"
                                    id="grid-url"
                                    type="text"
                                    value="{{ $domain->url }}"
                                    placeholder="Digite a sua URL iniciando com https://"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('url') ? 'focus:outline-none border-red-500' : ''}}"
                                />
                                @if($errors->has('url'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('url') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-server_name"
                                >
                                    Servidor
                                </label>
                                <input
                                    name="server_name"
                                    id="grid-server_name"
                                    type="text"
                                    value="{{ $domain->server_name }}"
                                    placeholder="Digite o nome do servidor"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('server_name') ? 'focus:outline-none border-red-500' : ''}}"
                                />
                                @if($errors->has('server_name'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('server_name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-row -mx-3 mb-4">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-organization"
                                >
                                    Organização ou pessoa proprietária do domínio
                                </label>
                                <input
                                    name="organization_name"
                                    id="grid-organization"
                                    type="text"
                                    value="{{ $domain->organization_name }}"
                                    placeholder="Nome do proprietário do domínio"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('organization_name') ? 'focus:outline-none border-red-500' : ''}}"
                                />
                                @if($errors->has('organization_name'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('organization_name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-email"
                                >
                                    E-mail do proprietário
                                </label>
                                <input
                                    name="email_organization"
                                    id="grid-email"
                                    type="email"
                                    value="{{ $domain->email_organization }}"
                                    placeholder="Digite o e-mail do proprietário"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('email_organization') ? 'focus:outline-none border-red-500' : ''}}"
                                />
                                @if($errors->has('email_organization'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('email_organization') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="w-full md:w-2/4 px-3 mb-4 md:mb:0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-phone"
                                >
                                    Telefone do proprietário
                                </label>
                                <input
                                    name="phone_organization"
                                    type="text"
                                    value="{{ $domain->phone_organization }}"
                                    placeholder="Digite o telefone"
                                    class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('phone_organization') ? 'focus:outline-none border-red-500' : ''}}"
                                    id="grid-phone"
                                />
                                @if($errors->has('phone_organization'))
                                    <div class="text-red-500 text-sm">
                                        @foreach($errors->get('phone_organization') as $error)
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
