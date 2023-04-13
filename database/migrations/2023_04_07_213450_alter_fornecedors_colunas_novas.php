 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedorsColunasNovas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criar colunas
        Schema::table('fornecedors', function (Blueprint $table){
            $table->string('uf',2);
            $table->string('email',250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //dropar colunas criadas
        Schema::table('fornecedors', function (Blueprint $table){
            //$table->dropColumn('uf'); // maneira individudal
            //$table->dropColumn('email');
            $table->dropColumn(['uf','email']); //maneira em massa

            //--Rode na raiz do projeto : php artisan migrate:rollback
            // obs so vai desfazer alteraçoes da ultima migration criada
            // para rodar em varias migrations precisa passar o numero de  steps (passos) : php artisan migrate:rollback --step=2 
        });
    }
}
