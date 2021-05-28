<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservoirsStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservoirs_statistics', function (Blueprint $table) {
            $table->id();
            $table->float('reservoirGirvasMax')->nullable();
            $table->float('reservoirGirvasMin')->nullable();
            $table->float('reservoirGirvasAvg')->nullable();
            $table->float('reservoirSandalMax')->nullable();
            $table->float('reservoirSandalMin')->nullable();
            $table->float('reservoirSandalAvg')->nullable();
            $table->float('reservoirSegozeroMax')->nullable();
            $table->float('reservoirSegozeroMin')->nullable();
            $table->float('reservoirSegozeroAvg')->nullable();
            $table->float('reservoirUshkozeroMax')->nullable();
            $table->float('reservoirUshkozeroMin')->nullable();
            $table->float('reservoirUshkozeroAvg')->nullable();
            $table->float('reservoirVigozeroMax')->nullable();
            $table->float('reservoirVigozeroMin')->nullable();
            $table->float('reservoirVigozeroAvg')->nullable();
            $table->timestamp('created_at');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservoirs_statistics');
    }
}
