<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //adicionando a coluna motivo_contatos_id
        
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInt('motivos_contatos_id');
        });
        
        //atribuindo motivo_contato para a nova coluna motivo_contatos_id
        
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');
        
        //criando a fk e revendo a columa motivo_contato
        
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivos_contatos_id')->references('id')->on('motivo_contato');
            $table->dropColumn('motivo_contato');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contato_id_foreign');
        });

        DB::statement('update site_contatos set motivo_contatos = motivo_contato_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivos_contatos_id');
        });
    }
}
