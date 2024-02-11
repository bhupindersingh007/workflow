<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('settings.change-password');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
            
        $request->validate([
            'current_password' => 'required|min:5|max:25|current_password',
            'new_password' => 'required|min:5|max:25|confirmed',
        ]);

        auth()->user()->update([
          'password' => bcrypt($request->new_password)    
        ]);

        $request->session()->passwordConfirmed();

        return redirect()->route('change.password.create')->with('success', 'Password Updated.');


    }

    
}
