<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'privacy' => rand(0, 1),
            'title' => Str::random(25, 36),
            'url' => Str::slug(Str::random(25, 36)),
            'price' => rand(100, 1000),
            'brand_id' => rand(1, 25),
            'category_id' => rand(1, 50),
            'sub_category_id' => rand(1, 250),
            'meta_title' => Str::random(25, 36),
            'meta_description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'meta_keywords' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'created_by' => rand(1, 10),
        ];
    }
}
