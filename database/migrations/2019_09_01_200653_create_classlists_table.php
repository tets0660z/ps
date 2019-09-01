<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasslistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('sections');
            $table->String('days');
            $table->String('time');
            $table->String('room')->nullable();
            $table->String('term');
            $table->String('units')->nullable();
            $table->String('subjects');

            $table->unsignedBigInteger('instructors_id')->index();
            $table->foreign('instructors_id')->references('id')->on('instructors')->onDelete('cascade');
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
        Schema::dropIfExists('classlists');
    }
}
