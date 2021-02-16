<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealIngredient;
class MealIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MealIngredient::factory()->count(50)->create();
    }
}
