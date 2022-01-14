<?php

namespace Database\Seeders;

use App\Models\Beauty;
use Illuminate\Database\Seeder;

class BeautySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beauty::factory(10)->create();
    }
}
