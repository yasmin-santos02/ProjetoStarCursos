<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap');

            {
            margin: 0;
            padding: 0;
        }

        #bodyPag {
            background-color: rgb(236, 236, 236);
            font-family: "Sora", sans-serif;
        }

        #sectionPag {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 25%;
        }

        #h2Pag {
            margin-bottom: 20px;
            margin-left: 26px;
            margin-top: 10px;
            font-size: 1.7em;
        }

        #container {
            justify-content: center;
            align-items: center;
            background-color: white;
            margin-left: auto;
            margin-right: auto;
            position: absolute;
            padding: 60px;
            height: 270px;
            box-shadow: 0px 0px 11px 11px rgba(0, 0, 0, 0.1);
        }

        .valor {
            border: none;
            margin-top: 40px;
            margin-left: 10px;
            margin-right: 10px;
            font-weight: bold;
            width: 100px;
            font-size: 50px;
            color: rgb(96, 96, 241);
        }

        .valor-btn {
            position: absolute;
            margin-top: 170px;
            border: none;
            margin-left: -165px;
            background-color: rgb(96, 96, 241);
            color: white;
            padding: 10px;
            border-radius: 15px;
            width: 100px;
            font-weight: bold;
        }

        .valor-btn:hover {
            cursor: pointer;
            background-color: rgb(61, 61, 243);
            transition: background-color 0.6s;
        }

        input,
        input::placeholder {
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <link href="{{ asset('/img/star.ico') }}" rel="icon" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Cursos - pagamento</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="bodyPag">

    <section id="sectionPag">
    <div id="container">
        <h2 id="h2Pag">Pagamento</h2>
        <form action="{{ url('charge') }}" method="post" id="paymentForm">
            <span class="valor">R$</span>
            <input type="text" name="amount" id="amount" readonly class="valor" />
            {{ csrf_field() }}
            <input type="submit" name="submit" value="Pagar" class="valor-btn">
        </form>
        <script>
            // Preencher o campo de valor com o valor do curso da sessão
            var cursoSelecionado = "{{ session('cursoSelecionado') }}";
            document.getElementById("amount").value = cursoSelecionado; // Envie apenas o valor numérico
        </script>
    </div>
</section>


</body>

</html>
