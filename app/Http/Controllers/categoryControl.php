<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryControl extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Category::all();
        return view('Category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.Name' => 'required',
        ],
        [
            'inputs.*.Name' => 'Please Fill all the Category field',
        ]
    );

        foreach($request->inputs as $key=>$value){
            Category::create($value);
        }

        return redirect()->route('Category.index');
        
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
        $data = Category::findOrFail($id);
        return view('Category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'inputs.*.Name' => 'required',
        ]);

        $Category = Category::findOrFail($id);
        $Category->Name = $request->Name;
        $Category->save();

        return redirect()->route('Category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();

        return redirect()->route('Category.index');
    }
}
