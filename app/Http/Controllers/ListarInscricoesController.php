<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use App\Models\Curso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

class ListarInscricoesController extends Controller
{
    public function filtrarInscricoes()
    {
        $inscricoes = Inscricao::all();
        return view('listagemInscricoes', ['inscricoes' => $inscricoes]);
    }

    public function Index()
    {
        $inscricoes = Inscricao::all();
        return view('listagemInscricoes', ['inscricoes' => $inscricoes]);
    }

    public function GerarPDF()
    {
        $inscricoes = Inscricao::all();
        $pdf = Pdf::loadView('listagemInscricoesPDF', ['inscricoes' => $inscricoes]);
        return $pdf->download('Inscritos.pdf');
    }

    public function editar($id)
    {
        $cursos = Curso::all();
        $inscricoes = Inscricao::findOrFail($id);
        return view('editarInscricao', compact('inscricoes'), ['cursos' => $cursos]);
    }

    public function apagar($id)
    {
        $registro = Inscricao::find($id);
        try {
            if ($registro) {
                Inscricao::destroy($id);
                return redirect("listagemInscricoes")->with('sucess', 'Inscrição apagada');
            } else {
                return redirect("listagemInscricoes")->with('error', 'Erro ao localizar a inscrição');
            }
            return redirect("listagemInscricoes");
        } catch (Exception $e) {
            return redirect("listagemInscricoes")->with('error', 'Erro ao apagar a inscrição, erro: {$e}');
        }
    }

    public function atualizar(Request $request, $id)
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

        $request->validate($messages);

        $inscricoes = Inscricao::findOrFail($id);
        $inscricoes->nome = $request->input('nome');
        $inscricoes->email = $request->input('email');
        $inscricoes->CPF = $request->input('CPF');
        $inscricoes->endereco = $request->input('endereco');
        $inscricoes->empresa = $request->input('empresa');
        $inscricoes->telefone = $request->input('telefone');
        $inscricoes->celular = $request->input('celular');
        $inscricoes->categoria = $request->input('categoria');
        $inscricoes->curso = $request->input('curso');
        $inscricoes->UF = $request->input('UF');
        $inscricoes->senha = bcrypt($request->senha);

        $cursoSelecionado = $request->input('curso');
        $curso = Curso::where('valor', $cursoSelecionado)->first(); // Supondo que 'valor' seja o atributo do modelo Curso que corresponde ao valor do curso
        $inscricoes->curso = $curso->nome; // Armazenar o nome do curso em vez do valor

        $cursoSelecionado = $request->input('curso');
        $request->session()->put('cursoSelecionado', $cursoSelecionado);

        $inscricoes->save();

        return redirect('listagemInscricoes')->with('sucess', 'Item atualizado com sucesso!');
    }
}
