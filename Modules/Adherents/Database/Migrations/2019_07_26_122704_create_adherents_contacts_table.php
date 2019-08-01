<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Adherents\Entities\Adherent;

class CreateAdherentsContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('adherent_id')
                ->foreign('adherent_id')
                ->references('id')
                ->on(Adherent::class)
                ->onDelete('cascade');
            $table->string('name',255)->nullable(true);
            $table->string('firstname',255)->nullable(true);
            $table->string('quality',255)->nullable(true);
            $table->string('street_number',255)->nullable(true);
            $table->string('street',255)->nullable(true);
            $table->string('zip',255)->nullable(true);
            $table->string('city',255)->nullable(true);
            $table->string('phone_number',255)->nullable(true);
            $table->string('mobile_number',255)->nullable(true);
            $table->softDeletes();
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
        Schema::dropIfExists('adherents_contacts');
    }
}
