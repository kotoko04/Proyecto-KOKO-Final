<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia');
            $table->string('nombre');
            $table->string('descripcioncorta');
            $table->string('detalle');
            $table->string('valor');
            $table->string('palabraclave');
            $table->string('estado');
            $table->string('ruta');
            $table->integer('categoria_id');
            $table->integer('marca_id');
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias');
            $table->foreign('marca_id')
                ->references('id')
                ->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
