<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DataTables;
use App\Reservation;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }
    
    public function create(){
        return view('admin.reservation.create');
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'mobile' => 'required',
            'name' => 'required',
        ]);
    
        $reservation = new Reservation();
        $reservation->table_no = $request->table_no;
        $reservation->no_of_person = $request->no_of_person;
        $reservation->name = $request->name;
        $reservation->mobile = $request->mobile;
        $reservation->email = $request->email;
        $reservation->start_time = $request->start_time;
        $reservation->end_time = $request->end_time;
        $reservation->date = $request->date;
        $reservation->status = $request->status;
        $reservation->save();
        Session::flash('success', 'reservation added successfully');
        return back();
    }
    
    public function edit($id){
        $reservation = Reservation::where('id', $id)->first();
        return view('admin.reservation.edit', compact('reservation'));
    }
    
    public function update(Request $request, $id){
        $this->validate($request, [
            'email' => 'required|email',
            'mobile' => 'required',
            'name' => 'required',
        ]);
    
        $reservation = Reservation::where('id', $id)->first();
        $reservation->table_no = $request->table_no;
        $reservation->no_of_person = $request->no_of_person;
        $reservation->name = $request->name;
        $reservation->mobile = $request->mobile;
        $reservation->email = $request->email;
        $reservation->start_time = $request->start_time;
        $reservation->end_time = $request->end_time;
        $reservation->date = $request->date;
        $reservation->status = $request->status;
        $reservation->save();

        Session::flash('success', 'reservation updated successfully');
        return redirect()->route('reservation.index');
    
    }
    
        public function delete(Request $request, $id){
            $reservation = Reservation::where('id', $id)->first();
            $reservation->delete();
            Session::flash('success', 'reservation deleted successfully');
            return back();
        }
}
