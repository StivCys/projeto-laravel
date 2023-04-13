<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            //--colunas
            $table->id();
            $table->string('unidade',5); // cm mm mt kg
            $table->string('descricao',30); // cm mm mt kg
            $table->timestamps();
        });

        //relacionamento com a tabela produto 1 para muitos
        Schema::table('produtos', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
            
        //relacionamento com a tabela produto_detalhes 1 para muitos
        Schema::table('produto_detalhes', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //--constrainst precisam ser removidas primeiro (proceso precisa ser inverso ao metodo up)

        //--remover relacionamento com produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table){
            // remover a fk primeiro
            $table->dropForeign('produto_detalhes_unidade_id_foreign');// [table]_[coluna]_[foreign]
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
            
        });

        

        //--remover relacionamento com produtos
        Schema::table('produtos', function (Blueprint $table){
            // remover a fk primeiro
            $table->dropForeign('produtos_unidade_id_foreign');// [table]_[coluna]_[foreign]
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
            
        });

        


        Schema::dropIfExists('unidades');

        
    }
}
