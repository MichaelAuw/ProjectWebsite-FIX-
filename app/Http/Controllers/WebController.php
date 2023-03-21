<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function admin(Request $request){
        return view('admin');
    }

    public function charts(Request $request){
        return view('charts');
    }

    public function tables(Request $request){
        return view('tables');
    }
}
