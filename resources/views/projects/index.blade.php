@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
  
  <h5 class="mb-0">Projects</h5>

  {{-- Project Search --}}
  <form class="d-flex align-items-center action="{{ route('projects.index') }}" method="GET"
    action="{{ route('projects.index') }}">

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
    <a href="{{ route('projects.index') }}" class="btn btn-primary ms-1 d-flex align-items-center py-2">
      <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
        stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </a>
    @endif

    <a class="btn btn-primary ms-1" href="{{ route('projects.create') }}">Project</a>


  </form>

</header>

<div class="text-end mb-3">
</div>

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
          <button type="button" class="btn btn-sm text-primary">
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
          </button>
          
          <a href="{{ route('projects.edit', ['project' => $project]) }}" class="btn btn-sm text-primary">
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
          </a>

          {{-- Delete Project --}}
          <form action="{{ route('projects.destroy', ['project'=> $project]) }}" method="POST" class="d-inline-block"
            onsubmit="confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm text-primary">
              <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
            </button>
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