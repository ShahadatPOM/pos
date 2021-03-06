<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\Food;
use App\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
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
        $food->Description = $request->description;
        $food->status = $request->status;
        $food->price  = $request->price;
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
        Session::flash('success', 'food added successfully');
        return redirect()->route('food.index');

    }

    public function edit($id)
    {
        $categories = Category::all();
        $food = Food::where('id', $id)->first();
        return view('admin.food.edit', compact('categories', 'food'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'foodName' => 'required|unique:food,$id',
            'fkcategory_id' => 'required',
            'status' => 'required',
        ]);

        $food = Food::where('id', $id)->first();
        $food->foodName = $request->foodName;
        $food->fkcategory_id = $request->fkcategory_id;
        $food->Description = $request->description;
        $food->status = $request->status;
        $food->price  = $request->price;
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
        Session::flash('success', 'food updated successfully');
        return redirect()->route('food.index');
    }

   
    public function delete(Request $request, $id){
        $food = Food::where('id', $id)->first();
        $food->delete();
        Session::flash('success', 'food deleted successfully');
        return back();
    }
}
