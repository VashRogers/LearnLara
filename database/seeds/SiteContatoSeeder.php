<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contato = new SiteContato();
        $contato->nome = 'Dudu';
        $contato->telefone = '456484564';
        $contato->email = 'duduomeuamor@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Dudu dudu o meu amor dudu';

        $contato->save();

        
    }
}
