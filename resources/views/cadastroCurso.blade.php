<!DOCTYPE html>

@extends('welcome')
@section('content')

    <head>
        <title>Cadastrar Usuário</title>
    </head>

    <body>
        <div class="text-center">
            <h1 class="display-10">Cadastro/Edição de curso<h1>
        </div>
    </body>
    <div class="container">
        <div class="row justify-center">
            <div class="col-md-6">
                <form action="/cursos" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome do curso</label>
                        <input type="text" id="nome" name="nome" class="form-control"
                            placeholder="Digite o nome do curso">

                    </div>
                    <br />
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textArea id="descricao" name="descricao" class="form-control" placeholder="Digite a descição do curso"></textArea>
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" id="valor" name="valor" class="form-control"
                            placeholder="Digite o valor do curso">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inicioCurso">Data de início das inscrições</label>
                        <input type="date" id="inicioCurso" name="inicioCurso" class="form-control"
                            placeholder="Digite a data de início das inscrições">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="terminoCurso">Data de término das inscrições</label>
                        <input type="date" id="terminoCurso" name="terminoCurso" class="form-control"
                            placeholder="Digite a data de término das inscrições">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="maxInscritos">Quantidade máxima de inscritos</label>
                        <input type="text" id="maxInscritos" name="maxInscritos" class="form-control"
                            placeholder="Digite a quantidade máxima de inscritos">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="material">Upload de arquivo com material</label>
                        <input type="file" id="material" name="material" class="form-control"
                            placeholder="Digite a quantidade máxima de inscritos">
                    </div>
                    <br />

                    <button type="submit" class="btn btn-primary w-100" value="Cadastrar Curso">Salvar</button>
                    <a class="btn btn-secondary w-100" href="{{ route('home') }}">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
