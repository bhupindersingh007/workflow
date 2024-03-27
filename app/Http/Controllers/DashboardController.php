<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Invitation;
use App\Models\Task;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
      
       $projectsCount = Project::where('created_by', auth()->id())->count();

       $teamMembersCount = Invitation::where('status', 'accepted')->where('invited_by', auth()->id())->count();

       $tasksStatusCount = Task::where('assigned_by', auth()->id())
       ->selectRaw("count(case when status = 'done' then 1 end) as done")
       ->selectRaw("count(case when status = 'todo' then 1 end) as todo")
       ->selectRaw("count(case when status = 'need discussion' then 1 end) as need_discussion")
       ->selectRaw("count(case when status = 'in progress' then 1 end) as in_progress")
       ->first();

      $latestTasksAssigned = Task::with([
        'project' => function ($query) { $query->select('id', 'title', 'slug'); }])
        ->where('assigned_to', auth()->id())
        ->latest()
        ->limit(4)
        ->get();


        return view('dashboard.show', compact('projectsCount', 'teamMembersCount', 'tasksStatusCount', 'latestTasksAssigned'));
    }
}
