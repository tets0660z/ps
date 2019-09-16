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
            $table->string('titles');
            $table->date('date')->nullable();;
            $table->integer('lec_quiz')->nullable();
            $table->integer('lec_student_quiz')->nullable();
            $table->integer('lec_ot')->nullable();

            $table->integer('lec_student_ot')->nullable();
            $table->integer('exam')->nullable();
            $table->integer('student_exam')->nullable();
            $table->integer('lab_student_score')->nullable();
            $table->integer('lab_score')->nullable();
            $table->integer('grid_row')->nullable();
            $table->integer('grid_col')->nullable();
           
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('imported_classlists_id')->index()->nullable();
            $table->foreign('imported_classlists_id')->references('id')->on('imported_classlists')->onDelete('cascade');

            $table->unsignedBigInteger('subjects_id')->index()->nullable();
            $table->foreign('subjects_id')->references('id')->on('subjects')->onDelete('cascade');

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
