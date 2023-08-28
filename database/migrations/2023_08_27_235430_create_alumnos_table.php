<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 10)->unique();
            $table->string('nombre', 120);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 20);
            $table->string('email', 50);
            $table->unsignedBigInteger('nivel_id'); // Cambio en el nombre de la columna
            $table->timestamps();

            $table->foreign('nivel_id')->references('id')->on('niveles'); // Corrección en el nombre de la columna
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
