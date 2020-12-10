<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbrs', function (Blueprint $table) {
            $table->id();
            $table->float('ges1')->nullable();
            $table->float('ges2')->nullable();
            $table->float('ges3')->nullable();
            $table->float('ges5')->nullable();
            $table->float('ges6')->nullable();
            $table->float('ges7')->nullable();
            $table->float('ges9')->nullable();
            $table->float('ges10')->nullable();
            $table->float('ges14')->nullable();
            $table->float('ges16')->nullable();
            $table->float('tec13')->nullable();
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
        Schema::dropIfExists('pbrs');
    }
}
