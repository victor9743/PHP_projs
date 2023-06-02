@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')
    <div class="container" style="margin-top: 80px">
        <div class="card">
            <div class="card-header bg-danger text-light">
                Cadastrar Saida
            </div>
            <div class="card-body">
                <form action="/saida" method="POST" class="row">
                    @csrf
                    <?php if(isset($id)) { ?>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    <?php } ?>
                    <div class="col-sm-6">
                        <label for="descricao">Descricao</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" <?php if(isset($saida->saida[0]->descricao)) {?> value="<?php echo $saida->saida[0]->descricao ?>" <?php } ?>>
                    </div>
                    <div class="col-sm-6">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" name="valor" id="valor" <?php if(isset($saida->saida[0]->valor)) {?> value="<?php echo $saida->saida[0]->valor ?>" <?php } ?>>
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