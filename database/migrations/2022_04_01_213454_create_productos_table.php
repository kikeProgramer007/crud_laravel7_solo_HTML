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
            $table->string('descripcion',20);
            $table->float('precio',8,2);
            // Relacionando tablas capturando llave primaria de categoria
            // $table->unsignedBigInteger('id_categoria');
            // $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreignId('id_categoria')->nullable()->constrained('categorias')->cascadeOnUpdate()->cascadeOnDelete();
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
