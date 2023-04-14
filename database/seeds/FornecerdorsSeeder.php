<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecerdorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inciando o objeto
        $fornecedor= new Fornecedor();
        $fornecedor->nome='Fornecedor 400';
        $fornecedor->site='fornecedor400.com.br';
        $fornecedor->uf='SP';
        $fornecedor->email='forncedor400@gmail.com';
        $fornecedor->save();

        //--outra maneira metodo estatico do MOdel atenção a variavel fillable no model
        Fornecedor::create([
                'nome'=>"Fornecedor500",
                'site'=>"Fornecedor500.com.br",
                'uf'=>"PR",
                'email'=>"Fornecedor500@gmail.com"
        ]);

        //--esse metodo não insere os campos created_at e updated_at
        Illuminate\Support\Facades\DB::table('fornecedors')->insert([
                'nome'=>"Fornecedor600",
                'site'=>"Fornecedor600.com.br",
                'uf'=>"PR",
                'email'=>"Fornecedor600@gmail.com"
        ]);
    }
}
