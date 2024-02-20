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

        if($request->filled('search')) {

            $tasks = Task::search($request->search)->paginate(20)->withQueryString();
        } elseif($request->filled('status') || $request->filled('priority')) {

            $tasks = Task::filter($request->status, $request->priority)->paginate(20)->withQueryString();

        } else {

            $tasks = Task::where('project_id', $project->id)->paginate(20);

        }

        return view('projects.tasks', compact('project', 'statuses', 'priorities', 'members', 'tasks'));

    }
}
