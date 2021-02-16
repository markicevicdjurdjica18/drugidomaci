<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\MealIngredient;
use Illuminate\Http\Request;
use App\Http\Resources\MealIngredientResource;
class MealRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $meals=Meal::all();
            $response["data"]=$meals;
            $response["status"]=true;
            return response()->json($response);
           } catch (Exception $e) {
            $response=[];
            $response["error"]=$e->getMessage();
            $response["status"]=false;
            return response()->json($response);
           }
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input=$request->all();
            $meal= Meal::create($input);
            $response=[];
            $response["data"]=$meal;
            $response["status"]=true;
            return response()->json($response);
           } catch (Exception $e) {
            $response=[];
            $response["error"]=$e->getMessage();
            $response["status"]=false;
            return response()->json($response);
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        try {
            $response["data"]=$meal;
            $response["status"]=true;
            return response()->json($response);
           } catch (Exception $e) {
            $response=[];
            $response["error"]=$e->getMessage();
            $response["status"]=false;
            return response()->json($response);
           }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        try {
            if(isset($request->name)){
                $meal->name=$request->name;
            }
            if(isset($request->time_to_cook)){
                $meal->time_to_cook=$request->time_to_cook;
            }
            $meal->save();
            $response["data"]=$meal;
            $response["status"]=true;
            return response()->json($response);
           } catch (Exception $e) {
            $response=[];
            $response["error"]=$e->getMessage();
            $response["status"]=false;
            return response()->json($response);
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        try {
            $meal->delete();
            $response["status"]=true;
            return response()->json($response);
           } catch (Exception $e) {
            $response=[];
            $response["error"]=$e->getMessage();
            $response["status"]=false;
            return response()->json($response);
           }
    }
    public function ingredients($id){
       try {
        $ingredients=Meal::find($id)->ingredients;
        $response["data"]=MealIngredientresource::collection($ingredients);
        $response["status"]=true;
        return response()->json($response);
       } catch (Exception $e) {
        $response=[];
        $response["error"]=$e->getMessage();
        $response["status"]=false;
        return response()->json($response);
       }
    }
}
