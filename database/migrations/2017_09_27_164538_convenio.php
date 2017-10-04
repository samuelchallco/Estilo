<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Convenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio', function (Blueprint $table) {
            $table->increments('idconvenio');
            $table->string('titulo')->nullable();
            $table->string('codigo')->nullable();
            $table->string('resolucion')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('duracion')->nullable();
            $table->string('categoria')->nullable();
            $table->string('fecha_ini')->nullable();
            $table->string('fecha_fin')->nullable();
            $table->integer('tipo_idtipo')->unsigned();
            $table->foreign('tipo_idtipo')->references('idtipo')->on('tipo');
            $table->integer('tipoconvenio_idtipoconvenio')->unsigned();
            $table->foreign('tipoconvenio_idtipoconvenio')->references('idtipoconvenio')->on('tipoconvenio');
            $table->integer('ambito_idambito')->unsigned();
            $table->foreign('ambito_idambito')->references('idambito')->on('ambito');
            $table->integer('pais_idpais')->unsigned();
            $table->foreign('pais_idpais')->references('idpais')->on('pais');
            $table->integer('estado_idestado')->unsigned();
            $table->foreign('estado_idestado')->references('idestado')->on('estado');
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
        Schema::dropIfExists('convenio');
    }
}
