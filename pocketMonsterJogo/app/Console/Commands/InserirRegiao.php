<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Regiao;

class InserirRegiao extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:inserir-regiao';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'COMANDO PARA INSERIR REGIOES';

    protected $descricao;
    protected $urlMapa;
    protected $ativo;
    protected $idRegiao;


    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Kanto
        $regiao = new Regiao();
        $regiao->descricao = "Kanto";
        $regiao->idRegiao = 1;
        $regiao->urlMapa = "img/regioes/Kanto.png";
        $regiao->ativo = 0;
        $regiao->save();

        // Jotho
        $regiao = new Regiao();
        $regiao->descricao = "Jotho";
        $regiao->idRegiao = 2;
        $regiao->urlMapa = "img/regioes/Jotho.png";
        $regiao->ativo = 0;
        $regiao->save();

        // Hoenn
        $regiao = new Regiao();
        $regiao->descricao = "Hoenn";
        $regiao->idRegiao = 3;
        $regiao->urlMapa = "img/regioes/Hoenn.png";
        $regiao->ativo = 0;
        $regiao->save();

        // Sinnoh
        $regiao = new Regiao();
        $regiao->descricao = "Sinnoh";
        $regiao->idRegiao = 4;
        $regiao->urlMapa = "img/regioes/Kanto.png";
        $regiao->ativo = 0;
        $regiao->save();

        $this->info('Dado inserido com sucesso!');
    }
}
