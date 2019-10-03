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
        if(! Schema::hasTable('schedules'))
        {
            Schema::create('schedules', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedBigInteger('room_id');
                $table->foreign('room_id')->references('id')->on('rooms')->onDelete('CASCADE');
                $table->unsignedBigInteger('housekeeper_id');
                $table->foreign('housekeeper_id')->references('id')->on('housekeepers')->onDelete('SET NULL');
                $table->enum('room_status',['vacantClean','vacantDirty','occupiedClean','occupiedService','onMaintenance']);
                $table->timestamps();
            });

        }
       
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
