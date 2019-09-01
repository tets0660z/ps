<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('students_id')->index();
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
            
            $table->unsignedBigInteger('classlists_id')->index();
            $table->foreign('classlists_id')->references('id')->on('classlists')->onDelete('cascade');

            $table->unsignedBigInteger('class_records_id')->index();
            $table->foreign('class_records_id')->references('id')->on('class_records')->onDelete('cascade');

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
        Schema::dropIfExists('instructors_students');
    }
}
