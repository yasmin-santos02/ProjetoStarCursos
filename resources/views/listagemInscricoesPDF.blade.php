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
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Lista de inscritoss</h1>

<table>
    <thead>
        <tr>
            <th>Inscrito</th>
            <th>Data de inscrição</th>
            <th>Categoria</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>UF</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inscricoes as $inscricao)
        <tr>
            <td>{{ $inscricao->nome }}</td>
            <td>{{ $inscricao->created_at }}</td>
            <td>{{ $inscricao->categoria }}</td>
            <td>{{ $inscricao->CPF }}</td>
            <td>{{ $inscricao->email }}</td>
            <td>{{ $inscricao->UF }}</td>
            <td>{{ $inscricao->status }}</td>
            <td>{{ $inscricao->valor }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
