<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\TaskComment;
use Illuminate\Http\Request;
use App\Notifications\NewTaskComment;

class TaskCommentController extends Controller
{
    

    public function __construct()
    {
        $this->authorizeResource(TaskComment::class, 'comment');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {     
      $request->validate(['comment' => 'required|max:200']);

        $comment = $task->comments()->create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'created_at' => now()
        ]);

        // send notification to task assignee or assignor 

        if($task->assigned_by == auth()->id()){

            $assignee = User::findOrFail($task->assigned_to);
            $assignee->notify(new NewTaskComment($task));

        }else if($task->assigned_to == auth()->id()){

            $assignor = User::findOrFail($task->assigned_by);
            $assignor->notify(new NewTaskComment($task));
        }
        
        return back()->with('success', 'Task Comment Created');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task, TaskComment $comment)
    {
        return view('comments.edit', compact('task', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task, TaskComment $comment)
    {
        $request->validate(['comment' => 'required|max:200']);
        $comment->update(['comment' => $request->comment]);
   
        return  back()->with('success', 'Task Comment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, TaskComment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Task Comment Deleted');
    }
}
