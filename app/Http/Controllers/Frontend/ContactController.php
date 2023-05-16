<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('Frontend.contact');

    }

    // for file uploading ---- 26/4/2023
    public function upload(Request $request)
    {
        // method 1
        // echo $request->file('image')->store('upload');

        // method - 2
        $filename = time(). "-adv.". $request->file('image')->getClientOriginalExtension();
        echo $request->file('image')->storeAs('/upload', $filename); // apna pramane name aapva mate...............
    }
}
