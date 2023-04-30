<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillControl extends Controller
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
        $data = Skill::all();
        return view('Skill.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.name' => 'required',
            'inputs.*.percentage' => 'required',
        ],
        [
            'inputs.*.name' => 'Please Fill all the name field',
            'inputs.*.percentage' => 'Please Fill all the percentage field'
        ]
    );

        foreach($request->inputs as $key=>$value){
            Skill::create($value);
        }

        return redirect()->route('Skill.index');
        
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
        $data = Skill::findOrFail($id);
        return view('Skill.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'percentage' => 'required',
        ]);

        $Skill = Skill::findOrFail($id);
        $Skill->name = $request->name;
        $Skill->percentage = $request->percentage;
        $Skill->save();

        return redirect()->route('Skill.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Skill = Skill::findOrFail($id);
        $Skill->delete();

        return redirect()->route('Skill.index');
    }
}
