<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('csv_data_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('csv_data_id');
            $table->string('attribute');
            $table->string('value');
            $table->timestamps();

            $table->foreign('csv_data_id')->references('id')->on('csv_data')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('csv_data_attributes');
    }
};
