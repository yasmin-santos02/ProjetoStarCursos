<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class ListarCursosController extends Controller
{
    public function filtrarCursos()
    {
        $cursos = Curso::all();
        return view('listagemCursos', ['cursos' => $cursos]);
    }

    public function Index()
    {
        $cursos = Curso::all();
        return view('listagemCursos', ['cursos' => $cursos]);
    }

    public function GerarPDF()
    {
        $cursos = Curso::all();
        $pdf = Pdf::loadView('listagemCursosPDF', ['cursos' => $cursos]);
        return $pdf->download('Inscritos.pdf');
    }
}
