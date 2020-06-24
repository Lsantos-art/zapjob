<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Administrativo',
            'slug' => 'vagas-admin',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/admin.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Serviços domésticos',
            'slug' => 'vagas-domesticos',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/domestico.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Saúde/Medicina',
            'slug' => 'vagas-saude',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/saude.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Comércio/Vendas',
            'slug' => 'vagas-comercio',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/comercio.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'TI/Informática',
            'slug' => 'vagas-TI',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/ti.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Call center/Atendimento',
            'slug' => 'vagas-atendimento',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/call.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Logística',
            'slug' => 'vagas-logistica',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/logistica.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Turismo/Hotelaria',
            'slug' => 'vagas-turismo',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/turismo.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Educação',
            'slug' => 'vagas-educacao',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/educacao.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Construção/Indústria',
            'slug' => 'vagas-construcao',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/construcao.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Marketing',
            'slug' => 'vagas-marketing',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/marketing.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Agricultura/Pecuária',
            'slug' => 'vagas-agro',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/agro.jpg',
            'user_id' => '1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Engenharia/Arquitetura/Design',
            'slug' => 'vagas-engenharia',
            'avatar' => 'https://zapjob.s3.amazonaws.com/categoriesdefault/engenheiaria.jpg',
            'user_id' => '1'
        ]);
    }
}
