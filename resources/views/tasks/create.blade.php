{{--New Task Form Modal --}}
<div class="modal fade" id="task-create-modal" tabindex="-1" aria-labelledby="task-create-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="task-create-modal-label">New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="POST" id="task-form">
                    @csrf
                    <input type="hidden" value="{{ $project->id }}" name="project_id">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                        <div class="invalid-feedback" id="title-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Description"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="assigned_to" class="form-label">Assigned To</label>
                            <select class="form-select" id="assigned_to" name="assigned_to">
                                <option value="" selected>Choose...</option>
                                @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->fullName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="" selected>Choose...</option>
                                @foreach ($statuses as $status)
                                <option value="{{ $status }}">{{ ucwords($status) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="deadline_date" class="form-label">Deadline Date</label>
                            <input type="date" class="form-control" id="deadline_date" name="deadline_date">
                            <div class="invalid-feedback" id="deadline-error"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" id="priority" name="priority">
                                <option value="" selected>Choose...</option>
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


    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('task-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if (validateForm()) {
                form.submit();
            }
        });

        function validateForm() {
            let isValid = true;

            // Validate Title
            const titleInput = document.getElementById('title');
            const titleValue = titleInput.value.trim();
            if (titleValue === '' || !isNaN(titleValue)) {
                titleInput.classList.add('is-invalid');
                document.getElementById('title-error').innerText = 'Title must not be empty or numeric.';
                isValid = false;
            } else {
                titleInput.classList.remove('is-invalid');
                document.getElementById('title-error').innerText = '';
            }

           // Validate Deadline Date
            const deadlineInput = document.getElementById('deadline_date');
            const deadlineValue = deadlineInput.value.trim();
            const today = new Date();
            const deadlineDate = new Date(deadlineValue);

            // Check if the deadline is empty or today or in the future
            if (deadlineValue == '' || deadlineDate < today.setHours(0, 0, 0, 0)) {
                deadlineInput.classList.add('is-invalid');
                document.getElementById('deadline-error').innerText = 'Deadline must be today or in the future.';
                isValid = false;
            } else {
                deadlineInput.classList.remove('is-invalid');
                document.getElementById('deadline-error').innerText = '';
            }


            return isValid;
        }
    });

</script>

@endpush