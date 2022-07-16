<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "city_id" => City::inRandomOrder()->first()->id,
            "shipping_method" => $this->faker->realText('10'),
            "price"           => random_int(200,700),
            "address"         => $this->faker->address(),
            ];
    }
}
