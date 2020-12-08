<?php

namespace App\Http\Controllers;

use DataTables;
use App\Category;
use Illuminate\Http\Request;
use Redirect,Response;

class CategoryController extends Controller
{
public function index(){
    if(request()->ajax()){
        return datatables()->of(Category::select('*'))
        ->addColumn('action', 'Datatables.action')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
    return view('admin.category.index');
}

public function store(Request $request){
    Category::Create([
        'categoryName' => $request->categoryName, 
        'status' => $request->status,
        ]);        
        return Response::json();
}

public function edit($id)
{   
    $where = array('id' => $id);
    $category  = Category::where($where)->first();
  
    return Response::json($category);
}

public function destroy($id)
{
    $category = Category::where('id',$id)->delete();
  
    return Response::json($category);
}


}
