<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contrato');
            $table->unsignedBigInteger('duracion_contrato_id');
            $table->date('fecha_expiracion');
            $table->date('fecha_cobro');
            $table->float('cantidad', 8, 2);
            $table->unsignedBigInteger('inquilino_id');
            $table->unsignedBigInteger('inmueble_id');
            $table->unsignedBigInteger('tipo_alquiler');
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
        Schema::dropIfExists('contratos');
    }
}
