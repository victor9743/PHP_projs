<?php
    $arquivo = fopen('teste.csv', 'r');

    $row = 1;
    $array = [];
    $obj_dados = [];
    if (($handle = $arquivo) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c=0; $c < $num; $c++) {
                array_push($array, preg_split('/\s+/',  $data[$c], -1, PREG_SPLIT_NO_EMPTY));
            }
            
        }

        for ($i=1; $i < sizeof($array)-1 ; $i++) {
            array_push($obj_dados, man_array($array[$i][0], $array[$i][1], $array[$i][2]));
        }

        var_dump($obj_dados);

        fclose($handle);
    }

    function man_array($id, $nome, $idade){
        return [
            "id" => $id,
            "nome" => $nome,
            "idade" => $idade
        ];
    }
    
?>  