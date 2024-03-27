<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskCompletionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Task $task) 
    {

        
        if(!$request->isMethod('POST')){
            
            return abort(404);
        }


        if($request->status != 'done'){

            return redirect()->route('dashboard');
            
         }
 
        
        // mark task as done

        $task->update([
            'status' => 'done',
            'completed_at' => now() 
        ]);

        return back()->with('success', 'Task marked as done.');

    }
}
