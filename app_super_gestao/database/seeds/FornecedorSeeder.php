<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor';
        $fornecedor->site = 'fornecedor.com.br';
        $fornecedor->uf = 'RS';
        $fornecedor->email = 'contato@gmail.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome'=> 'Fornecedor 2',
            'site'=> 'site.com.br',
            'uf'  => 'MG',
            'email' => 'email@hotmail.com'
        ]);


        DB::table('fornecedores')->insert([
            'nome'=> 'Fornecedor 3',
            'site'=> 'site3.com.br',
            'uf'  => 'MG',
            'email' => 'email3@hotmail.com'
        ]);
    }
}
