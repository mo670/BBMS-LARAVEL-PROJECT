<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function allcustomer()
    {

        $allCustomer = Customer::get();
        // dd($allCustomer);
        return view('backend.partials.customer.allcustomer', compact('allCustomer'));
    }


    // see paid orders by customers
    public function seeOrders($cust_id){
        // return $cust_id;
        $order = Order::where([
            'customer_id'=> $cust_id,
            'payment' =>'accepted'
        ])->with('invoice')->get();
    //    dd($order);
        return view('backend.partials.customer.paidOrders',compact('order'));
    }

    public function deleteCustomer($id)
    {
        $deleteCustomer = User::findorFail($id);
        // dd($deleteCustomer);
        $deleteCustomer->delete();
        return redirect()->back();

    }

    
}
