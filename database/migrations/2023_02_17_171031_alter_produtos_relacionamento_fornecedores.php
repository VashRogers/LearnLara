<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {

            //insere um registro de fornecedor pra estabelecer relacionamento
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome'=> 'Renatao Gaucho',
                'site'=> 'rengau.com',
                'uf' => 'RS',
                'email'=> 'rengau@gmail.com',
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id)foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
