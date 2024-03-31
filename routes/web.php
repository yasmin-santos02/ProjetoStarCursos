<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscricoesController;
use App\Http\Controllers\ListarInscricoesController;
use App\Http\Controllers\CadastroCursoController;
use App\Http\Controllers\ListarCursosController;
use App\Http\Controllers\PagamentoController;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/inscricoes', [InscricoesController::class, 'create'])->name('inscricoes.create');
Route::get('/listagemInscricoes', [ListarInscricoesController::class, 'filtrarInscricoes'])->name('listagemInscricoes.filtrar');

Route::get('/cadastroUsuario', [CadastroController::class, 'cadastrar'])->name('cadastroUsuario.cadastrar');
Route::get('/editarInscricoes/{id}', [ListarInscricoesController::class, 'editar'])->name('editarInscricoes.editar');
Route::get('/apagarinscrição/{id}', [ListarInscricoesController::class, 'apagar'])->name('apagarInscricao');

Route::get('/apagarCurso/{id}', [ListarCursosController::class, 'apagar'])->name('apagarCurso.apagar');

Route::post('/editar/{id}', 'App\Http\Controllers\ListarInscricoesController@atualizar');
Route::post('/editarInscricoes/{id}', [ListarInscricoesController::class, 'atualizar'])->name('editarInscricoes.atualizar');

Route::get('/editar/{id}', [ListarInscricoesController::class, 'editar'])->name('editarInscricoes.editar');

Route::get('/cadastroCurso', [CadastroCursoController::class, 'curso'])->name('cadastroCurso.cadastrar');
Route::get('/listagemCursos', [ListarCursosController::class, 'filtrarCursos'])->name('listagemCursos.filtrarCursos');

Route::get('/documentoPDF', [ListarInscricoesController::class, 'GerarPDF'])->name('documentoPDF.gerarPDF');

Route::get('/documentoCursoPDF', [ListarCursosController::class, 'GerarPDF'])->name('documentoCursoPDF.gerarPDF');

Route::post('/cursos', [CadastroCursoController::class, 'store']);
Route::post('/inscricoes', [InscricoesController::class, 'store']);
Route::post('/cadastroUsuario', [CadastroController::class, 'store']);

Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

Route::get('/pagamento', function () {
    return View('pagamento');
})->name('pagamento');

Route::get('payment', [PagamentoController::class, 'index']);
Route::post('charge', [PagamentoController::class, 'charge']);
Route::get('paymentsuccess', [PagamentoController::class, 'payment_success']);
Route::get('paymenterror', [PagamentoController::class, 'payment_error']);
Route::get('/inscricaoPagamento', [InscricoesController::class,  'inscricaoPagamento'])->name('pagamento');
