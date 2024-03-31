<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;
use Exception;
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

    public function apagar($id){
        $registro = Curso::find($id);
        try
            {
                if ($registro)
                {
                    Curso::destroy($id);
                    return redirect("listagemCursos")->with('sucess', 'Curso apagado');
                }
                else
                {
                    return redirect("listagemCursos")->with('error', 'Erro ao localizar o curso');
                }
                return redirect("listagemCursos");
            }
            catch (Exception $e)
            {
                return redirect("listagemCursos")->with('error', 'Erro ao apagar o curso, erro: {$e}');
            }
    }
}
