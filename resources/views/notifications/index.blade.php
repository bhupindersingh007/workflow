@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
  <h5>Inbox - Notifications</h5>
  
  @if (true)
   <button class="btn btn-primary" id="mark-all">Mark all as Read</button>
   @else
   <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Back</a>
  @endif
</header>

@if (true)
    
    @foreach (range(0, 10) as $id)
        <div class="card mb-4">
        <header class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <span>
                <svg viewBox="0 0 24 24" class="text-danger" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>

                &bull;
                {{ now()->format('d M, Y - h:i:s A') }}
            </span>
            <button class="btn btn-sm text-primary mark-as-read d-none d-md-inline-block"
                data-id="{{ $id }}">
                Mark as Read
            </button>
        </header>
        
        <div class="card-body">
                
            <span class="text-primary">Person Name</span> assigned,  
            
            <a href="#">
                {{-- notification info --}}
            </a>


        </div>
    </div>
    @endforeach

@else
    <div class="alert bg-white shadow-sm py-3">
        <svg viewBox="0 0 24 24" class="text-danger" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>

        No new notifications
    </div>
@endif


@endsection
