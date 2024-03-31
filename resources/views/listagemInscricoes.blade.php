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
    </head>

    <body>
        <section class="espacamento">
            <div class="text-center">
                <br>
                <h1 class="display-10">Lista e edição de inscritos</h1>
                <br>

                <div class="flex mb-4">
                    <div class="type">
                        <span>Pesquisa por tipo: </span>
                        <select id="select-column" class="border">
                            <option value="6">Status</option>
                            <option value="0">Inscrito</option>
                            <option value="1">Período</option>
                        </select>
                    </div>
                    
                    <div class="busca-coluna">
                    <span>Busca: </span>
                    <input type="text" id="busca" placeholder="Pesquisar...">
                </div>
                </div>

                <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" />
                <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

                <script>
                    $(document).ready(function() {
                        var dataTable = $('#table-inscritos').DataTable({
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
                                "sSearch": "Pesquisa geral: ",
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

                        $('#busca').on('keyup', function() {
                            var columnIndex = $('#select-column').val(); // Obtém o índice da coluna selecionada
                            dataTable.columns().search('').draw(); // Limpa a pesquisa atual em todas as colunas
                            dataTable.column(columnIndex).search(this.value)
                        .draw(); // Aplica a pesquisa à coluna selecionada
                        });

                        // Atualiza a pesquisa ao alterar a coluna selecionada
                        $('#select-column').on('change', function() {
                            var columnIndex = $(this).val(); // Obtém o índice da coluna selecionada
                            dataTable.columns().search('').draw(); // Limpa a pesquisa atual em todas as colunas
                            dataTable.column(columnIndex).search($('#busca').val())
                        .draw(); // Aplica a pesquisa à coluna selecionada
                        });
                    });
                </script>

                <table class="table" id="table-inscritos">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="text-center">Inscrito</th>
                            <th scope="col" class="text-center">Data de inscrição</th>
                            <th scope="col" class="text-center">Categoria</th>
                            <th scope="col" class="text-center">CPF</th>
                            <th scope="col" class="text-center">E-mail</th>
                            <th scope="col" class="text-center">UF</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Total</th>
                            <th scope="col" class="text-center">Ações</th>
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

                                            <a role="button" class="btn btn-danger"
                                                href="{{ route('apagarInscricao', ['id' => $inscricao->id]) }}">Apagar</a>
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
    </body>
@endsection
