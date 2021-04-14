<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('departamentos')->insert(['sigla'=>'RH','nome'=>'Recursos Humanos']);
        DB::table('departamentos')->insert(['sigla'=>'FN','nome'=>'Financeiro']);

        DB::table('funcionarios')->insert(['nome'=>'Joao','endereco'=>'rua X','departamento_id'=>'1', 'data_nascimento' => '1995-08-07']);
        DB::table('funcionarios')->insert(['nome'=>'Maria','endereco'=>'rua Y','departamento_id'=>'1', 'data_nascimento' => '1995-08-07']);

        DB::table('projetos')->insert(['nome'=>'Projeto01','orcamento'=>10000,'dataInicio'=>'2020-11-19', 'funcionario_id' => 1]);
        DB::table('projetos')->insert(['nome'=>'Projeto02','orcamento'=>20000,'dataInicio'=>'2019-03-02', 'funcionario_id' => 2]);

        DB::table('parentescos')->insert(['descricao'=>'Pai']);
        DB::table('parentescos')->insert(['descricao'=>'Mãe']);
        DB::table('parentescos')->insert(['descricao'=>'Filho']);
        DB::table('parentescos')->insert(['descricao'=>'Conjuge']);

        DB::table('Parentesco')->insert(['descricao'=>'Pai']);
        DB::table('Parentesco')->insert(['descricao'=>'Mãe']);
        DB::table('Parentesco')->insert(['descricao'=>'Filho']);
        DB::table('Parentesco')->insert(['descricao'=>'Conjuge']);

    }
}
