<?php


return [
    'custom' => [
        'senha' => [
            'required' => 'O campo senha é obrigatório.',
            'min' => 'A senha deve ter no mínimo :min caracteres.',
            'confirmed' => 'A confirmação de senha não coincide com a senha fornecida.',
        ],
        'nome' => ['required' => 'O campo nome é obrigatório.'],
        'email' => ['required' => 'O campo email é obrigatório.'],
        'CPF' => [
            'required' => 'O campo CPF é obrigatório.',
            'size' => 'O campo CPF deve conter 11 dígitos (incluindo DDD).'
        ],
        'telefone' => [
            'required' => 'O campo telefone é obrigatório.',
            'size' => 'O campo telefone deve conter 10 dígitos (incluindo DDD).'
        ],
        'celular' => [
            'required'  => 'O campo celular é obrigatório.',
            'size' => 'O campo celular deve conter 11 dígitos (incluindo DDD).'
        ],
        'UF' => ['required' => 'O campo estado é obrigatório'],
        'endereco' => ['required' => 'O campo endereço é obrigatório'],
        'empresa' => ['required' => 'O campo empresa é obrigatório.'],
       
      'descricao' => ['required' => 'O campo descricao é obrigatório.'],
      'valor' => ['required' => 'O campo valor é obrigatório'],
      'inicioCurso' => ['required' => 'O campo inicio curso é obrigatório'],
      'terminoCurso' => ['required' => 'O campo termino curso é obrigatório'],
      'maxInscritos' => ['required' => 'O campo quantidade máxima de inscritos é obrigatório.'],
      'material' => ['required' => 'O campo material é obrigatório'],
    ],
];
