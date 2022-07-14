<?php

namespace App\Http\Controllers;
Use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChat()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => "Chat"]
        ];

        return view('chat.show', ['breadcrumbs' => $breadcrumbs]);
        
    }

    public function messageReceived(Request $request) {
        $rules = [
            'message' => 'required',
        ];

        $request->validate($rules);

        broadcast(new MessageSent($request->user(), $request->message));
        return response()->json('Message broadcasted');
    }
}
