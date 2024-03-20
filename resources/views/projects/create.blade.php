@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h5 class="mb-0">New Project</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('projects.index') }}">Back</a>
</header>

<hr>


{{-- Create Project --}}

<form action="{{ route('projects.store') }}" method="POST">

    @csrf
    @include('projects.form', ['mode' => 'create'])

</form>


@endsection