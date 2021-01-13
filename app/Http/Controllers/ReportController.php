<?php

namespace App\Http\Controllers;

use PDF;
use App\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function saleReport(){
        return view('admin.report.reportForm');
    }

    public function report(Request $request){
        $orders = Order::with('orderItem')->where('status', 'complete')
        ->whereBetween('created_at', [$request->fromDate." 00:00:00", $request->toDate." 23:59:59"])->get();
        $total = 0;
        foreach($orders as $order){
            $total += $order->orderTotal;
        }
       
        $data = [
            'fromdate'=> $request->fromDate,
            'todate'=> $request->toDate,
            'orders'=> $orders,
            'orderTotal'=> $total,
        ];
        $pdf = PDF::loadView('admin.report.sale', $data);
    return $pdf->stream('invoice.pdf');
    }

    
}
