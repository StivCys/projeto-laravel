<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutoFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabela filias
        Schema::create('filiais',function(Blueprint $table){
            $table->id();
            $table->string('filial',30);
            $table->timestamps();
        });
        
        //tabela auxiliar de relação muito para muitos
        Schema::create('produto_filiais',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            //--refatoring colunas da tabela produto para a tabela auxiliar
            $table->decimal('preco_venda',8,2)->default(0.1);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);

            $table->timestamps();

            //foreign  keys (constraints) ente filiais e produtos
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');

        });

        //--removendo as colunas que passaram a fazer parte da tabela auxiliar da tabela produtos
        Schema::table('produtos',function(Blueprint $table){
            $table->dropColumn(['preco_venda','estoque_minimo','estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //recriando as colunas caso haja rollback
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda',8,2)->default(0.1);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });

        //dropando a tabela auxiliar, obs não precisa remover as constraints
        Schema::dropIfExists('produto_filiais');

        //dropando a tabela filiais
        Schema::dropIfExists('filiais');
    }
}
