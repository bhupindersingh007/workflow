@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Projects</h5>
    <a class="btn btn-primary" href="{{ route('projects.create') }}">Project</a>
</header>


<form class="d-flex align-items-center mb-3" action="{{ route('projects.index') }}" method="GET" action="{{ route('projects.index') }}">
  
  <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
    
  <button class="btn btn-primary ms-1 d-flex align-items-center py-2">
    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
  </button>

  @if (request('search'))
    <a href="{{ route('projects.index') }}" class="btn btn-primary ms-1 d-flex align-items-center py-2">
      <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </a>
  @endif

</form>
  

@if ($projects->count() > 0)
  <div class="table-responsive">
    <table class="table table-striped border">
        <thead>
            <th>Title</th>
            <th><span class="text-danger">&#9679;</span> Tasks Pending</th>
            <th><span class="text-warning">&#9679;</span> Tasks In Progress</th>
            <th><span class="text-success">&#9679;</span> Tasks Done</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ 0 }}</td>
                <td>{{ 0 }}</td>
                <td>{{ 0 }}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary">View</button>
                  <a href="{{ route('projects.edit', ['project' => $project]) }}" class="btn btn-sm btn-success">Edit</a>
                  
                  {{-- Delete Project --}}
                  <form action="{{ route('projects.destroy', ['project'=> $project]) }}" method="POST" 
                  class="d-inline-block" onsubmit="confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>

                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>

    {{-- Pagination --}}
    {{ $projects->links() }}
  
@else
    <div class="alert alert-primary">No Projects.</div>
@endif

@endsection
