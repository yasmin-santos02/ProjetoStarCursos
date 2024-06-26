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

  public function inscricaoPagamento(Request $request)
  {
    $cursoValor = $request->input('curso');
    return view('pagamento', ['cursoValor' => $cursoValor]);
  }

  public function store(Request $request)
  {

    $request->validate(
      [
        'senha' => 'required|confirmed',
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'CPF' => 'required|size:14',
        'telefone' => 'required|size:13',
        'celular' => 'required|size:14',
        'UF' => 'required',
        'endereco' => 'required',
        'empresa' => 'required'
      ]
    );

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

    $cursoSelecionado = $request->input('curso');
    $curso = Curso::where('valor', $cursoSelecionado)->first(); 
    $inscricao->curso = $curso->nome;

    $cursoSelecionado = $request->input('curso');
    $request->session()->put('cursoSelecionado', $cursoSelecionado);

    $inscricao->senha = bcrypt($request->senha);

    $inscricao->save();

    return redirect()->route('pagamento');
  }
}
