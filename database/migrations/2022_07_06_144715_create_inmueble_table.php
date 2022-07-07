<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmuebleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmueble', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('ubicacion');
            $table->integer('cuartos');
            $table->integer('camas');
            $table->integer('banos');
            $table->boolean('tiene_aire_acondicionado')->nullable();
            $table->boolean('tiene_cocina')->nullable();
            $table->boolean('tiene_comedor')->nullable();
            $table->boolean('tiene_lavatrastos')->nullable();
            $table->boolean('tiene_refrigeradora')->nullable();
            $table->boolean('tiene_televisor')->nullable();
            $table->boolean('tiene_muebles_sala')->nullable();
            $table->boolean('tiene_cochera')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('estado');
            $table->unsignedBigInteger('usuario_crea');
            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->foreign('usuario_crea')->references('id')->on('users');
            $table->foreign('usuario_modifica')->references('id')->on('users');
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
        Schema::dropIfExists('inmueble');
    }
}
