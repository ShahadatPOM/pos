<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Order;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        $today = date('Y-m-d');
        $completeOrder = Order::where('status', 'complete')->get();
        $pendingOrder = Order::where('status', 'pending')->get();
        $cancelOrder = Order::where('status', 'cancel')->get();
        $todaysBooking = Reservation::where('date', $today)->get();
        return view('admin.dashboard', compact('completeOrder', 'pendingOrder', 'cancelOrder', 'todaysBooking'));
    }

    public function allUsers(){
        $users = User::all();
        return view('admin.user.all', compact('users'));
    }

    public function userCreate(){
        return view('admin.user.create');
    }

    public function userStore(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->save();
        Session::flash('success', 'user created successfully');
        return redirect()->route('all.user');
        
    }

    public function userDelete(Request $request, $id){
        $user = User::where('id', $id)->first();
        $user->delete();
        Session::flash('success', 'user deleted successfully');
        return back();
    }
}
