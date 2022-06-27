<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciando um objeto
        // $fornecedor = new Fornecedor();
        // $fornecedor->nome = 'fornecedor100';
        // $fornecedor->site = 'fornecedor100.com.br';
        // $fornecedor->uf = 'CE';
        // $fornecedor->email = 'contato@fornecedor100.com.br';
        // $fornecedor->save();

        //Metodo Create, atenção pro atributo fillable da classe
        // Fornecedor::create([
        //     'nome' => 'Fornecedor200',
        //     'site' => 'fornecedor200.com.br',
        //     'uf' => 'RS',
        //     'email' => 'contato@fornecedor200.com.br'
        // ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br'
        ]);


    }
}
