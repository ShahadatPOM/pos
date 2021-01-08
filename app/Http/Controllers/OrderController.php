<?php

namespace App\Http\Controllers;

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
}
