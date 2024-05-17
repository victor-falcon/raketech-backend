<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cca3' => $this->faker->countryISOAlpha3(),
            'name' => $this->faker->country(),
            'flag' => $this->faker->imageUrl(),
        ];
    }
}
