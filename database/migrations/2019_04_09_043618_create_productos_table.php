<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('categoria_id');
            $table->string('modelo');
            $table->string('codigo');
            $table->string('nombre');
            $table->text('descripcion');
            $table->float('precio');
            $table->string('imagen');
            $table->string('stock');
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
               Schema::dropIfExists('productos'); //
    }
}
