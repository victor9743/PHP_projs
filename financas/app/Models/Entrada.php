<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor'];

    public function getAll() 
    {

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
