<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
         Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->string('name',96);
            $table->integer('document')->unsigned();
            $table->string('contact_name',96);
            $table->string("street_name",96);
            $table->integer("street_number")->unsigned();
            $table->text("aditional_info");
            $table->string("email",96);
            $table->integer("phone")->unsigned();
            $table->integer("pricelist_id")->unsigned();
            $table->enum("type",['client','supplier','employee','creditor','subdist']);
            $table->integer("tax_id")->unsigned();
            $table->text("observation");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('entities');
    }

}
