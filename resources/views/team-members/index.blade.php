@extends('layouts.dashboard')
@section('content')


<header class="d-flex justify-content-between align-items-center mb-4">
  
    <h5 class="mb-0">Team Members</h5>
  
    {{-- Team Member Search --}}
    <form class="d-flex align-items-center" method="GET" action="{{ route('team-members.index') }}">


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
      <a href="{{ route('team-members.index') }}" class="btn btn-primary ms-1 d-flex align-items-center py-2">
        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
          stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </a>
      @endif
  
      <a class="btn btn-primary ms-1" href="{{ route('team-members.create') }}">&plus; Invite</a>


    </form>

  
  </header>


{{--Team Members --}}
  
@if (true)
<div class="table-responsive">
  <table class="table table-striped border">
    <thead class="small">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Project</th>
      <th>Invitation Status</th>
      <th>Email Address</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>John</td>
            <td>Doe</td>
            <td><a href="https://example.com/project-a" class="text-body">Project A</a></td>
            <td>
              <span class="text-success">&#9679;</span> Accepted 
            </td>
            <td><a href="mailto:john.doe@example.com" class="text-body">john.doe@example.com</a></td>
            <td>
              <form action="#" method="POST" class="d-inline-block"
              onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm text-danger">
                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
              </button>
            </form>
            </td>
   

        </tr>
        <tr>
            <td>Jane</td>
            <td>Smith</td>
            <td><a href="#" class="text-body">Project B</a></td>
            <td>
              <span class="text-success">&#9679;</span> Accepted 
            </td>
            <td><a href="mailto:jane.smith@example.com" class="text-body">jane.smith@example.com</a></td>

            <td>
              <form action="#" method="POST" class="d-inline-block"
              onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm text-danger">
                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
              </button>
            </form>
            </td>

            
        </tr>
        <tr>
            <td>Michael</td>
            <td>Johnson</td>
            <td><a href="#" class="text-body">Project C</a></td>
            <td>
              <span class="text-warning">&#9679;</span> Pending 
            </td>
            <td><a href="mailto:michael.johnson@example.com" class="text-body">michael.johnson@example.com</a></td>
            
            <td>
              <form action="#" method="POST" class="d-inline-block"
              onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm text-danger">
                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
              </button>
            </form>
            </td>


        </tr>
        <tr>
            <td>Sarah</td>
            <td>Williams</td>
            <td><a href="#" class="text-body">Project D</a></td>
            <td>
              <span class="text-warning">&#9679;</span> Pending 
            </td>
            <td><a href="mailto:sarah.williams@example.com" class="text-body">sarah.williams@example.com</a></td>
            
            <td>
              <form action="#" method="POST" class="d-inline-block"
              onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm text-danger">
                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
              </button>
            </form>
            </td>

            
        </tr>
        <tr>
            <td>David</td>
            <td>Brown</td>
            <td><a href="#" class="text-body">Project E</a></td>
            <td>
              <span class="text-danger">&#9679;</span> Rejected 
            </td>
            <td><a href="mailto:david.brown@example.com" class="text-body">david.brown@example.com</a></td>
            
            <td>
              <form action="#" method="POST" class="d-inline-block"
              onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm text-danger">
                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
              </button>
            </form>
            </td>

        </tr>
  </table>
</div>

@else
<div class="alert alert-primary">No Team Members.</div>
@endif

  


@endsection