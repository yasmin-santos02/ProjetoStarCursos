<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\Curso;

class InscricoesController extends Controller
{
  public function create()
  {
    $inscricoes = Inscricao::all();
    $cursos = Curso::all();
    return view('inscricoes')->with('cursos', $cursos);
  }

  public function inscricaoPagamento(Request $request){
    $cursoValor = $request->input('curso');
    return view('pagamento', ['cursoValor' => $cursoValor]);
  }

  public function store(Request $request)
  {
    $inscricao = new Inscricao;
    $inscricao->nome = $request->nome;
    $inscricao->email = $request->email;
    $inscricao->CPF = $request->CPF;
    $inscricao->endereco = $request->endereco;
    $inscricao->UF = $request->UF;
    $inscricao->empresa = $request->empresa;
    $inscricao->telefone = $request->telefone;
    $inscricao->celular = $request->celular;
    $inscricao->categoria = $request->categoria;
    $inscricao->curso = $request->curso;

    //verificação se as senhas correspondem
    $request->validate(
      [
        'senha' => 'required|confirmed'
      ]
    );

    $inscricao->senha = bcrypt($request->senha);

    $inscricao->save();

    return redirect()->route('home')->with('sucess', 'Inscrição realizada com sucesso!');
  }
}
