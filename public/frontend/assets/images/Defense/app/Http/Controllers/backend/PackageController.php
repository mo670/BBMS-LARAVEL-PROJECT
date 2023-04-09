<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function allpackage()
    {

        $allPackage = Package::get();
        //  dd($allPackage);
        return view('backend.partials.package.allpackage', compact('allPackage'));
    }

    public function addPackage()
    {
        return view('backend.partials.package.addpackage');

    }
    public function createPackage(Request $request)
    {
        $request->validate([
            'pack_name' => 'required',
            'pack_price'=> 'required',
            'pack_amount' =>'required',
            'pack_description' =>'required'
        ]);
        // dd($request);
        Package::create([
            'pack_name' => $request->pack_name,
            'pack_price' => $request->pack_price,
            'pack_amount' => $request->pack_amount,
            'pack_description' => $request->pack_description,
        ]);

        return redirect()->back();

    }
    public function editPackage($id)
    {
        //   dd($id);

        $editPackage = Package::findorFail($id);
        // dd($editPackage);

        return view('backend.partials.package.editPackage', compact('editPackage'));

    }

    public function updatePackage(Request $request, $id)
    {
        $request->validate([
            'pack_name' => 'required',
            'pack_price'=> 'required',
            'pack_amount' =>'required',
            'pack_description' =>'required'
        ]);

        $updatePackage = Package::findorFail($id);
        //  dd('updatePackage');
        $updatePackage->update([

            'pack_name' => $request->pack_name,
            'pack_price' => $request->pack_price,
            'pack_amount' => $request->pack_amount,
            'pack_description' => $request->pack_description,

        ]);
        return redirect()->route('package.all');

    }

    public function deletePackage($id)
    {
        $deletePackage = Package::findorFail($id);
        $deletePackage->delete();
        return redirect()->back();

    }

}
