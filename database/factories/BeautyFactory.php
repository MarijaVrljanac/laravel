<?php

namespace Database\Factories;

use App\Models\Kategorija;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeautyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->randomElement($array = array('Bombshell', 'Vanilla Lace', 'Romance', 'Love Spell', 'Aqua Kiss')),
            'sifra' => $this->faker->randomDigitNotNull(),
            'kolicina' => $this->faker->randomElement($array = array('50 ml', '100 ml', '250 ml')),
            'kategorijaID' => Kategorija::find(random_int(1,Kategorija::count()))
        ];
    }
}
