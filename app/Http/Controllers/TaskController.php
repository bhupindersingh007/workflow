<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NewTask;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // assigned tasks

        $tasksQuery = Task::with([
            'assignedBy',
            'project' => function ($query) { $query->select('id', 'title', 'slug'); }
            ])
            ->where('assigned_to', auth()->id())
            ->latest();


        if($request->filled('search')) {

            $tasksQuery->searchTasks($request->search)->paginate(20);

        }

        $assignedTasks = $tasksQuery->paginate(20)->withQueryString();

        return view('tasks.index', ['assignedTasks' => $assignedTasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'description' => 'nullable|max:65000',
            'assigned_to' => 'nullable|exists:users,id',
            'deadline_date' => 'nullable|date',
            'project_id' => 'required|exists:projects,id',
            'status' => 'nullable|in:' . implode(',', Task::statuses()),
            'priority' => 'nullable|in:' . implode(',', Task::priorities())
        ]);

        // add assignor, if assignee is given

        if($request->filled('assigned_to')){
            $validatedData['assigned_by'] = auth()->id();
        }


        $task = Task::create($validatedData);


        if($request->filled('assigned_to') && $request->assigned_to != auth()->id()){

            // send task notification to assignee  
            $assignee = User::findOrFail($request->assigned_to);   
            $assignee->notify(new NewTask($task));        
        
        }


        return back()->with('success', 'Task is Created.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        
        $comments = $task->comments()->with('user')->paginate()->fragment('comments');
        return view('tasks.show', compact('task', 'comments'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $statuses = Task::statuses();
        $priorities = Task::priorities();

        $project = $task->project;
        
        // project members
        $members = User::whereHas('invitations', function ($query) use ($project) {
            $query->where('project_id', $project->id)->where('status', 'accepted');
        })
        ->orderBy('first_name')->get();
        
        // add project as team member
        $members->push(auth()->user());


        return view('tasks.edit', compact('statuses', 'priorities', 'members', 'task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'description' => 'nullable|max:65000',
            'assigned_to' => 'nullable|exists:users,id',
            'deadline_date' => 'nullable|date|after_or_equal:'.date('Y-m-d'),
            'status' => 'nullable|in:' . implode(',', Task::statuses()),
            'priority' => 'nullable|in:' . implode(',', Task::priorities())
        ]);

        if($request->filled('assigned_to')){
            $validatedData['assigned_by'] = auth()->id();
        }

        $task->update($validatedData);

        return back()->with('success', 'Task is Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {

        $task->delete();

        return back()->with('success', 'Task is Deleted.');
    }
}
