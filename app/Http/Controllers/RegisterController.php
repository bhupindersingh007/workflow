<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return auth()->check() 
            ? redirect()->route('home') 
            : view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|unique:users,email|max:50|',
            'password' => 'required|min:5|max:25|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        auth()->login($user);
        
        $request->session()->regenerate();
        return redirect()->intended();

    }

    
}
