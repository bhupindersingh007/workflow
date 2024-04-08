@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
  <h5>Inbox - Notifications</h5>
  
  @if ($notifications->count() > 0)
   <button class="btn btn-primary" id="mark-all">Mark all as Read</button>
   @else
   <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Back</a>
  @endif

</header>



@if ($notifications->count() > 0)
    
    @foreach ($notifications as $notification)
        <div class="card mb-4">
        <header class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            
            <span>
                <svg viewBox="0 0 24 24" class="text-danger" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>

                @if ($notification->type == App\Notifications\NewTask::class)
                    <span class="badge bg-primary">Task</span>
                @elseif ($notification->type == App\Notifications\NewTaskComment::class)
                    <span class="badge bg-primary">Comment</span>
                @endif
                
                 &bull;
                
                 {{ $notification->created_at->format('d M, Y - h:i:s A') }}

            </span>

            <button class="btn btn-sm text-primary mark-as-read d-none d-md-inline-block"
                data-id="{{ $notification->id }}">
                Mark as Read
            </button>
        </header>
        
        <div class="card-body">

            @if ($notification->type == App\Notifications\NewTask::class)

                <span>{{ $notification->data['assignor_name'] }}</span> 
                &bull; 
                assigned a new <strong>task</strong>:
                <a href="{{ route('tasks.show', ['task' => $notification->data['task_id'] ]) }}" class="text-body">{{ $notification->data['task_title'] }}</a>
                from the <strong>project</strong>:
                <a href="{{ route('projects.show', ['project' => $notification->data['project_id'] ]) }}" class="text-body">{{ $notification->data['project_title']}}</a>
            
            @elseif ($notification->type == App\Notifications\NewTaskComment::class)
        
                <span>{{ $notification->data['comment_by'] }}</span> 
                &bull; 
                commented on <strong>task</strong>:
                <a href="{{ route('tasks.show', ['task' => $notification->data['task_id'] ]) }}" class="text-body">{{ $notification->data['task_title'] }}</a>
                from the <strong>project</strong>:
                <a href="{{ route('projects.show', ['project' => $notification->data['project_id'] ]) }}" class="text-body">{{ $notification->data['project_title']}}</a>
            
            @endif
            
        </div>
    </div>
    @endforeach

@else
    <div class="alert bg-white shadow-sm py-3">
        <i class="feather icon-bell bg-primary p-1 rounded me-1 text-white"></i>
        No new notifications
    </div>
@endif


@endsection