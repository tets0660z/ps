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
            $table->String('id_number')->nullable()->unique();

            $table->unsignedBigInteger('schedule_id')->index()->nullable();
            $table->foreign('schedule_id')->references('id')->on('schedule')->onDelete('cascade');

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
