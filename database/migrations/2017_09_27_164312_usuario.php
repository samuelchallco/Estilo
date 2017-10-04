<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('idusuario');
            $table->string('nombre');
            $table->string('password');
            $table->string('correo')->nullable();
            $table->integer('rol_idrol')->unsigned();
            $table->integer('estado_idestado')->unsigned();
            $table->foreing('rol_idrol')->references('idrol')->on('rol');
            $table->foreing('estado_idestado')->references('idestado')->on('estado');
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
        Schema::dropIfExists('usuario');
    }
}
