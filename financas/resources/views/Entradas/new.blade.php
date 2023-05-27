<form action="/entrada" method="POST">
    @csrf
    <?php if(isset($id)) { ?>
        <input type="hidden" name="id" value="<?php echo $id ?>">
    <?php } ?>
    <div>
        <label for="descricao">Descricao</label>
        <input type="text" name="descricao" id="descricao" <?php if(isset($entrada->entrada[0]->descricao)) {?> value="<?php echo $entrada->entrada[0]->descricao ?>" <?php } ?>>
    </div>
    <div>
        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor" <?php if(isset($entrada->entrada[0]->valor)) {?> value="<?php echo $entrada->entrada[0]->valor ?>" <?php } ?>>
    </div>
    <input type="submit" value="Salvar">
</form>