<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdherentsMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents_mails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('adherent_id')
                ->foreign('adherent_id')
                ->references('id')
                ->on(Adherent::class)
                ->onDelete('cascade');
            $table->string('email',255)->nullable(true);
            $table->string('usage',255)->nullable(true);
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
        Schema::dropIfExists('adherents_mails');
    }
}
