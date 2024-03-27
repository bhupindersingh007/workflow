@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">{{ Str::limit($task->title, 25)}}</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('projects.tasks', ['project' => $task->project]) }}">Back</a>
</header>


<table class="table table-striped border">
    <tbody>
        <tr>
            <th class="ps-3">Title</th>
            <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <th class="ps-3">Status</th>
            <td>

                @isset ($task->status)

                <span class="text-{{ App\Models\Task::colors($task->status) }}">&#9679;</span> {{
                ucwords($task->status) }}

                @endisset

            </td>

        </tr>
        <tr>
            <th class="ps-3">Project</th>
            <td>{{ $task->project->title }}</td>

        </tr>
        <tr>
            <th class="ps-3">Assigned To</th>
            <td>{{ $task->assignedTo->fullName ?? '' }}</td>
        </tr>

        <tr>
            <th class="ps-3">Assigned By</th>
            <td>{{ $task->assignedBy->fullName ?? '' }}</td>
        </tr>

        <tr>
            <th class="ps-3">Deadline Date</th>
            <td>{{ $task->deadline_date ? $task->deadline_date->format('d M, Y') : '' }}</td>

        </tr>
        <tr>
            <th class="ps-3">Priority</th>
            <td>
                @isset ($task->priority)

                <span class="text-{{ App\Models\Task::colors($task->priority) }}">&#9679;</span> {{
                ucwords($task->priority) }}

                @endisset
            </td>
        </tr>
    </tbody>
</table>

<table class="table table-striped border mb-4">
    <tbody>
        <tr>
            <th class="ps-3">Description</th>
        </tr>
        <tr>
            <td class="px-3">{!! $task->description ?? 'NOT GIVEN' !!}</td>
        </tr>

    </tbody>
</table>


{{-- mark task as done --}}

<div class="alert alert-primary d-flex align-items-center justify-content-between py-2 mb-4">
  <span class="d-flex align-items-center">
    
        <svg class="me-1" viewBox="0 0 24 24" width="22" height="22" stroke="currentColor" stroke-width="2"
            fill="none" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 11 12 14 22 4"></polyline>
            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
        </svg>

        <span>Would you like to mark the task as done now?</span>
   
   </span>
  
  <form action="{{ route('task.complete.store', ['task' => $task]) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
    @csrf
    <input type="hidden" value="done" name="status">
    
    <button type="submit" class="btn btn-primary">Done</button>

</form>
</div>




<h5 class="mb-3">Task Comments</h5>

<form action="{{ route('tasks.comments.store', ['task' => $task]) }}" method="POST" class="mb-3">

    @csrf

    <div>
        <textarea class="form-control mb-2" name="comment" rows="3" placeholder="Comment..."></textarea>
        @error('comment')
        <small class="text-danger mb-2 d-block">{{ $message }}</small>
        @enderror

    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>


@if($comments->count() > 0)
<section id="comments">
    @foreach ($comments as $comment)
    <div class="card mb-4">
        <header class="card-header bg-light py-3 d-flex align-items-center justify-content-between">
            <span>
                <svg class="me-1" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>{{ $comment->user->fullName }}</span>
            </span>
            <div>

                
                @can('update', $comment)
                <a href="{{ route('tasks.comments.edit', ['task' => $task, 'comment' => $comment]) }}"
                    class="btn btn-sm pe-0">
                    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                </a>
                @endcan

                
                @can('delete', $comment)
                <form class="d-inline-block"
                    action="{{ route('tasks.comments.destroy', ['task' => $task, 'comment' => $comment]) }}"
                    method="POST" onsubmit="return confirm('Are You Sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm text-danger">
                      <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </button>
                </form>
                @endcan
                
            </div>
        </header>
        <div class="card-body d-flex justify-content-between">
            <div>
                <svg class="me-1 text-success" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                {{ $comment->comment }}
            </div>
            
            <small class="text-muted">{{ $comment->created_at->format('d M, Y - h:i:s A')}}</small>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-end mb-4">{{ $comments->links() }}</div>
</section>
@else
<div class="alert alert-primary">
    No Comments
</div>
@endif


@endsection