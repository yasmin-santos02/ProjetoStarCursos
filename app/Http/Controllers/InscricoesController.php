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
        'CPF' => 'required|size:11',
        'telefone' => 'required|size:10',
        'celular' => 'required|size:11',
        'UF' => 'required',
        'endereco' => 'required',
        'empresa' => 'required'
      ]
    );

    // Definindo as mensagens de erro personalizadas
    $messages = [
      'nome.required' => 'O campo nome é obrigatório.',
      'email.required' => 'O campo email é obrigatório.',
      'senha.required' => 'O campo senha é obrigatório',
      'CPF.required' => 'O campo CPF é obrigatório e deve conter 11 dígitos (incluindo DDD).',
      'telefone.required' => 'O campo telefone é obrigatório e deve conter 10 dígitos (incluindo DDD).',
      'celular.required' => 'O campo celular é obrigatório.',
      'UF.required' => 'O campo estado é obrigatório',
      'endereco' => 'required',
      'empresa' => 'required'
    ];

    // Valide os dados do formulário
    $request->validate($messages);

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
    $curso = Curso::where('valor', $cursoSelecionado)->first(); // Supondo que 'valor' seja o atributo do modelo Curso que corresponde ao valor do curso
    $inscricao->curso = $curso->nome; // Armazenar o nome do curso em vez do valor

    $cursoSelecionado = $request->input('curso');
    $request->session()->put('cursoSelecionado', $cursoSelecionado);

    $inscricao->senha = bcrypt($request->senha);

    $inscricao->save();

    return redirect()->route('pagamento')->with('sucess', 'Inscrição realizada com sucesso!');
  }
}
