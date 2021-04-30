<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWaterToTemperatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
        Schema::table('temperatures', function (Blueprint $table) {
            $table->float('wges1')->nullable();
            $table->float('wges2')->nullable();
            $table->float('wges3')->nullable();
            $table->float('wges5')->nullable();
            $table->float('wges6')->nullable();
            $table->float('wges7')->nullable();
            $table->float('wges9')->nullable();
            $table->float('wges10')->nullable();
            $table->float('wges14')->nullable();
            $table->float('wges16')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temperatures', function (Blueprint $table) {
            $table->dropColumn('wges1');
            $table->dropColumn('wges2');
            $table->dropColumn('wges3');
            $table->dropColumn('wges5');
            $table->dropColumn('wges6');
            $table->dropColumn('wges7');
            $table->dropColumn('wges9');
            $table->dropColumn('wges10');
            $table->dropColumn('wges14');
            $table->dropColumn('wges16');
        });
    }
}
