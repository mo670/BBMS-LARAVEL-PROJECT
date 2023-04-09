<?php

namespace App\Http\Controllers\frontend\auth;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthFrontController extends Controller
{
    public function login(){
        return view('frontend.partials.auth.loginAndRegistration');
    }
public function customerRegister(){
    return view('frontend.partials.auth.registration');
}
    public function register(Request $request){
        // return $request->all();
        $request->validate([
            'email' => 'required|email',
            'name'=>'required',
            'mobile' =>'required',
            'address'=>'required',
            'password'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/customer/'), $filename);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' =>'customer'
        ]);

        Customer::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'image' => $filename
        ]);
        return back()->with('message','Registration done successfully');

    }

    public function loginSubmit(Request $request){
        // return $request->all();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // dd('ok');
            if(Auth::user()->role == 'customer'){
                return redirect()->route('home')->with('message','login successfull');
            }else{
                echo "You need to be a customer to login";
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile(){
        $profile = Customer::where('user_id', Auth::user()->id)->first();
        return view('frontend.partials.customers.profile',compact('profile'));
    }
    public function profileUpdate(Request $request,$id){
        // return $id;
        $request->validate([
            'name'=>'required',
            'mobile' =>'required',
            'address'=>'required',
            'about'=>'required',
            'company' => 'required',
            't_profile'=>'required',
            'f_profile'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

       $data = Customer::where('user_id',$id)->first();

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/customer/'), $filename);
            @unlink(public_path('images/customer/') . $data->image);
        }
        $formData = $request->all();
        $formData['image'] =$filename;
        $data->fill($formData)->save();
        return back()->with('message','Profile information updated successfully');
    }

    // change Password

    public function changePassword(){
        return view('frontend.partials.auth.changePassword');
    }

    public function updatePassword(Request $request){

        if (!Hash::check($request->input('OldPassword'), auth()->user()->password)) {
            return redirect()->back()->with('error', 'Current Password does not match.');
        }
        $request->validate([
            'OldPassword' => 'required',
            'NewPassword' => 'required|min:6',
            'NewPasswordConfirm' => 'required|same:NewPassword'

        ]);
        if (Hash::check($request->input('NewPassword'), auth()->user()->password)) {
            return redirect()->back()->with('error', 'New password can not be the old password.');
        }
        $users = User::find(auth()->user()->id);
        $users->update([
            'password' => Hash::make($request->NewPassword)
        ]);
        return redirect()->back()->with('message', 'Password updated successfully!');
    }
}
