@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Update Task</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('projects.tasks', ['project' => $task->project]) }}">Back</a>
</header>

<hr>

<form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $task->title }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"
            placeholder="Description">{{ $task->description }}</textarea>
    </div>

    <div class="row">

        <div class="col-md-6 mb-3">
            <label for="assignedTo" class="form-label">Assigned To</label>
            <select class="form-select" id="assigned_to" name="assigned_to">
                <option value="" disabled selected>Choose...</option>
                @foreach ($members as $member)
                  <option value="{{ $member->id }}" {{ $member->id == $task->assigned_to ? 'selected' : '' }}>
                    {{ $member->fullName }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="" selected>Choose...</option>
                @foreach ($statuses as $status)
                <option value="{{ $status }}" {{ $status == $task->status ? 'selected' : '' }}>
                    {{ ucwords($status) }}
                </option>
                @endforeach
            </select>
        </div>


    </div>

    <div class="row">

        <div class="col-md-6 mb-3">
            <label for="deadline_date" class="form-label">Deadline Date</label>
            <input type="date" class="form-control" id="deadline_date" name="deadline_date" value="{{ $task->deadline_date ? $task->deadline_date->format('Y-m-d') : old('deadline_date') }}">
            @error('deadline_date')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-select" id="priority" name="priority">
                <option value="" selected>Choose...</option>
                @foreach ($priorities as $priority)
                <option value="{{ $priority }}" {{ $priority == $task->priority ? 'selected' : '' }}>
                    {{ ucwords($priority) }}
                </option>
                @endforeach
            </select>
        </div>



    </div>




    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection


@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        promotion: false,
        selector: '[name=description]',
        height: 180,
        branding: false,
        statusbar: false,
        menubar : false,
        plugins: 'lists link image paste table fullscreen',
        toolbar: `undo redo | bold italic underline | formatselect 
                  | alignleft aligncenter alignright alignjustify 
                  | bullist numlist outdent indent 
                  | table |link image | fullscreen`,
    });

</script>

@endpush