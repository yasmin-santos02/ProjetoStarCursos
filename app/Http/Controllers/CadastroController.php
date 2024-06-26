<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Contracts\View;

class CadastroController extends Controller
{
    public function cadastrar()
    {
        return view('cadastroUsuario');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required',
                'senha' => 'required|confirmed',
                'email' => 'required|email',
            ]
        );

        $usuarios = new Usuario;
        $usuarios->nome = $request->nome;
        $usuarios->email = $request->email;
        $usuarios->categoria = $request->categoria;

        $usuarios->senha = bcrypt($request->senha);

        $usuarios->save();

        return redirect()->route('home')->with('sucess', 'Usuário cadastrado com sucesso!');;
    }
}
