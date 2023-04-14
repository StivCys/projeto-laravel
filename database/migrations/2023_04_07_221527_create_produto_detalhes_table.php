<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            //colunas
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento',8,2);
            $table->float('largura',8,2);
            $table->float('altura',8,2);
            $table->timestamps();

            //constraint para a tabela produtos
            $table->foreign('produto_id')->references('id')->on('produtos');
            // unique 1 para 1
            $table->unique('produto_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto_detalhes', function (Blueprint $table){
            
            $table->dropForeign('produto_detalhes_produto_id_foreign');// [table]_[coluna]_[foreign]
            $table->dropUnique(['produto_id']);
            $table->dropColumn('produto_id');
            
        });

        Schema::dropIfExists('produto_detalhes');
    }
}
