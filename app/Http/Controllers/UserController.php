<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Auth;

class UserController extends Controller


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

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate();



        return view('user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|max:50|string|max:255',
            'email'=>'required|email',
            'tipo'=>'required|max:1',
            'password'=>'required|min:8'
        ]);
        $user ->name = $request->name;
        $user ->email = $request->email;
        $user ->tipo =$request->tipo;
        $user ->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('user.show',$user);

    }

    public function show(User $user)
    {

        return view('user.show', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
