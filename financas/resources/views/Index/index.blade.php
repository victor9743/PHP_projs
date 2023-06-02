@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

    <?php 
        $arrayFinancas = [];
        $entradas = 0;
        $saidas = 0;
        $total = 0;

        foreach ($financaList->entradas as $key => $entrada) {
            array_push($arrayFinancas, ["id" => $entrada->id ,"tipo" => "entrada", "descricao" => $entrada->descricao, "valor" => $entrada->valor, "criadoEm" => $entrada->created_at, "removeLink" => 'entrada.remove']);
            $entradas += $entrada->valor;
        }

        foreach ($financaList->saidas as $key => $saida) {
            
            array_push($arrayFinancas, ["id" => $saida->id,"tipo" => "saida", "descricao" => $saida->descricao, "valor" => $saida->valor, "criadoEm" => $saida->created_at, "removeLink" => 'saida.remove']);
            $saidas += $saida->valor;
        }

        usort($arrayFinancas, function($a, $b) {
            $dataA = strtotime($a['criadoEm']);
            $dataB = strtotime($b['criadoEm']);

            if ($dataA == $dataB) {
                return 0;
            }
            return ($dataA < $dataB) ? 1 : -1;
        });
        $total = $entradas - $saidas;
    ?>
    <div>
        <?php echo session('msg'); ?>
    </div>
    <div class="container" style="margin-top: 90px;">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-success text-light">
                    <div class="card-title pt-2" style="padding-left: 10px">
                        <h3>Entradas</h3>
                    </div>
                    <div class="card-body">
                        R$ <?php echo "+ ".number_format($entradas / 100, 2, ',', '.'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger text-light">
                    <div class="card-title pt-2" style="padding-left: 10px">
                        <h3>Saídas</h3>
                    </div>
                    <div class="card-body">
                        R$ <?php echo "- ". number_format($saidas / 100, 2, ',', '.'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-light">
                    <div class="card-title pt-2" style="padding-left: 10px">
                        <h3>Saldo</h3>
                    </div>
                    <div class="card-body">
                        R$ <?php echo number_format($total / 100, 2, ',', '.'); ?>
                    </div>
            </div>
        </div>
    </div>
    <table class="table" style="margin-top: 20px">
        <thead>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data de Criação</th>
            <th class="text-center">Detalhes</th>
        </thead>
        <tbody>
            <?php foreach ($arrayFinancas as $key => $financa) { ?>
                <?php $date =  date_create($financa["criadoEm"]);?>
                <tr>
                    <td><?php echo $financa["descricao"] ?></td>
                    <td><?php echo number_format($financa["valor"] / 100, 2, ',', '.'); ?></td>
                    <td><?php echo date_format($date,"d-m-Y"); ?></td>
                    <td class="row flex-row-reverse d-flex justify-content-center">
                        <?php if ($financa["tipo"] == "entrada") { ?>
                            <div class="col-3">
                                <form action="/entrada/id/{{$financa["id"]}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Remover</button>
                                </form>
                            </div>

                            <div class="col-3">
                                <a class="btn btn-sm btn-warning" href="{{ route('entrada.show', ['id' => $financa["id"], 'tipo' => $financa["tipo"]]) }}">Detalhes</a>
                            </div>
                        <?php } else {  ?>
                            <div class="col-3">
                                <form action="/saida/id/{{$financa["id"]}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Remover</button>
                                </form>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-sm btn-warning" href="{{ route('saida.show', ['id' => $financa["id"], 'tipo' => $financa["tipo"]]) }}">Detalhes</a>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="row flex-row-reverse">
        <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="/entrada">Cadastrar Entrada</a>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-sm btn-danger" href="/saida">Cadastrar Saida</a>
        </div>
    </div>
    
    @endsection

    