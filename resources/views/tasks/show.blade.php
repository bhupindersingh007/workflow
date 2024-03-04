@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Task - {{ Str::limit($task->title, 25) }}</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('projects.tasks', ['project' => $task->project]) }}">Back</a>
</header>

<table class="table table-striped border">
    <tbody>
        <tr>
            <th class="ps-3">Title</th>
            <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <th class="ps-3">Status</th>
            <td>
                
                @isset ($task->status)
                    
                <span class="text-{{ App\Models\Task::colors($task->status) }}">&#9679;</span> {{ ucwords($task->status) }}
                
                @endisset

            </td>

        </tr>
        <tr>
            <th class="ps-3">Project</th>
            <td>{{ $task->project->title }}</td>

        </tr>
        <tr>
            <th class="ps-3">Assigned To</th>
            <td>{{ $task->assignedTo->fullName ?? '' }}</td>
        </tr>

        <tr>
            <th class="ps-3">Assigned By</th>
            <td>{{ $task->assignedBy->fullName ?? '' }}</td>
        </tr>

        <tr>
            <th class="ps-3">Deadline Date</th>
            <td>{{ $task->deadline_date ? $task->deadline_date->format('d M, Y') : '' }}</td>

        </tr>
        <tr>
            <th class="ps-3">Priority</th>
            <td>
                @isset ($task->status)

                    <span class="text-{{ App\Models\Task::colors($task->priority) }}">&#9679;</span> {{ ucwords($task->priority) }}

                @endisset
            </td>
        </tr>
    </tbody>
    </table>

    <table class="table table-striped border">
        <tbody>
            <tr>
                <th class="ps-3">Description</th>
            </tr>
            <tr>
                <td class="p-3">{!! $task->description ?? 'NOT GIVEN' !!}</td>
            </tr>
        </tbody>
    </table>





@endsection
