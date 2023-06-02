@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

    <div class="container" style="margin-top: 80px">
        <div class="card">
            <div class="card-header bg-success text-light">
                Cadastrar Entrada
            </div>
            <div class="card-body">
                <form action="/entrada" method="POST" class="row">
                    @csrf
                    <?php if(isset($id)) { ?>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    <?php } ?>
                    <div class="col-sm-6">
                        <label for="descricao">Descricao</label><br>
                        <input class="form-control" type="text" name="descricao" id="descricao" <?php if(isset($entrada->entrada[0]->descricao)) {?> value="<?php echo $entrada->entrada[0]->descricao ?>" <?php } ?>>
                    </div>
                    <div class="col-sm-6">
                        <label for="valor">Valor</label>
                        <input class="form-control" type="text" name="valor" id="valor" <?php if(isset($entrada->entrada[0]->valor)) {?> value="<?php echo $entrada->entrada[0]->valor ?>" <?php } ?>>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a class="btn btn-sm btn-light" href="/">Voltar</a>
                        <input class="btn btn-sm btn-primary" type="submit" value="Salvar">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#valor').mask('R$ 000.000.000,00', {reverse: true});
    });
</script>
@endsection