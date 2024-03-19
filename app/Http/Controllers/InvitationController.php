<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvitationController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('invitations.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        //

    }

    
}
