<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('dates');
            $table->integer('scores');
            
            $table->unsignedBigInteger('student_id')->index()->nullable();
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedBigInteger('activity_id')->index()->nullable();
            $table->foreign('activity_id')->references('id')->on('activities');

            $table->unsignedBigInteger('component_id')->index()->nullable();
            $table->foreign('component_id')->references('id')->on('components');

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
        Schema::dropIfExists('scores');
    }
}
