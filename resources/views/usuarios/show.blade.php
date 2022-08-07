@extends('layouts.main')
@section('title', 'Controle Usuário - Editar')
@section('content')



<x-jet-authentication-card>
<x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

<form action="/usuarios/update/{{$usuario->id}}" method="POST">
    @csrf
    @method('PUT')
    <p>Editar usuário:</p>
    
    <div>
        <x-jet-label for="nome" value="{{ __('Nome') }}" />
        <x-jet-input 
            id="nome" 
            name="nome" 
            class="block mt-1 w-full" 
            type="text" 
            :value="old('nome', $usuario->name)"
            required autofocus />
    </div>
    <div>
        <x-jet-label for="login" value="{{ __('Email') }}" />
        <x-jet-input 
            id="login" 
            name="login" 
            class="block mt-1 w-full" 
            type="email" 
            :value="old('email', $usuario->email)"
            required />
    </div>
    <div>
        <x-jet-label for="senha" value="{{ __('Senha') }}" />
        <x-jet-input 
            id="senha" 
            name="senha" 
            class="block mt-1 w-full" 
            type="password" 
            />
    </div>
    <x-jet-label for="permissoes[]" value="{{ __('Selecione as permissões:') }}"/>
    <input type="checkbox" name="permissoes[]" value="produtos"
    {{ in_array('produtos', json_decode($usuario->permissoes)) ? 'checked' : '' }}> Produtos
    <br>
    <input type="checkbox" name="permissoes[]" value="categorias"
    {{ in_array('categorias', json_decode($usuario->permissoes)) ? 'checked' : '' }}> Categorias
    <br>
    <input type="checkbox" name="permissoes[]" value="marcas"
    {{ in_array('marcas', json_decode($usuario->permissoes)) ? 'checked' : '' }}> Marcas
    <br>
    <div class="flex items-center justify-center mt-6">

                <x-jet-button class="ml-4">
                    {{ __('Enviar') }}
                </x-jet-button>

</div>

</x-jet-authentication-card>



@endsection