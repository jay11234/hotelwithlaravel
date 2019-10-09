<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1516728105RoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
            Schema::create('rooms', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('room_number');
                $table->integer('floor')->nullable();
                $table->text('description')->nullable();
                $table->enum('room_status',['vacantClean','vacantDirty','occupiedClean','occupiedService','onMaintenance']);
 
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
