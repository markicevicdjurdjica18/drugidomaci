<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $ingredients=Ingredient::all();
            $response["data"]=$ingredients;
            $response["status"]=true;
            return response()->json($response);
           } catch (Exception $e) {
            $response=[];
            $response["errro"]=$e->getMessage();
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
            $ingredient= Ingredient::create($input);
            $response=[];
            $response["data"]=$ingredient;
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
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        try {
            $response["data"]=$ingredient;
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
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        try {
            if(isset($request->name)){
                $ingredient->name=$request->name;
                $ingredient->save();
            }
            
           
            $response["data"]=$ingredient;
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
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        try {
            $ingredient->delete();
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
