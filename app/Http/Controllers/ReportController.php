<?php

namespace App\Http\Controllers;

use PDF;
use App\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(){
        $orders = Order::where('status', 'complete')->get();
        $pdf = PDF::loadView('admin.report.sale', $orders);
    return $pdf->stream('invoice.pdf');
    }
}
