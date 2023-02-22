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
        Schema::create('generates', function (Blueprint $table) {
            $table->id();
            $table->string('CodCli');
            $table->string('nome');
            $table->string('chave');
            $table->string('link')->nullable();
            $table->string('duration');
            $table->string('loja');
            $table->float('valor');
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
        Schema::dropIfExists('generates');
    }
};
