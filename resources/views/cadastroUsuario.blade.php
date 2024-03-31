<!DOCTYPE html>

@extends('welcome')
@section('content')

    <head>
        <title>Cadastrar Usuário</title>
    </head>

    <body>
        <div class="text-center">
            <h1 class="display-10">Cadastro de Usuário<h1>
        </div>
    </body>

    <div class="container">
        <div class="row justify-center">
            <div class="col-md-6">
                <form action="/cadastroUsuario" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control"
                            placeholder="Digite o nome para inscrição">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Digite o e-mail para inscrição">
                    </div>
                    <br />

                    <!--CORRIGIR PARA CATEGORIA-->
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <option value="Estudante">Estudante</option>
                            <option value="Profissional">Profissional</option>
                            <option value="Associado">Associado</option>
                        </select>
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control"
                            placeholder="Digite a senha para inscrição">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="senha_confirmation">Confirmação da senha</label>
                        <input type="password" id="senha_confirmation" name="senha_confirmation" class="form-control"
                            placeholder="Confirme a senha">
                    </div>
                    <br />

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary w-100" value="Cadastrar Usuario">Salvar</button>
                    <a class="btn btn-secondary w-100" href="{{ route('home') }}">Voltar</a>

                </form>
            </div>
        </div>
    </div>
@endsection
