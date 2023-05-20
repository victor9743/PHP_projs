<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Log;
use App\Models\LogErro;

class Entrada_Controller extends Controller
{

    function __construct() {
        $this->modelConnection = new Entrada;
    }

    public function index() 
    {
        return view("Entradas.index");
    }

    public function salvar(Request $campos)
    {
        try {
            $query = $this->modelConnection::salvar(["descricao" => $campos->descricao, "valor" => $campos->valor]);

            if ($query) {
                self::log(["descricao" => "Requisicao com token ". $campos->_token." salvar com sucesso"]);
            }

            return view('entradas.index', ['msg'=> $query]);

        } catch (\Throwable $th) {
            $query = $th->getMessage();
            self::logErro(["descricao" => $query ]);
            
            return view('errors.500', ['erro'=> false]);
        }
    }
}
