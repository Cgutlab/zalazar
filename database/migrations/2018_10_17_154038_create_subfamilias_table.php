<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubfamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subfamilias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('orden')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('file_image')->default('no-image.jpg')->nullable();
            $table->string('file_ficha')->nullable();
            $table->unsignedInteger('familia_id');
            $table->foreign('familia_id')->references('id')->on('familias')->onDelete('cascade');  
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
        Schema::dropIfExists('subfamilias');
    }
}
