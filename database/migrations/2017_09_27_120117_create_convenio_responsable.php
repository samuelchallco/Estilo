<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvenioResponsable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio_has_responsable',function (Blueprint $table){

            $table->increments('id');

            $table->integer('convenio_idconvenio')->unsigned();
            $table->foreign('convenio_idconvenio')->references('idconvenio')->on('convenio');
            $table->integer('usuario_idusuario')->unsigned();
            $table->foreign('usuario_idusuario')->references('idusuario')->on('usuario');
            $table->integer('responsable_idresponsable')->unsigned();
            $table->foreign('responsable_idresponsable')->references('idresponsable')->on('responsable');
            $table->timestamps();
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
    }
}
