<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->text('images');
            $table->integer('parking_id')->unsigned()->nullable();
            $table->foreign('parking_id')->references('id')->on('parkings')->onDelete('set null');
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
        Schema::dropIfExists('parking_galleries');
    }
}
