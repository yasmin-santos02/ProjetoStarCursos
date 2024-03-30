<!DOCTYPE html>
@extends('welcome')
@section('content')

    <head>
        <title>LISTAR CURSOS</title>
        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
        <style>
            /* Defina o tamanho da fonte desejado para a tabela */
            #table-cursos th,
            #table-cursos td,
            #table-cursos_info {
                font-size: 14px;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    </head>

    <body>
        <section class="espacamento">
            <div class="text-center">
                <br>
                <h1 class="display-10">Lista de cursos</h1>
                <br>

                <table class="table" id="table-cursos">
                    <thead>
                        <tr>
                            <th scope="col">Curso</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Início</th>
                            <th scope="col">Término</th>
                            <th scope="col">Inscritos</th>
                            <th scope="col">Material</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($cursos != null)
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td scope="col">{{ $curso->nome }}</td>
                                    <td scope="col">{{ $curso->descricao }}</td>
                                    <td scope="col">{{ $curso->valor }}</td>
                                    <td scope="col">{{ $curso->inicioCurso }}</td>
                                    <td scope="col">{{ $curso->terminoCurso }}</td>
                                    <td scope="col">{{ $curso->maxInscritos }}</td>
                                    <td scope="col">{{ $curso->material }}</td>
                                    <td scope="col"></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
                <!--PRECISA TERMINAR E PROCURAR COMO FAZ ESTA MERDA-->
                <a href="{{ route('documentoCursoPDF.gerarPDF') }}">
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
                $('#table-cursos').DataTable({
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
