<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUnidadePesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try{
            DB::beginTransaction();
            Schema::create('unidades_peso', function (Blueprint $table) {
                $table->id();
                $table->string('unidade',3);
                $table->string('descricao',20);
                $table->timestamps();
            });

            //relacionamento com a tabela produto 1 para muitos
            Schema::table('produtos', function (Blueprint $table){
                $table->unsignedBigInteger('unidade_peso_id')->nullable();
                $table->foreign('unidade_peso_id')->references('id')->on('unidades_peso')->nullable()->constrained()->cascadeOnDelete();
            });
                
            //relacionamento com a tabela produto_detalhes 1 para muitos
            Schema::table('produto_detalhes', function (Blueprint $table){
                $table->unsignedBigInteger('unidade_peso_id')->nullable();
                $table->foreign('unidade_peso_id')->references('id')->on('unidades_peso')->nullable()->constrained()->cascadeOnDelete();
            });
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        try{
            DB::beginTransaction();
            //--remover relacionamento com produto_detalhes
            Schema::table('produto_detalhes', function (Blueprint $table){
                // remover a fk primeiro
                $table->dropForeign('produto_detalhes_unidade_peso_id_foreign');// [table]_[coluna]_[foreign]
                //remover a coluna unidade_id
                $table->dropColumn('unidade_peso_id');
                
            });

            

            //--remover relacionamento com produtos
            Schema::table('produtos', function (Blueprint $table){
                // remover a fk primeiro
                $table->dropForeign('produtos_unidade_peso_id_foreign');// [table]_[coluna]_[foreign]
                //remover a coluna unidade_id
                $table->dropColumn('unidade_peso_id');
                
            });

            Schema::dropIfExists('unidades_peso');
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
        }
    }
}
