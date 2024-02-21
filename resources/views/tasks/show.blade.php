{{-- Task Details Modal --}}

<div class="modal fade" id="task-show-modal-{{ $task->id }}" tabindex="-1" aria-labelledby="task-show-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="task-show-modal-label">Task Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th>Title</th>
                        <td>{{ $task->title }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="text-{{ App\Models\Task::colors($task->status) }}">&#9679;</span>
                            {{ ucwords($task->status) }}
                        </td>

                    </tr>
                    <tr>
                        <th>Project</th>
                        <td>{{ $task->project->title }}</td>

                    </tr>
                    <tr>
                        <th>Assigned To</th>
                        <td>{{ $task->assignedTo->fullName }}</td>
                    </tr>

                    <tr>
                        <th>Assigned By</th>
                        <td>{{ $task->assignedBy->fullName }}</td>
                    </tr>

                    <tr>
                        <th>Deadline Date</th>
                        <td>{{ $task->deadline_date->format('d m, Y') }}</td>

                    </tr>
                    <tr>
                        <th>Priority</th>
                        <td>
                            <span class="text-{{ App\Models\Task::colors($task->priority) }}">&#9679;</span>
                            {{ ucwords($task->priority) }}
                        </td>
                    </tr>
                </tbody>
                </table>

                <table class="table table-striped border">
                    <tbody>
                        <tr>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>{!! $task->description !!}</td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </div>
    </div>
</div>