<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasTable extends Migration
{
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id();
            $table->string('ruc')->unique();
            $table->string('razon_social');
            $table->string('direccion');
            $table->string('encargado');
            $table->string('celular');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiendas');
    }
}
