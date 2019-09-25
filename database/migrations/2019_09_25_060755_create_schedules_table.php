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
            $table->string('schedule');
            $table->string('section');
            $table->string('id_number');
            

            $table->unsignedBigInteger('subject_id')->index()->nullable();
            $table->foreign('subject_id')->references('id')->on('schedule')->onDelete('cascade');

            $table->unsignedBigInteger('instructor_id')->index()->nullable();
            $table->foreign('instructor_id')->references('id')->on('user')->onDelete('cascade');


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
