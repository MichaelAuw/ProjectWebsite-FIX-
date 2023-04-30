<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageControl extends Controller
{
   

    public function __construct()
    {
        $this->middleware('auth',['except'=>['store']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Message::all();
        return view('Message.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    
     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $newMessage = new Message();
        $newMessage->Name = $request->name;
        $newMessage->Email = $request->email;
        $newMessage->Subject = $request->subject;
        $newMessage->Message = $request->message;
        $newMessage->save();

        return redirect('user/contact');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Message = Message::findOrFail($id);
        $Message->delete();

        return redirect()->route('Message.index');
    }
}
