<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Saida extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor'];

    public function getAll() 
    {
        return DB::table("saidas")->get();
    }

    protected static function salvar($descricao, $valor, $id = "") 
    {
        if(empty($id)) {
            return DB::insert('insert into saidas (descricao, valor, created_at) values (?, ?, ?)', [$descricao, $valor, date("Y-m-d H:i:s")]);
        } else {
            return DB::table('saidas')
                ->where('id', '=', $id)
                ->update(['descricao' => $descricao, 'valor' => $valor]);
        }
    }

    protected static function remover($id)
    {
        return DB::table('saidas')->delete($id);
    }
}
