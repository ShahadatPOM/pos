<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\Food;
use App\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::paginate(10);
        return view('admin.food.index', compact('foods'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.food.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'foodName' => 'required|unique:food',
            'fkcategory_id' => 'required',
            'status' => 'required',
        ]);

        $food = new Food();
        $food->foodName = $request->foodName;
        $food->fkcategory_id = $request->fkcategory_id;
        // $food->component = $request->component;
        $food->notes = $request->notes;
        $food->Description = $request->Description;
        $food->is_special = $request->is_special;
        $food->cooking_time = $request->cooking_time;
        $food->status = $request->status;
        $food->vat  = $request->vat;
        $food->save();

        if ($request->hasFile('food_image')) {
            $originalName = $request->food_image->getClientOriginalName();
            $uniqueImageName = $request->foodName.$originalName;
            $image = Image::make($request->food_image);
            $image->resize(280, 280);
            $image->save(public_path().'/food/'.$uniqueImageName);
            $food->food_image = $uniqueImageName;
            $food->save();
        }
        Alert::toast('food added successfully', 'success');
        return back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('menuscript.category.edit', compact('category'));
    }

    public function update(Request $r, $id)
    {
        $this->validate($r, [
            'name' => "required|unique:categories,name,$r->id",
            'status' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $r->name;
        $category->status = $r->status;
        $category->save();
        Alert::toast('category updated successfully', 'success');
        return back();
    }

   
     public function delete(Request $request, $id){
        $category = Category::find($id);
        $category->delete();
        Alert::toast('category deleted successfully', 'success');
        return back();
    }
}
