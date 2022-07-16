<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factor>
 */
class FactorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $publication = now()->subMinutes(rand(0, 3600));
        return [
            'user_id'    => User::inRandomOrder()->first()->id,
            'address_id' => Address::inRandomOrder()->first()->id,
            'updated_at' => $publication,
            'created_at' => $publication->subMinutes(rand(0, 7_200))
        ];
    }
}
