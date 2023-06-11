<?php

namespace App\Http\Controllers;

use App\Models\Interests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InterestControl extends Controller
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
        $data = Interests::all();
        return view('Interest.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Interest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.Interests' => 'required',
            'inputs.*.Icon' => 'required',
        ],
        [
            'inputs.*.Interests' => 'Please Fill all the name field',
            'inputs.*.Icon' => 'Please Fill all the percentage field'
        ]
    );

        foreach($request->inputs as $key=>$value){
            Interests::create([
                'Interests' => $request->inputs[$key]['Interests'],
                'Icon' => $request->inputs[$key]['Icon'],
                'user_id' =>  Auth::user()->id,
            ]);
        }

        return redirect()->route('Interest.index');
        
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
        $data = Interests::findOrFail($id);
        return view('Interest.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'inputs.*.Interests' => 'required',
            'inputs.*.Icon' => 'required',
        ]);

        $Interests = Interests::findOrFail($id);
        $Interests->user_id = Auth::user()->id;
        $Interests->Interests = $request->Interests;
        $Interests->Icon = $request->Icon;
        $Interests->save();

        return redirect()->route('Interest.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Interests = Interests::findOrFail($id);
        $Interests->delete();

        return redirect()->route('Interest.index');
    }
}
