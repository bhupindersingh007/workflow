<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
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
            ->where('assigned_to', auth()->id());


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

        Task::create($validatedData);

        return back()->with('success', 'Task is Created.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $statuses = Task::statuses();
        $priorities = Task::priorities();
        $members = User::orderBy('first_name')->get();


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
            'deadline_date' => 'nullable|date',
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
