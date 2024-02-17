@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">New Project</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('projects.index') }}">Back</a>
</header>



{{-- Create Project --}}

<form action="{{ route('projects.store') }}" method="POST">

    @csrf
    @include('projects.form', ['mode' => 'create'])

</form>


@endsection