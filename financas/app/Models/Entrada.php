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

    protected static function salvar($arrayCampos) 
    {
        if(self::create($arrayCampos)) {
            return true;

        } else {
            return false;
        }
    }

}
