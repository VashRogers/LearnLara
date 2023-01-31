<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('fornecedores', function (Blueprint $table) {//O metodo estatico table seleciona uma tabela
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('fornecedores', function (Blueprint $table) {//O metodo estatico table seleciona uma tabela
            //to remove columns
            $table->dropColumn(['uf', 'email']);
        });
    }
}
