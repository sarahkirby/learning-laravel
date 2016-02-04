<?php

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
        // create table and how
        Schema::create('products', function (Blueprint $table) {
            // $table refers to products. Where you add instructions to create table
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description', 1000);
            $table->decimal('price', 6, 2);
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
        Schema::drop('products');
    }
}
