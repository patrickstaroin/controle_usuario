@extends('layouts.main')
@section('title', 'Cadastrar Usuário')
@section('content')


<x-jet-authentication-card>
<x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

<form action="/usuarios" method="POST">
    @csrf
    <p>Preencha as informações do novo usuário:</p>
    
    <div>
        <x-jet-label for="nome" value="{{ __('Nome') }}" />
        <x-jet-input 
            id="nome" 
            name="nome" 
            class="block mt-1 w-full" 
            type="text" 
            required autofocus />
    </div>
    <div>
        <x-jet-label for="login" value="{{ __('Email') }}" />
        <x-jet-input 
            id="login" 
            name="login" 
            class="block mt-1 w-full" 
            type="email" 
            required />
    </div>
    <div>
        <x-jet-label for="senha" value="{{ __('Senha') }}" />
        <x-jet-input 
            id="senha" 
            name="senha" 
            class="block mt-1 w-full" 
            type="password" 
            required/>
    </div>
    <x-jet-label for="permissoes[]" value="{{ __('Selecione as permissões:') }}"/>
    <input type="checkbox" name="permissoes[]" value="produtos"> Produtos
    <br>
    <input type="checkbox" name="permissoes[]" value="categorias"> Categorias
    <br>
    <input type="checkbox" name="permissoes[]" value="marcas"> Marcas
    <br>
    <div class="flex items-center justify-center mt-6">

                <x-jet-button class="ml-4">
                    {{ __('Enviar') }}
                </x-jet-button>

</div>

</x-jet-authentication-card>


@endsection
