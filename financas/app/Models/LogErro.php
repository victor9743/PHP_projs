<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogErro extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = ['descricao'];

    public function getAll() 
    {

    }

    protected static function salvar($arrayCampos) 
    {
        self::create($arrayCampos);
    }

}
