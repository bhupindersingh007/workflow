<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ProjectTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Project $project)
    {

        $statuses = Task::statuses();
        $priorities = Task::priorities();
        $members = User::orderBy('first_name')->get();

        $tasksQuery = Task::with('assignedTo', 'assignedBy')->where('project_id', $project->id)->latest();

        if($request->filled('search')) {

            $tasksQuery->searchProjectTasks($request->search)->paginate(20);

        }    
            
        $tasks = $tasksQuery->paginate(20)->withQueryString();

        return view('projects.tasks', compact('project', 'statuses', 'priorities', 'members', 'tasks'));

    }
}
