<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Entrada extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor'];

    public function getAll() 
    {
        return DB::table("entradas")->get();
    }

    protected static function salvar($descricao, $valor, $id = "") 
    {
        if(empty($id)) {
            return DB::insert('insert into entradas (descricao, valor, created_at) values (?, ?, ?)', [$descricao, $valor, date("Y-m-d H:i:s")]);

        } else {
            
            return DB::table('entradas')
                ->where('id', '=', $id)
                ->update(['descricao' => $descricao, 'valor' => $valor]);
        }
    }

    protected static function remover($id)
    {
        return DB::table('entradas')->delete($id);
    }

}
