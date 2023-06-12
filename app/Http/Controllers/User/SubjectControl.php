<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectControl extends Controller
{
    public function index(Request $request)
    {
        $data = subject::all();
        $data2 = Category::all();

        if($request->category){
            $data = subject::with('category')->where('category_id',$request->category)->get();
        }
        
        // });
        return view('user.subject',compact('data','data2'));
    }
}
