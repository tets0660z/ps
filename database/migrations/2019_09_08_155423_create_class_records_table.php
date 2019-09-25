<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activity_title')->nullable();
            $table->string('hps')->nullable();
            $table->string('student_score')->nullable();
            $table->date('date')->nullable();
            $table->date('grading_period')->nullable();
            
           
            $table->unsignedBigInteger('id_number')->index()->nullable();
            $table->foreign('id_number')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('class_records');
    }
}
