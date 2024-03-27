@extends('layouts.dashboard')
@section('content')

<div class="row">
    <div class="col-md-6 col-lg-4">

        <article class="d-flex border p-3 rounded mb-3">

            <a href="{{ route('projects.index') }}" class="d-inline-block text-muted position-relative">

                <span
                    class="position-absolute start-100 translate-middle badge rounded-pill bg-primary text-white fw-semibold"
                    style="top: 4px;">
                    {{ $projectsCount }}
                </span>


                <svg class="text-body" viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>


            </a>

            <p class="ms-3 mb-0">Projects</p>
        </article>

    </div>

    <div class="col-md-6 col-lg-4">

        <article class="d-flex border p-3 rounded mb-3">

            <a href="#" class="d-inline-block text-muted position-relative">

                <span
                    class="position-absolute start-100 translate-middle badge rounded-pill bg-primary text-white fw-semibold"
                    style="top: 4px;">
                    {{ 0 }}
                </span>



                <svg class="text-body" viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>



            </a>

            <p class="ms-3 mb-0">Inbox</p>
        </article>

    </div>



    <div class="col-md-6 col-lg-4">

        <article class="d-flex border p-3 rounded mb-3">

            <a href="#" class="d-inline-block text-muted position-relative">

                <span
                    class="position-absolute start-100 translate-middle badge rounded-pill bg-primary text-white fw-semibold"
                    style="top: 4px;">
                    {{ $teamMembersCount }}
                </span>




                <svg class="text-body" viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>


            </a>

            <p class="ms-3 mb-0">Team Members</p>
        </article>

    </div>


</div>


<div class="row">

    <div class="col-md-6 col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white fw-bold d-flex align-items-center">
                <svg class="me-1" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                All Tasks
            </div>
            <div class="card-body px-0">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="ps-3">Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="ps-3"><span class="text-success">&#9679;</span> Done</td>
                            <td>{{ $tasksStatusCount->done }}</td>
                        <tr>
                        <tr>
                            <td class="ps-3"><span class="text-danger">&#9679;</span> Todo</td>
                            <td>{{ $tasksStatusCount->todo }}</td>
                        <tr>
                            <td class="ps-3"><span class="text-warning">&#9679;</span> In Progress</td>
                            <td>{{ $tasksStatusCount->in_progress }}</td>
                        </tr>
                        <tr>
                            <td class="ps-3"><span class="text-primary">&#9679;</span> Need Discussion</td>
                            <td>{{ $tasksStatusCount->need_discussion }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <div class="col-md-6 col-lg-8">
        <div class="card">
            <div class="card-header bg-white d-flex align-items-center justify-content-between">
                <span class="d-flex align-items-center">
                    <svg class="me-1" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="fw-bold">Latest Tasks - Assigned</span>
                </span>

                <a href="{{ route('tasks.index') }}" class="text-muted">View More</a>
            </div>
            <div class="card-body px-0">
                @if ($latestTasksAssigned->count() > 0)
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="ps-3">Title</th>
                            <th>Deadline Date</th>
                            <th>Project</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestTasksAssigned as $task)
                        <tr>
                            <td class="ps-3">
                                <span class="text-{{ App\Models\Task::colors($task->status) }}">&#9679;</span>
                                <a href="{{ route('tasks.show', ['task' => $task]) }}" class="text-body text-decoration-none">{{ Str::limit($task->title, 20) }}</a>
                            </td>
                            <td>{{ $task->deadline_date ? $task->deadline_date->format('d M, Y') : '' }}</td>
                            <td>
                                <a href="{{ route('projects.show', ['project' => $task->project]) }}"
                                    class="text-body">{{ Str::limit($task->project->title, 20) }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else

                @endif
            </div>
        </div>

    </div>




</div>

@endsection