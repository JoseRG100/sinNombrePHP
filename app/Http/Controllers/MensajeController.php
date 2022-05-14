<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\Models\User;
use App\Notifications\MessageSent;

class MensajeController extends Controller
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
    public function index()
    {
        //$users = User::all();
        $users = User::where('id','!=', auth()->id())->get();
        $user = Auth::user()->tipo;

        if(($user !== 2)){
            return view('mensaje.create', compact('users'));
        }else{
            return view('home');
        }
        //return view('mensaje.create');
    }
    public function store(Request $request){
         $this->validate($request, [
             'body' => 'required',
             'recipient_id' => 'required|exists:users,id'
         ]);

        $user = Auth::user()->id;
        $message = Message::create([
            'sender_id' => $user,
            'recipient_id' => $request->recipient_id,
            'body' => $request->body,

        ]);



            $recipient = User::find($request->recipient_id);
            $recipient ->notify(new MessageSent($message));



         return back()->with('flash','Tu mensaje ha sido enviado');


    }

    public function show($id){

        $message = Message::findOrFail($id);
        return view('mensaje.show', compact('message'));
    }

}
