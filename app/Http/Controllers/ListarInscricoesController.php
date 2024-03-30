<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $inscricoes = Inscricao::findOrFail($id);
        return view('editarInscricao', compact('inscricoes'));
    }

    public function atualizar(Request $request, $id)
    {
        $inscricoes = Inscricao::findOrFail($id);
        $inscricoes->nome = $request->input('nome');
        $inscricoes->email= $request->input('email');
        $inscricoes->CPF = $request->input('CPF');
        $inscricoes->endereco = $request->input('endereco');
        $inscricoes->empresa = $request->input('empresa');
        $inscricoes->telefone = $request->input('telefone');
        $inscricoes->celular = $request->input('celular');
        $inscricoes->categoria = $request->input('categoria');
        $inscricoes->curso = $request->input('curso');
       // $inscricoes->UF= $request->input('UF');
       // $inscricoes->status= $request->input('status');
       // precisa verificar para atualizar o valor de acordo com o curso
       // $inscricoes->valor= $request->input('valor');
        $inscricoes->save();

        return redirect('/')->with('success', 'Item atualizado com sucesso!');
    }
}
