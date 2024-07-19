<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subcategory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        // Obtén una subcategoría aleatoria de la base de datos
        $subcategory = Subcategory::inRandomOrder()->first();

        return [
            'sku' => $this->faker->unique()->numberBetween(100000, 999999),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(200),
            'image_path' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'subcategory_id' => $subcategory->id
        ];
    }
}
