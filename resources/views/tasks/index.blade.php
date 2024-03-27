@extends('layouts.dashboard')
@section('content')


<header class="d-flex justify-content-between align-items-center mb-4">
  
    <h5 class="mb-0">Tasks</h5>
  
    {{-- Tasks Search --}}
    <form class="d-flex align-items-center" method="GET" action="{{ route('tasks.index') }}">


      <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}"
      style="width: 20rem;">
  
      <button class="btn btn-primary ms-1 d-flex align-items-center py-2">
        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
          stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
      </button>
  
      @if (request('search'))
      <a href="{{ route('tasks.index') }}" class="btn btn-primary ms-1 d-flex align-items-center py-2">
        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
          stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </a>
      @endif
  

    </form>

  
  </header>


{{--Assigned Tasks --}}
  
@if ($assignedTasks->count() > 0)
<div class="table-responsive">
  <table class="table table-striped border">
    <thead class="small">
    <tr>
      <th>Title</th>
      <th>Status</th>
      <th>Deadline Date</th>
      <th>Priority</th>
      <th>Project</th>
      <th>Assigned By</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($assignedTasks as $task)
      <tr>
        
        <td>{{ Str::limit($task->title, 20) }}</td>
        
        <td>
          @isset($task->status)
            <span class="text-{{ App\Models\Task::colors($task->status) }}">&#9679;</span> {{ ucwords($task->status) }}  
          @endisset
        </td>
        
        <td>{{ $task->deadline_date ? $task->deadline_date->format('d M, Y') : '' }}</td>
        
        <td>
          @isset($task->priority)
          <span class="text-{{ App\Models\Task::colors($task->priority) }}">&#9679;</span> {{ ucwords($task->priority) }}
          @endisset
        </td>
        
        <td><a href="{{ route('projects.show', ['project' => $task->project]) }}" class="text-body">{{ $task->project->title }}</a></td>

        <td>{{ $task->assignedBy->fullName }}</td>
        <td>

  
          {{-- mark task as done --}}

          <form action="#" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="accepted">
              <button type="submit" class="btn btn-sm" title="Done">
                  <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                      fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="9 11 12 14 22 4"></polyline>
                      <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                  </svg>
              </button>
          </form>
          
          <a class="btn btn-sm" href="{{ route('tasks.show', ['task' => $task]) }}">
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
          </a>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{ $assignedTasks->links() }}

@else
<div class="alert alert-primary">No Tasks.</div>
@endif

  


@endsection