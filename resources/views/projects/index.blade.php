@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Projects</h5>
    
    <div>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-project-modal">
        <span class="fw-bold">&plus;</span> Project
    </button>
    </div>
</header>


<div class="col-md-6 col-lg-12 mb-3 ms-auto">
  <form class="d-flex align-items-center" method="GET" action="{{ route('projects.index') }}">
    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
      <button class="btn btn-primary ms-1 d-flex align-items-center py-2">
        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </button>
  </form>
  
</div>

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
          @foreach (range(1, 5) as $item)
            <tr>
                <td>Task {{ $item }}</td>
                <td>5</td>
                <td>3</td>
                <td>2</td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary">View</button>
                  <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit-project-modal">Edit</button>
                  <button type="button" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</div>

<nav class="d-flex justify-content-end">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>


<form action="{{ route('projects.store') }}" method="POST">
{{-- Modal --}}
<div class="modal fade" id="create-project-modal" tabindex="-1" aria-labelledby="create-project-modal-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create-project-modal-label">New Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
                @csrf

                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                  @error('title')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Description" name="description"></textarea>
                  @error('description')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
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
