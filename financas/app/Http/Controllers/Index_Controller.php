<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use Illuminate\Support\Facades\DB;

class Index_Controller extends Controller
{
    private $entradas, $saidas, $financa;
    function __construct() {
        $this->modelConnection = new Entrada;
        $this->objeto = new \stdClass;
    }

    public function index() 
    {
        try {
            $this->objeto->entradas = DB::table("entradas")->get();
            $this->objeto->saidas = DB::table("saidas")->get();
            
            return view('Index.index', ['financaList'=> $this->objeto]);
        } catch (\Throwable $th) {
            $query = $th->getMessage();
            self::logErro(["descricao" => "Erro: ".$query ]);
            
            return view('errors.500', ['erro'=> "Erro: ".$query]);
        }
       
    }
}
