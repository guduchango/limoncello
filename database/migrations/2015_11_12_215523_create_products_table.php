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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('name',96);
            $table->text('description');
            $table->integer('stock')->unsigned();
            $table->float('cost');
            $table->integer('duration')->unsigned();
            $table->string('sort',96);
            $table->string('barcode',96);
            $table->integer('alert_stock')->unsigned();
            $table->integer('desired_stock')->unsigned();
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
