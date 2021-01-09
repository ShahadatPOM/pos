<?php

namespace App\Http\Controllers;

use App\Food;
use App\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderPage(){
        $categories = Category::where('status', 1)->get();
        return view('admin.order.orderPage', compact('categories'));
    }

    public function orderStore(Request $request){
        
    }

    public function foodPage($id, $text=false)
    {
            if($text == false) {
                $categoriesid = $id;
                $category = Category::findOrfail($categoriesid);

                // $childCategories = Category::where('parent', $categoriesid)->get();

                $foods = Food::where('fkcategory_id', $categoriesid)->where('status', 1)->get();

                // foreach ($foods as $food) {
                    
                // }
                return view('admin.order.orderPage', compact('categoriesid', 'category', 'foods'));
            }

            if($text != false){               
                $foods = Food::where('foodName', 'Like', "%$text%")->pluck('id');
                $food = Food::whereIn('id', $foods)->where('status', 'active')->get();

                if($food->count() == 0){
                    session()->flash('message','NO match found');
                    return redirect()->route('order.orderPage');
                }
                return view('admin.order.orderPage', compact( 'foods'));
            }
    }

    public function foodSearch($text){
        return $this->foodPage($id=false, $text);
    }

    public function allFood(Request $request)
    {
            if (!empty($request->catSS)) {
                $foods = Food::whereIn('fkcategory_id', $request->catSS)->get();
            }

        return view('admin.order.foodDetail-ajax', compact('foods'));
    }

    public function selectedFoods(Request $request){
            // dd(array_keys($request->foodId));
            $foods = Food::whereIn('id', $request->foodId)->get();
            $quantities = array_intersect_key($request->quantity, $request->foodId);
            foreach($foods as $key=>$food){
                $fq = $quantities[$key];
                $price = $fq*$food->vat;
                dd($price);
                
            }
    }
}
