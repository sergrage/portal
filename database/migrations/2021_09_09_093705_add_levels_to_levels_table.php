<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelsToLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->float('ges1');
            $table->float('ges2');
            $table->float('ges3');
            $table->float('ges5');
            $table->float('ges6');
            $table->float('ges7');
            $table->float('ges9');
            $table->float('ges10');
            $table->float('ges14');
            $table->float('ges16');
            $table->boolean('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->dropColumn('ges1');
            $table->dropColumn('ges2');
            $table->dropColumn('ges3');
            $table->dropColumn('ges5');
            $table->dropColumn('ges6');
            $table->dropColumn('ges7');
            $table->dropColumn('ges9');
            $table->dropColumn('ges10');
            $table->dropColumn('ges14');
            $table->dropColumn('ges16');
            $table->dropColumn('status');
        });
    }
}
