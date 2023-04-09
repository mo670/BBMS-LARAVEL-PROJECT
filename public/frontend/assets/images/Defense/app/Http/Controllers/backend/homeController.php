<?php

namespace App\Http\Controllers\backend;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function home(){
        
        return view ('backend.partials.home.home');
    }
}

