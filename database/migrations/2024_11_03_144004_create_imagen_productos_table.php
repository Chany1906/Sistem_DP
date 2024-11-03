<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenProductosTable extends Migration
{
    public function up()
    {
        Schema::create('imagen_productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_interno');
            $table->string('imagen');
            $table->timestamps();

            // Crea la relación con la tabla productos
            $table->foreign('codigo_interno')
                ->references('codigo_interno')
                ->on('productos')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagen_productos');
    }
}
