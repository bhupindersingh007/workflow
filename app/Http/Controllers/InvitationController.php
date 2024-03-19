<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;

class InvitationController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // invitations of logged in user
        $invitations = Invitation::with([
            'invitedBy' => function ($query) { $query->select('id', 'first_name', 'last_name', 'email'); },
            'project' => function ($query) { $query->select('id', 'title', 'slug'); }
            ])
           ->where('invited_user_id', auth()->id())
            ->orderBy('created_at')
            ->get();


        return view('invitations.index', compact('invitations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        //

    }

    
}
