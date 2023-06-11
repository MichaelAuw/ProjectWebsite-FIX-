<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class subjectControl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $data = subject::all();
        $data2 = Category::all();

        if($request->category){
            $data = subject::with('category')->where('category_id',$request->category)->get();
        }

        return view('Subject.index',compact('data','data2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view('Subject.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.Subject' => 'required',
            'inputs.*.Category' => 'required',
            'inputs.*.description' => 'required',
            'inputs.*.DateFrom' => 'required',
            'inputs.*.DateTo' => 'required',
        ],
        [
            'inputs.*.Subject' => 'Please Fill all the Subject field',
            'inputs.*.Category' => 'Please Fill all the Semester field',
            'inputs.*.description' => 'Please Fill all the description field',
            'inputs.*.DateFrom' => 'Please Fill all the from field',
            'inputs.*.DateTo' => 'Please Fill all the end field'
        ]
    );

        foreach($request->inputs as $key=>$value){
            subject::create([
                'Subject' => $request->inputs[$key]['Subject'],
                'category_id' => $request->inputs[$key]['Category'],
                'description' => $request->inputs[$key]['description'],
                'DateFrom' => $request->inputs[$key]['DateFrom'],
                'DateTo' => $request->inputs[$key]['DateTo'],
                // 'user_id' =>  Auth::user()->id,
            ]);
        }

        return redirect()->route('Subject.index');
        
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
        $data = subject::findOrFail($id);
        $data2 = Category::all();
        return view('Subject.edit',compact('data','data2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'inputs.*.Subject' => 'required',
            'inputs.*.Category' => 'required',
            'inputs.*.Description' => 'required',
            'inputs.*.DateFrom' => 'required',
            'inputs.*.DateTo' => 'required'
        ]);

        $Subject = subject::findOrFail($id);
        // $Subject->user_id = Auth::user()->id;
        $Subject->Subject = $request->Subject;
        $Subject->category_id = $request->Category;
        $Subject->Description = $request->Description;
        $Subject->DateFrom = $request->DateFrom;
        $Subject->DateTo = $request->DateTo;
        $Subject->save();

        return redirect()->route('Subject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Subject = subject::findOrFail($id);
        $Subject->delete();

        return redirect()->route('Subject.index');
    }
}
