{{--New Task Form --}}

<div class="modal fade" id="task-modal" tabindex="-1" aria-labelledby="task-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="task-modal-label">New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <input type="hidden" value="{{ $project->id }}" name="project_id">

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Description"></textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="assignedTo" class="form-label">Assigned To</label>
                            <select class="form-select" id="assigned_to" name="assigned_to" required>
                                <option value="" selected disabled>Choose...</option>
                                @foreach ($members as $member)
                                  <option value="{{ $member->id }}">{{ $member->fullName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="" selected disabled>Choose...</option>
                                @foreach ($statuses as $status)
                                <option value="{{ $status }}">{{ ucwords($status) }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="deadline_date" class="form-label">Deadline Date</label>
                            <input type="date" class="form-control" id="deadline_date" name="deadline_date" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" id="priority" name="priority">
                                <option value="" selected disabled>Choose...</option>
                                @foreach ($priorities as $priority)
                                <option value="{{ $priority }}">{{ ucwords($priority) }}</option>
                                @endforeach
                            </select>
                        </div>



                    </div>




                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


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