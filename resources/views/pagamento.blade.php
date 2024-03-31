<form action="{{ url('charge') }}" method="post" id="paymentForm">
    <input type="text" name="amount" id="amount" readonly />
    {{ csrf_field() }}
    <input type="submit" name="submit" value="Pagar">
</form>

<script>
    // Preencher o campo de valor com o valor do curso da sessão
    var cursoSelecionado = "{{ session('cursoSelecionado') }}";
    document.getElementById("amount").value = cursoSelecionado;
</script>
