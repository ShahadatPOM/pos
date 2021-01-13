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

    public function foodPage($id, $text=false)
    {
            if($text == false) {
                $categoriesid = $id;
                $category = Category::findOrfail($categoriesid);
                $foods = Food::where('fkcategory_id', $categoriesid)->where('status', 1)->get();
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

    public function orderStore(Request $request){
            $order = new Order();
            $digits = 3;
            $order->orderToken = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $order->orderTotal = \Cart::getSubTotal();
            $order->status = "pending";
            $order->save();
        foreach (\Cart::getContent() as $cartData) {
            $q = $cartData['quantity'];
            $orderItem = new OrderItem();
                $orderItem->fkorderId = $order->id;
                $orderItem->itemName = $cartData->name;
                $orderItem->itemPrice = $cartData->price;
                $orderItem->quantity = $cartData->quantity;
                $orderItem->total = $cartData->price*$cartData->quantity;
                $orderItem->save();
        }
        Session::flash('success', 'order placed successfully');
        \Cart::clear();
        return back();
    }

    public function orderList(){ 
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function pendingorderList(){ 
        $orders = Order::where('status', 'pending')->get();
        return view('admin.order.pending', compact('orders'));
    }

    public function completeorderList(){ 
        $orders = Order::where('status', 'complete')->get();
        return view('admin.order.complete', compact('orders'));
    }

    public function cancelorderList(){ 
        $orders = Order::where('status', 'cancel')->get();
        return view('admin.order.cancel', compact('orders'));
    }

    public function orderCancel($id){
        $order = Order::where('id', $id)->first();
        $order->status = "cancel";
        $order->save();
        return back();
    }

    public function orderComplete($id){
        $order = Order::where('id', $id)->first();
        $order->status = "complete";
        $order->save();
        return back();
    }

    public function addToCart(Request $request){
        $foodId = $request->foodId;
        $food = Food::where('id', $foodId)->first();
        
            if(!empty($request->quantity)){
                $quantity = $request->quantity;
            }else{
                $quantity = 1;
            }

           $cart= \Cart::add([
                'id' => $foodId,
                'name' => $food->foodName,
                'price' => $food->price,
                'quantity' => $quantity,
                'attributes' => [
                    'foodImage' => $food->food_image,
                ]
            ]);
            return response()->json();
    
    }

    public function cartItemRemove(Request $request){
        $foodId = $request->foodId;
        \Cart::remove($foodId);
        return response()->json();
    }

    public function orderEdit($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.order.edit', compact('order'));
    }

    public function orderUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'orderTotal' => 'required',
            'status' => 'required',
        ]);

        $order = Order::where('id', $id)->first();
        $order->orderTotal = $request->orderTotal;
        $order->status = $request->status;
        $order->save();

        Session::flash('success', 'order updated successfully');
        return redirect()->route('order.list');
    }


    public function orderDelete(Request $request, $id){
        $order = Order::where('id', $id)->first();
        $order->delete();
        Session::flash('success', 'order deleted successfully');
        return redirect()->route('order.list');
    }

    public function orderItemEdit($id)
    {
        $orderItem = OrderItem::where('id', $id)->first();
        return view('admin.orderItem.edit', compact('orderItem'));
    }

    public function orderItemUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'itemPrice' => 'required',
            'quantity' => 'required',
        ]);

        $orderItem = OrderItem::where('id', $id)->first();
        $orderId = $orderItem->fkorderId;
        $orderItem->itemPrice = $request->itemPrice;
        $orderItem->quantity = $request->quantity;
        $orderItem->total = $request->itemPrice*$request->quantity;
        $orderItem->save();

        $total = OrderItem::where('fkorderId', $orderId)->sum('total');
        $order = Order::where('id', $orderId)->first();
        $order->orderTotal = $total;
        $order->save();

        Session::flash('success', 'order Item updated successfully');
        return redirect()->route('order.list');
    }


    public function orderItemDelete(Request $request, $id){
        $orderItem = OrderItem::where('id', $id)->first();
        $orderId = $orderItem->fkorderId;
        $orderItem->delete();
        $total = OrderItem::where('fkorderId', $orderId)->sum('total');
        $order = Order::where('id', $orderId)->first();
        $order->orderTotal = $total;
        $order->save();
        Session::flash('success', 'order item deleted successfully');
        return redirect()->route('order.list');
    }

    public function orderDetails($id){
        $orderItems = OrderItem::where('fkorderId', $id)->get();
        return view('admin.order.detail', compact('orderItems'));
    }

    

    // public function itemQuantityUpdate(Request $cartData){

    //     for ($x = 0; $x < count($cartData->rowID); $x++) {
    //                $item = \Cart::get($cartData->rowID[$x]);
    //             }
    //                 session()->flash('success','Cart updated.');
    //             return response()->json();
    //         }
}
