<?php

namespace App\Http\Controllers;

use DataTables;
use App\Category;
use Image;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
public function index(){
    $categories = Category::all();
    return view('admin.category.index', compact('categories'));
}

public function create(){
    return view('admin.category.create');
}

public function store(Request $request){

    $category = new Category();
    $category->categoryName = $request->categoryName;
    $category->status = $request->status;
    $category->save();

    if ($request->hasFile('cat_image')) {
        $originalName = $request->cat_image->getClientOriginalName();
        $uniqueImageName = $request->categoryName.$originalName;
        $image = Image::make($request->cat_image);
        $image->resize(280, 280);
        $image->save(public_path().'/category/'.$uniqueImageName);
        $category->cat_image = $uniqueImageName;
        $category->save();
    }
    Session::flash('success', 'category added successfully');
    return redirect()->route('category.index');
}

public function edit($id){
    $category = Category::where('id', $id)->first();
    return view('admin.category.edit', compact('category'));
}

public function update(Request $request, $id){
    $category = Category::where('id', $id)->first();
    
    $category->categoryName = $request->categoryName;
    $category->status = $request->status;
    $category->save();

    if ($request->hasFile('cat_image')) {
        $originalName = $request->cat_image->getClientOriginalName();
        $uniqueImageName = $request->categoryName.$originalName;
        $image = Image::make($request->cat_image);
        $image->resize(280, 280);
        $image->save(public_path().'/category/'.$uniqueImageName);
        $category->cat_image = $uniqueImageName;
        $category->save();
    }
    Session::flash('success', 'category updated successfully');
    return redirect()->route('category.index');

}

    public function delete(Request $request, $id){
        $category = Category::where('id', $id)->first();
        $category->delete();
        Session::flash('success', 'category deleted successfully');
        return back();
    }

}
