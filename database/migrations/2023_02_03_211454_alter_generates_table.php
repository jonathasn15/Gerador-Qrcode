<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generates', function (Blueprint $table) {
            $table->date('datetimestemp')->format('d/m/Y')->nullable();
            $table->time('horatimestemp')->format('H:i:s')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generates', function (Blueprint $table) {
            $table->dropColumn('datetimestemp');
            $table->dropColumn('horatimestemp');
        });
    }
};
