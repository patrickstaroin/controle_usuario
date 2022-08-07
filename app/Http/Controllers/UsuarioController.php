<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App;


class UsuarioController extends Controller
{
    public function index(){
        if (Auth::user()->tipo == "admin"){
            $usuarios = [];
            $usuariosBase = User::all();
            foreach($usuariosBase as $usuario){
                if ($usuario->admin == Auth::user()->email){
                    array_push($usuarios, $usuario);
                }
            }
            return view('welcome', ['usuarios'=>$usuarios]);
        } else {
            return view('sistema');
        }
        
    }


    public function create(){
        if (Auth::user()->tipo == "admin"){
            return view('usuarios.create');
        } else {
            return App::abort(403);
        }
    }

    public function store(Request $request){
        $usuario = new User;
        $usuario->name=$request->nome;
        $usuario->email=$request->login;
        $usuario->password=Hash::make($request->senha);
        $usuario->permissoes=json_encode($request->permissoes);
        $usuario->tipo="comum";
        $usuario->admin=Auth::user()->email;

        if($request->permissoes == null){
            $usuario->permissoes = json_encode(['']);
        }

        $usuario->save();

        return redirect('/')->with('msg', "Usuário $usuario->name cadastrado com sucesso!");
    }

    public function edit($id){
        if (Auth::user()->tipo == "admin"){
            $usuario = User::findOrFail($id);

            return view('usuarios.show', ['usuario' => $usuario]);
        } else {
            return App::abort(403);
        }
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Usuario excluído com sucesso!');
    }

    public function update(Request $request) {
        if (Auth::user()->tipo == "admin"){
            $permissoes = $request->permissoes;
            if($request->permissoes == null){
                $permissoes = json_encode(['']);
            }
            User::findOrFail($request->id)->update([
                'name' => $request->nome,
                'email' => $request->login,
                'permissoes' => $permissoes
            ]);


            if($request->senha != null) {
                User::findOrFail($request->id)->update([
                    'password' => Hash::make($request->senha)
                ]);
            }

            return redirect('/')->with('msg', 'Usuário editado com sucesso!');
        }else {
            return App::abort(403);
        }
    }


    public function showProdutos(){
        if(json_decode(Auth::user()->permissoes) == null){
            return App::abort(403);
        }else if(in_array('produtos', json_decode(Auth::user()->permissoes))){
            return view('produtos');
        } else {
            return App::abort(403);
        }
    }

    public function showCategorias(){
        if(json_decode(Auth::user()->permissoes) == null){
            return App::abort(403);
        }else if(in_array('categorias', json_decode(Auth::user()->permissoes))){
            return view('categorias');
        } else {
            return App::abort(403);
        }
    }

    public function showMarcas(){
        if(json_decode(Auth::user()->permissoes) == null){
            return App::abort(403);
        }else if(in_array('marcas', json_decode(Auth::user()->permissoes))){
            return view('marcas');
        } else {
            return App::abort(403);
        }
    }
}
