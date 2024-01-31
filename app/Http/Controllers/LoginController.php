<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return auth()->check() 
            ? redirect()->route('home') 
            : view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    
}
