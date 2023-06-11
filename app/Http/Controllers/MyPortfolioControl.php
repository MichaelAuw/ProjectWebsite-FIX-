<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\myPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MyPortfolioControl extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = myPortfolio::all();
        return view('Myportfolio.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view('MyPortfolio.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'profile' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image_file' => 'required',
            'image_home' => 'required',
        ],
    );


        $imagePath = $request->file('image_file')->store('uploads',['disk' => 'public']);
        $imagePath2 = $request->file('image_home')->store('uploads',['disk' => 'public']);

        $newMyPortfolio = new myPortfolio();
        $newMyPortfolio->name = $request->name;
        $newMyPortfolio->user_id =  Auth::user()->id;
        $newMyPortfolio->about = $request->about;
        // $newMyPortfolio->category_id = $request->Category;
        $newMyPortfolio->profile = $request->profile;
        $newMyPortfolio->email = $request->email;
        $newMyPortfolio->phone = $request->phone;
        $newMyPortfolio->image_file_url = '/storage/' . $imagePath;
        $newMyPortfolio->home_image = '/storage/' . $imagePath2;
        $newMyPortfolio->save();

        return redirect()->route('MyPortfolio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = myPortfolio::findOrFail($id);
        $data2 = Category::all();
        return view('MyPortfolio.edit',compact('data','data2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'profile' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $MyPortfolio = myPortfolio::findOrFail($id);

        

        if($request->hasFile('image_file')){
            $destination = $MyPortfolio->image_file_url;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $imagePath = $request->file('image_file')->store('uploads',['disk' => 'public']);
            $MyPortfolio->image_file_url = '/storage/' . $imagePath;

        }

        if($request->hasFile('image_home')){
            $destination = $MyPortfolio->home_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $imagePath = $request->file('image_home')->store('uploads',['disk' => 'public']);
            $MyPortfolio->home_image = '/storage/' . $imagePath;

        }
        $MyPortfolio->name = $request->name;
        $MyPortfolio->user_id =  Auth::user()->id;
        $MyPortfolio->about = $request->about;
        $MyPortfolio->profile = $request->profile;
        $MyPortfolio->email = $request->email;
        $MyPortfolio->phone = $request->phone;
        $MyPortfolio->save();

        return redirect()->route('MyPortfolio.index');
    }

    /**
     * ReMove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $MyPortfolio = myPortfolio::findOrFail($id);
        $MyPortfolio->delete();

        return redirect()->route('MyPortfolio.index');
    }
}
