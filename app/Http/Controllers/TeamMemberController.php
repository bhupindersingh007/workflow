<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Models\Project;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // list all invitations sent by logged in user with user and project information

        $invitationsQuery = Invitation::with([
            'invitedUser' => function ($query) { $query->select('id', 'first_name', 'last_name', 'email'); },
            'project' => function ($query) { $query->select('id', 'title', 'slug'); }
            ])
            ->where('assigned_by', auth()->id())
            ->orderBy('created_at');


        if($request->filled('search')) {

            $invitationsQuery->searchInvitations($request->search)->paginate(20);

        }

        $invitations = $invitationsQuery->paginate(20)->withQueryString();


        return view('team-members.index', ['invitations' => $invitations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // projects created by logged in user
        $projects = Project::select(['id', 'title', 'created_by'])->where('created_by', auth()->id())->latest()->get();
        
        return view('team-members.create', compact('projects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'invited_user_id' => 'required|exists:users,id'
        ]);

        // default invitation status is pending
        $validatedData['status'] = 'pending';

        $validatedData['assigned_by'] = auth()->id();

        Invitation::create($validatedData);

        return back()->with('success', 'Invitation Sent.');

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
    public function destroy(string $invitation_id)
    {
    
        Invitation::where('id' , $invitation_id)->delete();

        return back()->with('success', 'Invitation is Deleted.');
    }
}
