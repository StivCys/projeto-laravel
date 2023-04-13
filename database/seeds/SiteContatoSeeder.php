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
        // MODO MANUAL
        /*
        $contato = new SiteContato();
        $contato->nome='jose';
        $contato->telefone='41989559595';
        $contato->email='jose@stiv.com.br';
        $contato->motivo_contato='2';
        $contato->mensagem='boa dica';
        $contato->save();
        */

        //USANDO FACTORIES PARA ADIÇÃO EM MASSA
        factory(SiteContato::class,100)->create();
    }
}
