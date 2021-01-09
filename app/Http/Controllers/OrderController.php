<?php

namespace App\Http\Controllers;

use App\Food;
use App\Order;
use App\Category;
use App\OrderItem;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Session;

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
            $order = new Order();
            $digits = 3;
            
            $order->orderToken = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $order->save();
            foreach($foods as $key=>$food){
                $orderItem = new OrderItem();
                $orderItem->fkorderId = $order->id;
                $orderItem->itemPrice = $food->vat;
                $orderItem->quantity = $quantities[$key];
                $orderItem->total = $quantities[$key]*$food->vat;
                $orderItem->save();

                // $fq = $quantities[$key];
                // $price = $fq*$food->vat;
                // dd($price);
            }
            $orderTotal = OrderItem::where('fkorderId', $order->id)->sum('total');
            $order->orderTotal = $orderTotal;
            $order->save();
            return back();
    }

    public function orderList(){ 
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function addToCart(Request $request){
        $food = Food::findOrfail($request->id);
            
            if(!empty($request->quantity)){
                $quantity = $request->quantity;
            }else{
                $quantity = 1;
            }

           $cart= \Cart::add([
                'id' => $sku->skuId,
                'name' => $sku->product->productName,
                'price' => $price,
                'quantity' => $quantity,
                'attributes' => [
                    'skuImage' => $skuimg,
                    'variations' => $variations,
                    'productID' => $sku->product->productId
                ]
            ]);
            return response()->json(array("cart"=>\Cart::getContent(),"total"=>number_format(\Cart::getSubTotal())));
    
    }

    public function cartItemRemove(){

    }

    public function itemQuantityUpdate(){

    }
}
