<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;

class OrderController extends Controller
{
    public function orders()
    {
        $allOrder = Order::where('status', 'pending')
            ->with('package', 'customer')->orderBy('id', 'asc')->get();
        return view('backend.partials.orders.allOrders', compact('allOrder'));
    }

    public function orderStatus($orderID, $custID)
    {
        Order::where(['id' => $orderID, 'customer_id' => $custID])->update(['status' => 'approved']);
        return back()->with('message', 'status changed successfully');
    }

    public function approvedOrders()
    {
        $allOrder = Order::where('status', 'approved')
            ->with('package', 'customer')->orderBy('id', 'asc')->get();
        return view('backend.partials.orders.approvedOrders', compact('allOrder'));
    }
    // reject
    public function orderStatuschange($orderID, $custID)
    {
        Order::where(['id' => $orderID, 'customer_id' => $custID])->update(['status' => 'pending']);
        return back()->with('message', 'status changed successfully');
    }

    // paid

    public function paidOrders()
    {
        $allPaidOrder = Order::where(['status' => 'approved','payment' => 'accepted',])->with('package', 'customer')->orderBy('id', 'asc')->get();
        // dd($allPaidOrder);
        return view('backend.partials.orders.paidOrders', compact('allPaidOrder'));
    }

    // report

    public function newOrderReport(){
        $fromDate='';
        $toDate='';
        $allnewOrder = Order::where('status', 'pending')->with('package', 'customer')->orderBy('id', 'asc')->get();
        return view('backend.partials.report.newOrderEstimation',compact('allnewOrder','fromDate','toDate'));
    }

    public function generateRewOrderReport(){
        $allnewOrder = [];
        $fromDate='';
        $toDate='';

        if($_GET)
        {
            if ($_GET['from_date']!='' && $_GET['to_date']!=''){
                $fromDate = date('Y-m-d',strtotime($_GET['from_date']));
                $toDate = date('Y-m-d',strtotime($_GET['to_date']));
                // return $toDate;
                $allnewOrder = Order::where('status', 'pending')->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->get();
            }
        }
        return view('backend.partials.report.newOrderEstimation',compact('allnewOrder','fromDate','toDate'));
    }


    // sell order estimate
    public function sellOrderReport(){
        $sum ='';
        $fromDate='';
        $toDate='';
        $allsellOrder = Invoice::with('order', 'customer')->orderBy('id', 'asc')->get();
       
        //  return $allssum;
        return view('backend.partials.report.sellOrderEstimate',compact('allsellOrder','fromDate','toDate','sum'));
    }

// after clicking generate 
    public function generateSellOrderReport(){
        $allsellOrder = [];
        $fromDate='';
        $toDate='';

        if($_GET)
        {
            if ($_GET['from_date']!='' && $_GET['to_date']!=''){
                $fromDate = date('Y-m-d',strtotime($_GET['from_date']));
                $toDate = date('Y-m-d',strtotime($_GET['to_date']));
                // return $toDate;
                $allsellOrder = Invoice::with('order', 'customer')->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->get();
                $sum = Invoice::with('order', 'customer')->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->sum('tottalPrice');
            }
        }
        return view('backend.partials.report.sellOrderEstimate',compact('allsellOrder','fromDate','toDate','sum'));

    }
}
