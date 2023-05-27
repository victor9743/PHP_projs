<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LogErro extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = ['descricao'];

    protected static function salvar($descricao) 
    {
        return DB::insert('insert into log_erros (descricao, created_at) values (?, ?)', [$descricao, date("Y-m-d H:i:s")]);
    }

}
