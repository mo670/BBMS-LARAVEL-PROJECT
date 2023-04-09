<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function doOrder($cus_id, $pack_id)
    {
        $pack = Package::where('id', $pack_id)->first();
        $cust = Customer::where('user_id', $cus_id)->first();
        // dd($cust);
        Order::create([
            'customer_id' => $cust->user_id,
            'package_id' => $pack->id,
            'status' => 'pending',
        ]);

        return back()->with('message', 'Your order has been created successfully');
    }

    public function myOrders()
    {
        $authID = Customer::where('user_id', Auth::user()->id)->pluck('user_id')->first();
        //  return $authID;
        $myOrders = Order::where('customer_id', $authID)->orderBy('id', 'desc')->with('package')->get();
        // return $myOrders;
        return view('frontend.partials.MyOrders.myOrder', compact('myOrders'));
    }

    public function orderPayment($order_id)
    {
        // return $order_id;
        $authID = Customer::where('user_id', Auth::user()->id)->pluck('user_id')->first();
        //   return $authID;
        $myOrders = Order::where('id', $order_id)->with('package')->first();
        //  return $myOrders;
        return view('frontend.partials.MyOrders.paymentPage', compact('authID', 'myOrders'));

    }

    public function makepayment(Request $request)
    {
        // return $request->all();
        $invoiceNumber = Str::upper('ORD-' . Str::random(6));

        $invoice = Invoice::create([
            'customer_id' => $request->customer_id,
            'order_id' => $request->order_id,
            'tottalPrice' => $request->tottalPrice,
            'paymentGetway' => $request->paymentGetway,
            'invoiceNumber' => $invoiceNumber,
        ]);
        $myOrders = Order::where('id', $request->order_id)->update([
            'payment' => 'accepted',
        ]);

        // send mail
        $invID = $invoice->id;
        $bkas = Invoice::where('id', $invID)->first();
        // return $bkas;
        if ($bkas->paymentGetway == 'bkash') {
            $customerInfo = User::where('id', Auth::user()->id)->with('customer')->first();
            //  return $customerInfo;


            Mail::send('frontend.mail.mail', ['customerInfo' => $customerInfo,'bkas'=>$bkas], function ($m) use ($customerInfo,$bkas) {
                $m->from('admin@gmail.com', 'ISP Management System');
                $m->to($customerInfo->email, $customerInfo->customer->name)->subject('Your Payment has received!');
            });
        }

        return redirect()->route('home')->with('message', 'Payment successfull!');
    }

    public function viewSingleOrder($cust_id)
    {
        $singleOrder = Order::where('customer_id', $cust_id)->with('package')->first();
        return view('frontend.partials.MyOrders.viewOrderDetail', compact('singleOrder'));
    }
}
