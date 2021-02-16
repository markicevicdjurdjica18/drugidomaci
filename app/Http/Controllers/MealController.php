<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    public function all(){
        $meals=Meal::all();
        return view('/meal',["meals"=>$meals]);
    }
    public function update(Request $request, $id){
        $meal=Meal::find($id);
        if(isset($_POST["delete"])){
           try {
            $meal->delete();
           } catch (\Throwable $th) {
               
           }
        }else{

        }
        return redirect('/meal');
    }
}
