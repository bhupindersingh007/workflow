<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $projects = $request->filled('search')
            ? Project::search($request->search)->paginate(20)->withQueryString()
            : Project::paginate(20);

        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100|unique:projects,title',
            'description' => 'nullable|max:65000',
        ]);

        $validatedData['slug'] = Str::slug($request->title); 
        $validatedData['owner_id'] = auth()->id(); 

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project is Created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100|'. Rule::unique('projects')->ignore($project),
            'description' => 'nullable|max:65000',
        ]);

        $project->update($validatedData);

        return back()->with('success', 'Project is Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        
        $project->delete();

        return back()->with('success', 'Project is Deleted.');
    }
}
