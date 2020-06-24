<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authorizations')->insert([
            'empresa' => 'Mc Donalds',
            'titulo' => 'Atendente de loja',
            'tipo' => 'Efetivo',
            'qtd' => '2',
            'salario' => '1400',
            'beneficios' => 'Vale transporte, Vale refeição',
            'requisitos' => 'Ensino médio',
            'periodo' => '30/06/2020',
            'descricao' => 'Contrata-se atendente para redes de fast-food Mc Donalds',
            'contato' => 'email',
            'email' => 'mcdonalds@gmail.com',
            'whatsapp' => 'none',
            'role' => 'insert',
            'user_id' => '3',
            'category_id' => '4',
        ]);
    }
}
