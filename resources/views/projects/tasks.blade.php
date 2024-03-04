@extends('layouts.dashboard')
@section('content')


<header class="d-flex justify-content-between align-items-center mb-4">
  
    <h5 class="mb-0">
      <a href="{{ route('projects.show', ['project' => $project]) }}" class="text-body">{{ Str::limit($project->title, 25) }}</a>
    </h5>
  
    {{-- Tasks Search --}}
    <form class="d-flex align-items-center" action="{{ route('projects.tasks', ['project' => $project]) }}" method="GET">

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
      <a href="{{ route('projects.tasks', ['project' => $project]) }}" class="btn btn-primary ms-1 d-flex align-items-center py-2">
        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
          stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </a>
      @endif
  
      {{-- New Project Task Modal --}}
      <a href="#" class="btn btn-primary ms-1" data-bs-toggle="modal" data-bs-target="#task-create-modal">
        &plus; Task
      </a>

    </form>

    
    {{-- New Project Task Modal --}}
    @include('tasks.create')


  
  </header>


{{--Project Tasks --}}
  
@if ($tasks->count() > 0)
<div class="table-responsive">
  <table class="table table-striped border">
    <thead>
    <tr>
      <th>Title</th>
      <th>Status</th>
      <th>Assigned To</th>
      <th>Deadline Date</th>
      <th>Priority</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
      <tr>
        <td>{{ Str::limit($task->title, 20) }}</td>
        
        <td>
          @isset ($task->status)
            <span class="text-{{ App\Models\Task::colors($task->status) }}">&#9679;</span> {{ ucwords($task->status) }}
          @endisset
        </td>
        
        <td>{{ $task->assignedTo->fullName ?? '' }}</td>
        
        <td>{{ $task->deadline_date ? $task->deadline_date->format('d M, Y') : '' }}</td>
        
        <td>
           @isset ($task->priority)
            <span class="text-{{ App\Models\Task::colors($task->priority) }}">&#9679;</span> {{ ucwords($task->priority) }}</td>
          @endisset
        <td>
          
          <a href="{{ route('tasks.show', ['task' => $task]) }}" class="btn btn-sm">
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
          </a>

        
          <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-sm">
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
          </a>

          <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" class="d-inline-block"
            onsubmit="confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm text-danger">
              <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
            </button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- Pagination --}}
{{ $tasks->links() }}


@else
<div class="alert alert-primary">No Tasks.</div>
@endif

  


@endsection