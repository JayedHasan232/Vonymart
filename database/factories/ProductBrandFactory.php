<?php

namespace Database\Factories;

use App\Models\ProductBrand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductBrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductBrand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'privacy' => rand(0, 1),
            'title' => Str::random(9, 36),
            'url' => Str::slug(Str::random(9, 36)),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'meta_title' => Str::random(9, 36),
            'meta_description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'meta_keywords' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'created_by' => rand(1, 10),
        ];
    }
}
