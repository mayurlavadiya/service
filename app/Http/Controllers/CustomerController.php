<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return "View";
    }

    public function add(){
        $url = url('/add');
        $title = "ADD PRODUCT";
        // $customers = Customers::find;
        // $customers = compact('url','title');
        return view('add',compact('url','title'));
    }

    public function update(){
        $url = url('/update');
        $title = "UPDATE PRODUCT";
        // $customers = Customers::find;
        // $customers = compact('url','title');
        return view('update',compact('url','title'));
    }



}
