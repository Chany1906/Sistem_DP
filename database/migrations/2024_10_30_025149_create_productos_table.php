<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('tienda_id')->constrained('tiendas');
            $table->string('codigo_interno')->unique();
            $table->string('codigo_fabricante')->nullable();
            $table->string('codigo_oem')->nullable();
            $table->string('origen')->nullable();
            $table->string('marca')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('multiplos')->nullable();
            $table->string('medida')->nullable();
            $table->integer('stock')->default(0);
            $table->decimal('precio_compra', 10, 2)->nullable();
            $table->decimal('precio_venta', 10, 2)->nullable();
            $table->decimal('precio_minimo', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
