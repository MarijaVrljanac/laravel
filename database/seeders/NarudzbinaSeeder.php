<?php

namespace Database\Seeders;

use App\Models\Narudzbina;
use Illuminate\Database\Seeder;

class NarudzbinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Narudzbina::factory(10)->create();
    }
}
