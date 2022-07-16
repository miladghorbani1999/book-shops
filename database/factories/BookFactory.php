<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        $publication = now()->subMinutes(rand(0, 525_600));
        return [
            'category_id'      => Category::inRandomOrder()->first()->id,
            'name'             => $this->faker->name(),
            'description'      => $this->faker->realText(100),
            'price'            => random_int(100,1000),
            'inventory'        => random_int(0,500),
            'publication_year' => $publication,
            'created_at'       => $publication->subMinutes(rand(0, 7_200)),
        ];
    }
}
