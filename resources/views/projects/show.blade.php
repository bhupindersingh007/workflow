@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">{{ $project->title }}</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('projects.index') }}">Back</a>
</header>

<div class="card">
    <div class="card-header bg-light">Description</div>
    <div class="card-body">
      <div class="card-text">{!! $project->description !!}</div>
    </div>
  </div>

{{-- Project Details --}}

@endsection