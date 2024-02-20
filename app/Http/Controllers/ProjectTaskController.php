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

        return view('projects.tasks', compact('project', 'statuses', 'priorities', 'members'));

    }
}
