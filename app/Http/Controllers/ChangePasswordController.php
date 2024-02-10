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
     
       //

    }

    
}
