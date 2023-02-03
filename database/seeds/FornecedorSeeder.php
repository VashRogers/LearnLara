<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Nivaldo Marques';
        $fornecedor->site = 'reidolambadao.com.br';
        $fornecedor->uf = 'GO';
        $fornecedor->email = 'lambada@gmail.com';

        $fornecedor->save();

        //usando método create(Atenção para o attr fillable da classe Fornecedor)
        Fornecedor::create(['nome'=>'Dudu', 'site'=>'duduomeuamor.com', 'uf'=>'SP', 'email'=>'dudumeuamor@gmail.com']);

        //insert
        DB::table('fornecedores')->insert([
            'nome'=>'Mike Brito', 
            'site'=>'rocketseat.com', 
            'uf'=>'MS', 
            'email'=>'mikeabrito@rocket.com'
        ]);
    }
}
