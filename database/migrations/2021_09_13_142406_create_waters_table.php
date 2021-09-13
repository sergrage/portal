<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waters', function (Blueprint $table) {
            $table->id();
            $table->float('segozero')->nullable();
            $table->float('pl21')->nullable();
            $table->float('pl25')->nullable();
            $table->float('pl27')->nullable();
            $table->float('idleGes1')->nullable();
            $table->float('idleGes2')->nullable();
            $table->float('idleGes5')->nullable();
            $table->float('idleGes6')->nullable();
            $table->float('idleGes7')->nullable();
            $table->float('idleGes9')->nullable();
            $table->float('idleGes10')->nullable();
            $table->float('idleGes14')->nullable();
            $table->float('idleGes16')->nullable();
            $table->float('oldBed')->nullable();
            $table->float('ges2Reservoir')->nullable();
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
        Schema::dropIfExists('waters');
    }
}
