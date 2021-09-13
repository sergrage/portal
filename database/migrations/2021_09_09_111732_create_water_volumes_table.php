<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterVolumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_volumes', function (Blueprint $table) {
            $table->id();
            $table->float('ges3')->nullable();
            $table->float('ges7')->nullable();
            $table->float('ges9')->nullable();
            $table->float('ges14')->nullable();
            $table->float('girvas')->nullable();
            $table->float('ges9Reservoir')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('water_volumes');
    }
}
