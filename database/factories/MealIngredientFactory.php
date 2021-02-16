<?php

namespace Database\Factories;

use App\Models\MealIngredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealIngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MealIngredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "meal_id"=> $this->faker->numberBetween($min = 1, $max = 20),
            "ingredient_id"=> $this->faker->numberBetween($min = 1, $max = 20),
            "ammount"=> $this->faker->numberBetween($min = 10, $max = 500)."g"
        ];
    }
}
