<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('schedules', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('room_id');
                $table->foreign('room_id')->references('id')->on('rooms');
                $table->unsignedBigInteger('housekeeper_id');
                $table->foreign('housekeeper_id')->references('id')->on('housekeepers');
                $table->enum('room_status',['vacantClean','vacantDirty','occupiedClean','occupiedService','onMaintenance']);
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
        Schema::dropIfExists('schedules');
    }
}
