@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="mb-0">{{ $project->title }}</h5>
  <a class="btn btn-sm btn-primary" href="{{ route('projects.index') }}">Back</a>
</header>


<table class="table table-striped border">
  <tbody>
    <tr>
      <th>Description</th>
    </tr>
    <tr>
      <td>{!! $project->description !!}</td>
    </tr>
  </tbody>
</table>

@endsection