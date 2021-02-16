<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealIngredient extends Model
{
    use HasFactory;

    

    public function meal(){
        return $this->belongsTo(Meal::class);
    }
    public function ingredient(){
        return $this->belongsTo(Ingredient::class);
    }

    protected $fillable=["meal_id","ingredient_id","ammount"];
}
