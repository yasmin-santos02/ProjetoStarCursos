<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View;
use App\Models\Curso;

class CadastroCursoController extends Controller
{
  public function curso()
  {
    return view('cadastroCurso');
  }

  public function store(Request $request)
  {
    $curso = new Curso;
    $curso->nome = $request->nome;
    $curso->descricao = $request->descricao;
    $curso->valor = $request->valor;
    $curso->inicioCurso = $request->inicioCurso;
    $curso->terminoCurso = $request->terminoCurso;
    $curso->maxInscritos = $request->maxInscritos;
    $curso->material = $request->material;

    $curso->save();

    return redirect()->route('home')->with('sucess', 'Curso cadastrado com sucesso!');;
  }
}