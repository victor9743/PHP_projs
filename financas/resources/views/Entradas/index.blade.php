<?php if(isset($msg)) { ?>
    <div>
        Entrada salva com sucesso
    </div>
<?php } ?>


<form action="/entrada" method="POST">
    @csrf
    <div>
        <label for="">Descricao</label>
        <input type="text" name="descricao">
    </div>
    <div>
        <label for="">Valor</label>
        <input type="number" name="valor">
    </div>
    <input type="submit" value="Salvar">
</form>