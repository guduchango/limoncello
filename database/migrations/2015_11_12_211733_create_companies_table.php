<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',96);
            $table->integer('user_id')->unsigned();
            $table->string('abbreviation',5);
            $table->text('description');
            $table->string('logo_extension',10);
            $table->string('street_name',96);
            $table->string('street_number',96);
            $table->integer('phone');
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
        Schema::drop('companies');
    }
}
