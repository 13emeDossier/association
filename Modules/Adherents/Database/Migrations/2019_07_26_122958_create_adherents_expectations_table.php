<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdherentsExpectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents_expectations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('adherent_id')
                ->foreign('adherent_id')
                ->references('id')
                ->on(Adherent::class)
                ->onDelete('cascade');
            $table->longText('comments')->nullable(true);

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
        Schema::dropIfExists('adherents_expectations');
    }
}
