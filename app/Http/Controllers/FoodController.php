<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

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

    public function store(Request $r)
    {
        $this->validate($r, [
            'name' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->name = $r->name;
        $category->status = 1;
        $category->save();
        Alert::toast('category created successfully', 'success');
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
