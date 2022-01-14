<?php

namespace Database\Seeders;

use App\Models\Kategorija;
use App\Models\Beauty;
use App\Models\Narudzbina;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Kategorija::truncate();
        Beauty::truncate();
        Narudzbina::truncate();

        \App\Models\User::factory(10)->create();    //popunjena tabela user sa 10 random korisnika

        $kats = new KategorijaSeeder(); //popunjena tabela kategorijas sa 4 kategorije definisane u KategorijaSeeder
        $kats->run();

        $bs = new BeautySeeder();
        $bs->run();

        $ns = new NarudzbinaSeeder();
        $ns->run();
    }
}


