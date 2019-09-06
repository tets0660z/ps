<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportedClasslistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imported_classlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('sections')->nullable();
            $table->String('gender')->nullable();
            $table->String('course')->nullable();
            $table->String('days')->nullable();
            $table->String('time')->nullable();
            $table->String('room')->nullable();
            $table->String('term')->nullable();
            $table->String('units')->nullable();
            $table->String('student')->nullable();
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
        Schema::dropIfExists('imported_classlists');
    }
}
