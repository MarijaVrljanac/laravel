<?php

namespace Database\Factories;

use App\Models\Kategorija;
use App\Models\Beauty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NarudzbinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'broj'=>$this->faker->randomNumber(),
        'cena'=>$this->faker->numberBetween($min = 12, $max = 100),
        'userID'=>User::find(random_int(1,User::count())),
        'brojTelefona'=>$this->faker->phoneNumber(),
        'adresa'=>$this->faker->address(),
        'proizvodID'=>Beauty::find(random_int(1,Beauty::count()))
        ];
    }
}
