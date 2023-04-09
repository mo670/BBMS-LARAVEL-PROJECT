<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function messagePage()
    {

        $cust_info = Customer::where('user_id', Auth::user()->id)->first();

        $msg = Message::where('customer_id', $cust_info->user_id)->first();

        return view('frontend.partials.message.messagePage', compact('cust_info', 'msg'));
    }

//  message code

    public function messageSend(Request $request)
    {
        $ex = Message::where('customer_id', $request->customer_id)->first();
        if ($ex == !null) {
            // $update = Message::where('customer_id', $request->customer_id)->first();
            // return $request->all();
            if($request->subject == !null){
                $ex->update([
                    'customer_message' => $request->customer_message,
                    'subject' => $request->subject,
                    'notify'=>'new'
                ]);
            }else{
                $ex->update([
                    'customer_message' => $request->customer_message,
                    'notify'=>'new'
                ]);
            }
            
            return back()->with('message', 'Message sent successfully');
        }else{
            $data = $request->all();
            Message::create($data);
            return back()->with('message', 'Message sent successfully');
        }

    }


    public function seeAllMessages(){
        $allmsg =Message::orderBy('id','desc')->with('customer')->get();
        return view('backend.partials.message.message',compact('allmsg'));
    }

    public function viewMessages($cust_id){
        $msg =Message::where(['customer_id' => $cust_id])->orderBy('id','desc')->with('customer')->first();
        // return $msg;
        return view('backend.partials.message.messageReply',compact('msg'));
    }
    public function replyMessages(Request $request,$cust_id){
       
        $reply = Message::where('customer_id',$cust_id)->first();
        $reply->update([
            'admin_message' => $request->admin_message,
            'notify' => 'read'
        ]);
        return redirect()->route('message.all')->with('message','Replied successfully');
    }
}
