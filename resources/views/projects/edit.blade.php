@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Edit Project</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('projects.index') }}">Back</a>
</header>

<hr>



{{-- Edit Project --}}

<form action="{{ route('projects.update', ['project' => $project]) }}" method="POST">

    @csrf
    @method('PUT')
    @include('projects.form', ['mode' => 'edit', 'project' => $project])

</form>


@endsection