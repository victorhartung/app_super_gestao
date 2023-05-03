<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a coluna em produtos que vai receber a foreign key de fornecedores

        Schema::table('produtos', function(Blueprint $table) {

           $fornecedor_id = DB::table('fornecedores')->insert([
                'nome' => 'Fornecedor Padrão',
                'site' => 'fornecedorpadrao.com.br',
                'uf' => 'RJ',
                'email' => 'contato@fornecedorpadrao.com.br'
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
        Schema::table('produtos', function(Blueprient $table){
           
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        
        });
    }
}
