<?php

namespace App\Http\Controllers;

use App\Food;
use App\Variant;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VariantController extends Controller
{
    public function index()
    {
        $variants = Variant::all();
        return view('admin.variant.index', compact('variants'));
    }

    public function create()
    {
        $foods = Food::all();
        return view('admin.variant.create', compact('foods'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'variantName' => 'required|unique:variants',
            'fkfood_id' => 'required',
            'status' => 'required',
        ]);

        $variant = new Variant();
        $variant->variantName = $request->variantName;
        $variant->fkfood_id = $request->fkfood_id;
        $variant->status = $request->status;
        $variant->price  = $request->price;
        $variant->save();

        Alert::toast('variant added successfully', 'success');
        return redirect()->route('variant.index');
    }

    public function edit($id)
    {
        $foods = Food::all();
        $variant = Variant::where('id', $id)->first();
        return view('admin.variant.edit', compact('foods', 'variant'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'variantName' => 'required',
            'fkfood_id' => 'required',
            'status' => 'required',
        ]);

        $variant = Variant::where('id', $id)->first();
        $variant->variantName = $request->variantName;
        $variant->fkfood_id = $request->fkfood_id;
        $variant->status = $request->status;
        $variant->price  = $request->price;
        $variant->save();

        Alert::toast('variant updated successfully', 'success');
        return redirect()->route('variant.index');
    }

   
    public function delete(Request $request, $id){
        $variant = Variant::where('id', $id)->first();
        $variant->delete();
        Alert::toast('variant deleted successfully', 'success');
        return redirect()->route('variant.index');
    }
}
