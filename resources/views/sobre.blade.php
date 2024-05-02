<!DOCTYPE html>

<title>Star Cursos - Sobre</title>

@extends('welcome')
@section('content')

    <head>
    </head>

    <body>
        <div class="text-center">
            <h1 class="display-10">Sobre o Projeto<h1>
        </div>
        <div class="container">
            <div class="content-box">
                <p>

                    O projeto "Star Cursos" é uma aplicação web desenvolvida com o objetivo principal de um sistema de inscrições para cursos oferecidos
                    pela
                    empresa fictícia Star Cursos. O sistema deve permitir que os alunos se inscrevam nos cursos desejados, com
                    diferenciação de
                    valores por curso, integração com um gateway de pagamento PayPal para
                    processamento de transações financeiras e controle de vendas com dados fictícios via sandbox.
                </p>
                <p>
                    Características Principais:
                    <br>
                    1. Cadastro de Alunos e Inscrições: Os alunos poderão se cadastrar no sistema e se inscrever nos cursos
                    disponíveis. Os dados necessários para o cadastro incluem nome, email, CPF, endereço, telefone, entre
                    outros.
                    <br>
                    2. Diferenciação de Valores por Curso: Cada curso pode ter um valor diferente de inscrição. O sistema
                    deve
                    permitir a configuração desses valores e aplicá-los corretamente durante o processo de inscrição.
                    <br>
                    3. Integração com Gateway de Pagamento: O sistema deve ser integrado a um gateway de pagamento para
                    processar as transações financeiras. Isso permitirá que os alunos paguem pelas inscrições de forma
                    segura e
                    conveniente.
                    <br>
                    4. Controle de Vendas e Inscrições: O sistema deve fornecer uma área administrativa onde os
                    administradores
                    possam visualizar todas as inscrições realizadas. Eles devem ter a capacidade de editar, excluir e
                    exportar
                    esses dados em formatos como Excel e PDF.
                    <br>
                    5. Layout e Frontend: Embora o foco principal do projeto seja na lógica de negócios e funcionalidades, o
                    layout e o frontend também são importantes. O sistema deve fornecer uma interface limpa e intuitiva para
                    os
                    usuários, seguindo as melhores práticas de usabilidade.
                    <br>
                </p>
                <p>
                    Tecnologias Utilizadas:
                    <br>
                    - Linguagem: PHP<br>
                    - Framework: Laravel<br>
                    - Banco de Dados: MySQL<br>
                    - Orientação a Objetos: O projeto segue uma arquitetura orientada a objetos, utilizando o padrão de
                    arquitetura MVC (Model-View-Controller) para garantir uma separação clara de responsabilidades e
                    facilitar a
                    manutenção e expansão do código.
                </p>

                <p>
                    Considerações Finais:
                    <br>
                    O projeto "Star Cursos" foi desenvolvido com o objetivo de demonstrar as habilidades técnicas e
                    de
                    desenvolvimento de Yasmin Santos. Utilizando as melhores práticas e recursos oferecidos pelo Laravel, a
                    aplicação busca oferecer uma solução eficiente e escalável para o gerenciamento de inscrições em cursos
                    online.
                </p>
            </div>
    </body>
@endsection
