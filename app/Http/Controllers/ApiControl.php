<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMyPortfolioRequest;
use App\Http\Requests\DeleteMyPortfolioRequest;
use App\Http\Requests\UpdateMyPortfolioRequest;
use App\Models\myPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = myPortfolio::all();
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddMyPortfolioRequest $request)
    {
        $imagePath = $request->file('image_file')->store('uploads',['disk' => 'public']);
        $imagePath2 = $request->file('image_home')->store('uploads',['disk' => 'public']);

        $newMyPortfolio = new myPortfolio();
        $newMyPortfolio->name = $request->name;
        $newMyPortfolio->about = $request->about;
        $newMyPortfolio->profile = $request->profile;
        $newMyPortfolio->email = $request->email;
        $newMyPortfolio->phone = $request->phone;
        $newMyPortfolio->image_file_url = '/storage/' . $imagePath;
        $newMyPortfolio->home_image = '/storage/' . $imagePath2;
        $newMyPortfolio->save();

        return response("successfully add portfolio");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMyPortfolioRequest $request, string $id)
    {
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
        $MyPortfolio->about = $request->about;
        $MyPortfolio->profile = $request->profile;
        $MyPortfolio->email = $request->email;
        $MyPortfolio->phone = $request->phone;
        $MyPortfolio->save();

        return response('Update portfolio success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteMyPortfolioRequest $request, string $id)
    {
        $MyPortfolio = myPortfolio::findOrFail($id);
        $MyPortfolio->delete();

        return response('Delete portfolio success');
    }
}
