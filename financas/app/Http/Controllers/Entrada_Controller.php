<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Entrada;

class Entrada_Controller extends Controller
{

    function __construct() {
        $this->modelConnection = new Entrada;
    }

    public function show()
    {
        $this->objeto = new \stdClass;
        if (request('id') && request('tipo')) {
            $this->objeto->entrada = DB::select('select * from '.request('tipo').'s where id = ?', [request('id')]);
        }

        return view("Entradas.new", ["entrada" => $this->objeto, "id" => request('id')]);
    }

    public function salvar(Request $campos)
    {
        try {
            $this->query = $this->modelConnection::salvar(["descricao" => $campos->descricao, "valor" => $campos->valor]);
            
            if ($this->query) {
                self::log(["descricao" => "Requisicao com token ". $campos->_token." salvar com sucesso"]);
            }
            return redirect("/")->with('msg','Requisição criado com sucesso !!!');

        } catch (\Throwable $th) {
            $this->query = $th->getMessage();
            self::logErro(["descricao" => $this->query ]);
            
            return view('errors.500', ['erro'=> false]);
        }
    }

    // public function ($id)
    // {
    //     return view('Entradas.save', [''=> false]);   
    // }
}
