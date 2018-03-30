<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('serial')->nullable();
            $table->unsignedInteger('page_id');
            $table->float('price');
            $table->text('descr')->nullable();
            $table->text('techs')->nullable();
            $table->string('images')->nullable();
            $table->string('img_slide')->nullable();
            $table->enum('visible', ['0', '1']);
            $table->enum('hits', ['0', '1']);
            $table->enum('new', ['0', '1']);
            $table->string('keywords')->nullable();
            $table->string('meta_desc')->nullable();
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
        Schema::dropIfExists('products');
    }
}
