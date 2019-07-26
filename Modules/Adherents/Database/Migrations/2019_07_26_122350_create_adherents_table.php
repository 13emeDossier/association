<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdherentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->string('firstname',255);
            $table->string('street_number',255);
            $table->string('street',255);
            $table->string('zip',255);
            $table->string('city',255);
            $table->string('phone_number',255);
            $table->string('mobile_number',255);
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
        Schema::dropIfExists('adherents');
    }
}
