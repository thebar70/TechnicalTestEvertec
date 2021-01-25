<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'price' => $this->faker->randomFloat(0, 1000, 200000),
            'description' => $this->faker->paragraph(3),
            'image_path' => $this->faker->imageUrl(300, 300, 'food'),
        ];
    }
}
