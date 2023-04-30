<?php

namespace App\Http\Controllers;

use App\Models\education;
use Illuminate\Http\Request;

class EducationControl extends Controller
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
        $data = education::all();
        return view('Education.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.education' => 'required',
            'inputs.*.description' => 'required',
            'inputs.*.DateFrom' => 'required',
            'inputs.*.DateTo' => 'required',
        ],
        [
            'inputs.*.education' => 'Please Fill all the education field',
            'inputs.*.description' => 'Please Fill all the description field',
            'inputs.*.DateFrom' => 'Please Fill all the from field',
            'inputs.*.DateTo' => 'Please Fill all the end field'
        ]
    );

        foreach($request->inputs as $key=>$value){
            education::create($value);
        }

        return redirect()->route('Education.index');
        
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
        $data = education::findOrFail($id);
        return view('Education.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'inputs.*.Education' => 'required',
            'inputs.*.Description' => 'required',
            'inputs.*.DateFrom' => 'required',
            'inputs.*.DateTo' => 'required'
        ]);

        $Education = education::findOrFail($id);
        $Education->Education = $request->Education;
        $Education->Description = $request->Description;
        $Education->DateFrom = $request->DateFrom;
        $Education->DateTo = $request->DateTo;
        $Education->save();

        return redirect()->route('Education.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Education = education::findOrFail($id);
        $Education->delete();

        return redirect()->route('Education.index');
    }
}
