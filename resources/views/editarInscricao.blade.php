<!DOCTYPE html>
@extends('layout')
@section('content')

    <head>
        <title>Editar Inscrição</title>
    </head>

    <body>
        <div class="text-center">
            <h1 class="display-10">Formulário de Edição<h1>
        </div>
    </body>
    <div class="container">
        <div class="row justify-center">
            <div class="col-md-6">
                <form action="{{ route('editarInscricoes.atualizar', ['id' => $inscricoes->id]) }}" method="post">
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

                    <div class="form-group">
                        <label for="CPF">CPF</label>
                        <input type="text" id="CPF" name="CPF" class="form-control"
                            placeholder="Digite o celular para inscrição">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco" class="form-control"
                            placeholder="Digite o endereço para inscrição">
                    </div>
                    <br />

                    <select name="UF" for="UF" id="UF">
                        <option value="">Selecione o estado</option>
                        <?php
                        $estados = [
                            'AC' => 'Acre',
                            'AL' => 'Alagoas',
                            'AP' => 'Amapá',
                            'AM' => 'Amazonas',
                            'BA' => 'Bahia',
                            'CE' => 'Ceará',
                            'DF' => 'Distrito Federal',
                            'ES' => 'Espírito Santo',
                            'GO' => 'Goiás',
                            'MA' => 'Maranhão',
                            'MT' => 'Mato Grosso',
                            'MS' => 'Mato Grosso do Sul',
                            'MG' => 'Minas Gerais',
                            'PA' => 'Pará',
                            'PB' => 'Paraíba',
                            'PR' => 'Paraná',
                            'PE' => 'Pernambuco',
                            'PI' => 'Piauí',
                            'RJ' => 'Rio de Janeiro',
                            'RN' => 'Rio Grande do Norte',
                            'RS' => 'Rio Grande do Sul',
                            'RO' => 'Rondônia',
                            'RR' => 'Roraima',
                            'SC' => 'Santa Catarina',
                            'SP' => 'São Paulo',
                            'SE' => 'Sergipe',
                            'TO' => 'Tocantins',
                        ];
                        
                        foreach ($estados as $sigla => $estado) {
                            echo "<option value=\"$sigla\">$estado</option>";
                        }
                        ?>
                    </select>
                    <br />
                    <br />

                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input type="text" id="empresa" name="empresa" class="form-control"
                            placeholder="Digite a empresa para inscrição">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control"
                            placeholder="Digite o telefone fixo para inscrição">
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" id="celular" name="celular" class="form-control"
                            placeholder="Digite o celular para inscrição">
                    </div>
                    <br />

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
                        <label for="curso">Curso</label>
                        <select class="form-control" id="curso" name="curso">
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->valor }}">{{ $curso->nome }}</option>
                            @endforeach

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
                    <br />
                    <button type="submit" class="btn btn-primary w-100">Salvar</button>
                    <a class="btn btn-secondary w-100" href="{{ route('home') }}">Voltar</a>

                </form>
            </div>
        </div>
    </div>
@endsection
