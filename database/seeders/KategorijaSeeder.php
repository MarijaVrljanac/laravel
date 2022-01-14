<?php

namespace Database\Seeders;

use App\Models\Kategorija;
use Illuminate\Database\Seeder;

class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kat1 = new Kategorija();
        $kat1->naziv="Parfemi";
        $kat1->save();

        $kat2 = new Kategorija();
        $kat2->naziv="EDT";
        $kat2->save();

        $kat3 = new Kategorija();
        $kat3->naziv="Mistovi";
        $kat3->save();

        $kat4 = new Kategorija();
        $kat4->naziv="Losioni";
        $kat4->save();
    }
}
