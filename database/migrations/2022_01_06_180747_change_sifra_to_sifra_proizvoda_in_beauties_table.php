<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSifraToSifraProizvodaInBeautiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beauties', function (Blueprint $table) {
            $table->renameColumn('sifra', 'sifraProizvoda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beauties', function (Blueprint $table) {
            $table->renameColumn('sifraProizvoda', 'sifra');
        });
    }
}
