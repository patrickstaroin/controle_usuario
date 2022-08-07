@extends('layouts.main')
@section('title', 'Controle Usuário - Home')
@section('content')

<div>    
    <table class="table-auto w-full mb-6">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Permissões</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                
                <tr>
                    <td class="border px-4 py-2">{{ $usuario->id }}</td>
                    <td class="border px-4 py-2">{{ $usuario->name }}</td>
                    <td class="border px-4 py-2">{{ $usuario->email }}</td>
                    @if(json_decode($usuario->permissoes) == [""])
                    <td class="border px-4 py-2">Sem permissões</td>
                    @else
                    <td class="border px-4 py-2">{{ $usuario->permissoes }}</td>
                    @endif

                    <td class="border px-4 py-2">
                        <div class="flex inline-block items-center justify-center">
                            <form>
                                <x-jet-button type="button" class="ml-4" onclick="location.href='/usuarios/{{$usuario->id}}'">
                                    {{ __('Editar') }}
                                </x-jet-button>
                            </form>
                            <form action="/usuarios/{{$usuario->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-jet-button class="ml-4">
                                    {{ __('Deletar') }}
                                </x-jet-button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
</div>
@endsection