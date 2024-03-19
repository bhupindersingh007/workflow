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
  
@if ($invitations->count() > 0)
<div class="table-responsive">
  <table class="table table-striped border">
    <thead class="small">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Project</th>
      <th>Invitation Status</th>
      <th>Email Address</th>
      <th>Invitation Date</th>
    </tr>
    </thead>
    <tbody>
        
      @foreach ($invitations as $invitation)
      <tr>
        <td>{{ $invitation->invitedUser->first_name }}</td>
        <td>{{ $invitation->invitedUser->last_name }}</td>
        <td><a href="https://example.com/project-a" class="text-body">{{ Str::limit($invitation->project->title, 20) }}</a></td>
        <td>
          <span class="text-{{ App\Models\Invitation::colors($invitation->status) }}">&#9679;</span> {{ ucwords($invitation->status) }}  
         
        </td>
        <td><a href="mailto:{{ $invitation->invitedUser->email }}" class="text-body">{{ $invitation->invitedUser->email }}</a></td>
        
        <td>{{ $invitation->created_at->format('d M, Y') }}</td>
        
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
      @endforeach
        
  </table>
</div>

@else
<div class="alert alert-primary">No Team Members.</div>
@endif

  


@endsection