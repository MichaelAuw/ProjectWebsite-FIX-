<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactControl extends Controller
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
        $data = Contact::all();
        return view('Contact.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.Link' => 'required',
            'inputs.*.SocialMedia' => 'required',
        ],
        [
            'inputs.*.Link' => 'Please Fill all the link field',
            'inputs.*.SocialMedia' => 'Please Fill all the socialmedia field'
        ]
    );

        foreach($request->inputs as $key=>$value){
            Contact::create([
                'Link' => $request->inputs[$key]['Link'],
                'SocialMedia' => $request->inputs[$key]['SocialMedia'],
                'user_id' =>  Auth::user()->id,
            ]);
        }

        return redirect()->route('Contact.index');
        
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
        $data = Contact::findOrFail($id);
        return view('Contact.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'inputs.*.Link' => 'required',
            'inputs.*.SocialMedia' => 'required'
        ]);

        $Contact = Contact::findOrFail($id);
        $Contact->user_id = Auth::user()->id;
        $Contact->Link = $request->Link;
        $Contact->SocialMedia = $request->SocialMedia;
        $Contact->save();

        return redirect()->route('Contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Contact = Contact::findOrFail($id);
        $Contact->delete();

        return redirect()->route('Contact.index');
    }
}
