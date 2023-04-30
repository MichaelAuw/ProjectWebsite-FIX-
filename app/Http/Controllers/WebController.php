<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\education;
use App\Models\Interests;
use Illuminate\Http\Request;
use App\Models\myPortfolio;
use App\Models\Skill;


class WebController extends Controller
{
    public function admin(Request $request){
        return view('admin');
    }

    public function home(Request $request){
        $data = myPortfolio::all();
        return view('user.home',compact('data'));
    }

    public function about(Request $request){
        $data = myPortfolio::all();
        $data2 = Skill::all();
        return view('user.about',compact('data','data2'));
    }

    public function education(Request $request){
        $data = education::all();
        return view('user.education',compact('data'));
    }

    public function interests(Request $request){
        $data = Interests::all();
        return view('user.interests',compact('data'));
    }
    public function contact(Request $request){
        $data = Contact::all();
        $data2 = myPortfolio::all();
        return view('user.contact',compact('data','data2'));
    }
}
