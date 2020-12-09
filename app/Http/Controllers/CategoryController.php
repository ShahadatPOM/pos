<?php

namespace App\Http\Controllers;

use DataTables;
use App\Category;
use Illuminate\Http\Request;
use Redirect,Response;

class CategoryController extends Controller
{
public function index(){
    return view('admin.category.index');
}

public function show(Request $request){
    if(request()->ajax()){
        return datatables()->of(Category::all())
       
        ->rawColumns(['action'])
        ->make(true);
    }
}

public function store(Request $request){
    Category::Create([
        'categoryName' => $request->categoryName, 
        'status' => $request->status,
        ]);        
        return Response::json();
}

public function edit(Request $request)
{   
    $category  = Category::where('id', $request->categoryId)->first();
  
    return Response::json($category);
}

public function destroy(Request $request)
{
    $category = Category::where('id', $request->categoryId)->delete();
    return Response::json();
}


}
