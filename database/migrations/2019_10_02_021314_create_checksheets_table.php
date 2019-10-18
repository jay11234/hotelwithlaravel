<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_sheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('total_cycle');
          
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->unsignedBigInteger('housekeeper_id');
            $table->foreign('housekeeper_id')->references('id')->on('housekeepers');

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
        Schema::dropIfExists('checksheets');
    }
}
