{{-- Project Task Filters Modal --}}

<div class="modal fade" id="filters-modal" tabindex="-1" aria-labelledby="filters-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filters-modal-label">Filter By Status / Priority</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('projects.tasks', ['project' => $project]) }}">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <select class="form-select" id="status" name="status">
                                <option value="" selected disabled>Status...</option>
                                <option value="todo">To Do</option>
                                <option value="inProgress">In Progress</option>
                                <option value="done">Done</option>
                                <option value="needDiscussion">Need Discussion</option>
                            </select>
                        </div>

                        <div class="col-md-5 mb-3">
                            <select class="form-select" id="priority" name="priority">
                                <option value="" selected disabled>Priority...</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">
                                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                 </svg>
                            </button>
                        </div>

                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</div>

