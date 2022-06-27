<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Carbon\Factory;
use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('site_contatos')->insert([
        //     'nome' => 'Sistema SG',
        //     'telefone' => '(12) 99999-8888',
        //     'email' => 'contato@fornecedor300.com.br',
        //     'motivo_contato' => '1',
        //     'mensagem' => 'Seja bem vindo ao Sistema Super Gestã'
        // ]);

        \App\Models\SiteContato::factory()->count(100)->create();
    }
}
