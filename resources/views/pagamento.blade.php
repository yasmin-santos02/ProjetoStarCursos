
<!--<form id="form-pagamento" action="{{ url('charge') }}" method="post">
    <input type="text" name="amount" id="amount" />
    {{ csrf_field() }}
     Não é mais necessário o botão de envio
</form>

<script>
    // Obtém o valor do curso da variável PHP na view
    var cursoValor = "{{ $cursoValor }}";

    // Preenche o campo de valor no formulário com o valor do curso
    document.getElementById('amount').value = cursoValor;

    // Redireciona automaticamente após 1 segundo
    setTimeout(function() {
        document.getElementById('form-pagamento').submit();
    }, 1000);
</script>-->


<form action="{{ url('charge') }}" method="post">
    <input type="text" name="amount" />
    {{ csrf_field() }}
    <input type="submit" name="submit" value="Pay Now">
</form>
