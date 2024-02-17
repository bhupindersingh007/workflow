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

</form>
  

@if ($projects)
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
                <td>1</td>
                <td>3</td>
                <td>2</td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary">View</button>
                  <a href="{{ route('projects.edit', ['project' => $project]) }}" class="btn btn-sm btn-success">Edit</a>
                  <button type="button" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>

    {{ $projects->links() }}
  

@else
    <p>No Projects</p>
@endif




<form action="{{ route('projects.store') }}" method="POST">
{{-- Create Modal --}}
<div class="modal fade" id="create-project-modal" tabindex="-1" aria-labelledby="create-project-modal-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create-project-modal-label">New Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">&times; Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

</form>


  {{-- Edit Modal --}}
<div class="modal fade" id="edit-project-modal" tabindex="-1" aria-labelledby="edit-project-modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-project-modal-label">Edit Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form>
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Description"></textarea>
              </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">&times; Close</button>
        <button type="button" class="btn btn-primary">Edit</button>
      </div>
    </div>
  </div>
</div>




@endsection
