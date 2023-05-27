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
        
        array_push($arrayFinancas, ["id" => $entrada->id,"tipo" => "saida", "descricao" => $saida->descricao, "valor" => $saida->valor, "criadoEm" => $saida->created_at, "removeLink" => 'saida.remove']);
        $saidas += $entrada->saida;
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
<div>
    <div>
        <h3>Entradas</h3>
        <div>
            R$ <?php echo "+ ".number_format($entradas / 100, 2, ',', '.'); ?>
        </div>
    </div>
    <div>
        <h3>Saídas</h3>
        <div>
            R$ <?php echo "- ". number_format($saidas / 100, 2, ',', '.'); ?>
        </div>
    </div>
    <div>
        <h3>Saldo</h3>
        <div>
            R$ <?php echo number_format($total / 100, 2, ',', '.'); ?>
        </div>
    </div>
</div>
<table>
    <thead>
        <th>Descrição</th>
        <th>Valor</th>
        <th>Data de Criação</th>
        <th>Detalhes</th>
    </thead>
    <tbody>
        <?php foreach ($arrayFinancas as $key => $financa) { ?>
            <?php $date =  date_create($financa["criadoEm"]);?>
            <tr>
                <td><?php echo $financa["descricao"] ?></td>
                <td><?php echo number_format($financa["valor"] / 100, 2, ',', '.'); ?></td>
                <td><?php echo date_format($date,"d-m-Y"); ?></td>
                <td>
                    <a href="{{ route('entrada.show', ['id' => $financa["id"], 'tipo' => $financa["tipo"]]) }}">Detalhes</a>

                    <form action="/entrada/id/{{$financa["id"]}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Remover</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<a href="/entrada">Cadastrar Entrada</a>
<a href="">Cadastrar Saida</a>