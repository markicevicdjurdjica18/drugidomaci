<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MealRestController;
use App\Http\Controllers\API\IngredientRestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
    GET /meals - vrati sva jela iz baze - index
    GET /meals/{id} - vrati jelo sa datim id -jem - show
    POST /meals - kreiraj novo jelo na osnovu tela zahteva - store
    PUT/PATCH /meals/{id} - izmeni jelo sa datim id - jem na osnovu tela zahteva - update
    DELETE /meals/{id} - obrisi jelo sa datim id - jem - destroy


*/


Route::get('/meals/{id}/ingredients',[MealRestController::class,"ingredients"]);
Route::apiResources([
    'meals' => MealRestController::class,
    'ingredients' => IngredientRestController::class,
]);