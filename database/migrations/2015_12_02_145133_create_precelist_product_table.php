<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecelistProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricelist_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->references('id')->on('products')->unsigned();
            $table->integer('pricelist_id')->references('id')->on('pricelists')->unsigned();
            $table->float('price');
            $table->integer('currency_id')->unsigned();
            $table->float('percent_subdist');
            $table->float('percent_prevent');
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
        Schema::dropIfExists('pricelist_product');
    }
}
