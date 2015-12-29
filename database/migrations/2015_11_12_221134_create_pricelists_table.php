<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pricelists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',96);
            $table->integer('company_id')->unsigned();
            $table->float('percent_price');
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
        Schema::dropIfExists('pricelists');
    }
}
