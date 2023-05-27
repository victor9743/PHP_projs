<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Log;
use App\Models\LogErro;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $modelConnection, $query, $objeto, $db;

    public function log($msg)
    {
        Log::salvar($msg);
    }

    public function logErro($msg)
    {
        LogErro::salvar($msg);
    }
    
}
