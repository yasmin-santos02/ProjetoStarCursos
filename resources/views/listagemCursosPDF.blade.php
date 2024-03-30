<!DOCTYPE html>
<html>

<head>
    <style>
        /* Estilo para o PDF */
        body {
            font-family: 'Nunito', sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Lista de Cursos</h1>

    <table>
        <thead>
            <tr>
                <th>Curso</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Início</th>
                <th>Término</th>
                <th>Inscritos</th>
                <th>Material</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->descricao }}</td>
                    <td>{{ $curso->valor }}</td>
                    <td>{{ $curso->inicioCurso }}</td>
                    <td>{{ $curso->terminoCurso }}</td>
                    <td>{{ $curso->maxInscritos }}</td>
                    <td>{{ $curso->material }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
