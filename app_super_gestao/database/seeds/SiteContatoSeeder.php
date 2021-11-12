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
        /*
        $contato = new SiteContato();
        $contato->nome = "Sistema SG";
        $contato->telefone = ' 11 58888-5555';
        $contato->email = 'email@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'seja bem vindo';
        $contato->save();
        */

        factory(SiteContato::class,100)->create();
    }
}
