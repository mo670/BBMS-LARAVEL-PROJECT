<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function allPackages(){
        $pac = Package::orderBy('id','desc')->take('6')->get();
        // dd($pac);
        return view('frontend.partials.package.package',compact('pac'));
    }
}
