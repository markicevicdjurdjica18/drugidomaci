<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    public function ingredients(){
        return $this->hasMany(MealIngredient::class,"meal_id");
    }

    protected $fillable=["name","time_to_cook"];
}
