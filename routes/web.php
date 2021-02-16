<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MealController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/

Route::get('/ingredient', [IngredientController::class, "all"]);
Route::post('/ingredient', [IngredientController::class, "create"]);
Route::post('/ingredient/{id}', [IngredientController::class, "update"]);
Route::get('/',function(){
    return redirect('/meal');
});
Route::get('/meal', [MealController::class, "all"]);
Route::post('/meal/{id}', [MealController::class, "update"]);