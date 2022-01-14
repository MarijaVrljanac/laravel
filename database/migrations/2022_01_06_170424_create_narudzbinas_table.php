<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarudzbinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narudzbinas', function (Blueprint $table) {
            $table->id();
            $table->string('broj');
            $table->string('cena');
            $table->string('userID');
            $table->string('brojTelefona');
            $table->string('adresa');
            $table->string('proizvodID');
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
        Schema::dropIfExists('narudzbinas');
    }
}
