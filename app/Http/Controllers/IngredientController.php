<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
class IngredientController extends Controller
{
    public function all(){
        $ingredients=Ingredient::all();
        return view('/ingredient',["ingredients"=>$ingredients]);
    }
    public function update(Request $request, $id){
        $ingredient=Ingredient::find($id);
        if(isset($_POST["delete"])){
            $ingredient->delete();
        }else{

        }
        return redirect('/ingredient');
    }
    public function create(Request $request){
        $input=$request->all();
        Ingredient::create($input);
        return redirect('/ingredient');
    }
}
