<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1516728020CustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
            Schema::create('customers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('address')->nullable();
                $table->string('phone')->nullable();
                $table->string('email');
                $table->unsignedBigInteger('country_id');
                $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('customers');
    }
}
