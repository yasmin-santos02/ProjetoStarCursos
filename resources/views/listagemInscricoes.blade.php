<!DOCTYPE html>
@extends('welcome')
@section('content')

    <head>
        <title>Listar inscrições</title>
        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
        <style>
            /* Defina o tamanho da fonte desejado para a tabela */
            #table-inscritos th,
            #table-inscritos td,
            #table-inscritos_info {
                font-size: 14px;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>

    <body>
        <section class="espacamento">
            <div class="text-center">
                <br>
                <h1 class="display-10">Lista e edição de inscritos</h1>
                <br>

                <table class="table" id="table-inscritos">
                    <thead>
                        <tr>
                            <th scope="col">Inscrito</th>
                            <th scope="col">Data de inscrição</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">CPF</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">UF</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Ações</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($inscricoes != null)
                            @foreach ($inscricoes as $inscricao)
                                <tr>
                                    <td scope="col">{{ $inscricao->nome }}</td>
                                    <td scope="col">{{ $inscricao->created_at }}</td>
                                    <td scope="col">{{ $inscricao->categoria }}</td>
                                    <td scope="col">{{ $inscricao->CPF }}</td>
                                    <td scope="col">{{ $inscricao->email }}</td>
                                    <td scope="col">{{ $inscricao->UF }}</td>
                                    <td scope="col">{{ $inscricao->status }}</td>
                                    <td scope="col">{{ $inscricao->valor }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a role="button" class="btn btn-primary"
                                                href="{{ route('editarInscricoes.editar', ['id' => $inscricao->id]) }}">Editar</a>

                                            <a role="button" class="btn btn-danger" href="{{ route('apagarInscricao', ['id' => $inscricao->id]) }}">Apagar</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <br />

                <a href="{{ route('documentoPDF.gerarPDF') }}">
                    <button type="button" class="btn btn-primary btn-sm">Exportar PDF</button>
                </a>
                <button type="button" class="btn btn-primary btn-sm">Exportar XLS</button>
                <br />
                <a class="btn btn-secondary w-50" href="{{ route('home') }}">Voltar</a>
            </div>
        </section>

        <script>
            //Criando os filtros de busca da tabela
            $(document).ready(function() {
                $('#table-inscritos').DataTable({
                    "ordering": true,
                    "paging": true,
                    "searching": true,
                    "oLanguage": {
                        "sEmptyTable": "Nenhum registro encontrado na tabela",
                        "sInfo": "Mostrar _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
                        "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Proximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Ultimo"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    }
                });
            });
        </script>
    </body>
@endsection
