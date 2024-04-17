@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center mb-4">
  <h5>Inbox - Notifications</h5>
  
  @if ($notifications->count() > 0)
   <button class="btn btn-primary" id="mark-all">Mark all as Read</button>
   @else
   <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm" id="back">Back</a>
  @endif

</header>



@if ($notifications->count() > 0)
    
    @foreach ($notifications as $notification)
        <div class="card mb-4">
        <header class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            
            <span>
                <svg viewBox="0 0 24 24" class="text-danger" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>

                @if ($notification->type == App\Notifications\NewTask::class)
                    <span class="badge bg-primary">Task</span>
                @elseif ($notification->type == App\Notifications\NewTaskComment::class)
                    <span class="badge bg-primary">Comment</span>
                @endif
                
                 &bull;
                
                 {{ $notification->created_at->format('d M, Y - h:i:s A') }}

            </span>

            <button class="btn btn-sm text-primary mark-as-read d-none d-md-inline-block"
                data-id="{{ $notification->id }}">
                Mark as Read
            </button>
        </header>
        
        <div class="card-body">

            @if ($notification->type == App\Notifications\NewTask::class)

                <span>{{ $notification->data['assignor_name'] }}</span> 
                &bull; 
                assigned a new <strong>task</strong>:
                <a href="{{ route('tasks.show', ['task' => $notification->data['task_id'] ]) }}" class="text-body">{{ $notification->data['task_title'] }}</a>
                from the <strong>project</strong>:
                <a href="{{ route('projects.show', ['project' => $notification->data['project_id'] ]) }}" class="text-body">{{ $notification->data['project_title']}}</a>
            
            @elseif ($notification->type == App\Notifications\NewTaskComment::class)
        
                <span>{{ $notification->data['comment_by'] }}</span> 
                &bull; 
                commented on <strong>task</strong>:
                <a href="{{ route('tasks.show', ['task' => $notification->data['task_id'] ]) }}" class="text-body">{{ $notification->data['task_title'] }}</a>
                from the <strong>project</strong>:
                <a href="{{ route('projects.show', ['project' => $notification->data['project_id'] ]) }}" class="text-body">{{ $notification->data['project_title']}}</a>
            
            @endif
            
        </div>
    </div>
    @endforeach

@else
    <div class="alert alert-primary">
        No new notifications
    </div>
@endif



<div class="alert alert-primary d-none" id="no-notifications">
    No new notifications
</div>

@endsection


@push('scripts')
<script>
  
  function sendMarkRequest(id = null) {

    const url = `{{ route('notifications.mark') }}`;
    const csrf_token = `{{ csrf_token() }}`;

    return fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrf_token
        },
        body: JSON.stringify({ id })
    });
}

document.addEventListener('DOMContentLoaded', function() {
   
    document.querySelectorAll('.mark-as-read').forEach(function(element) {
        element.addEventListener('click', function() {
            let id = this.getAttribute('data-id');
            let request = sendMarkRequest(id);
            request.then(function(response) {
                if (response.ok) {
                    response.json().then(function(data) {
                        console.log(data.unread_notifications);
                        document.getElementById('unread-notifications-count').textContent = data.unread_notifications; 
                        document.getElementById('unread-notifications-count-bell').textContent = data.unread_notifications; 
                        element.parentElement.parentElement.style.display = 'none';
                    }).catch(function(error) {

                        console.error('Error parsing JSON:', error);
                });
            } else {
                console.error('Failed to mark notification as read');
            }
            }).catch(function(error) {
                console.error('Error occurred:', error);
            });
        });
    });

    document.getElementById('mark-all').addEventListener('click', function() {
        let request = sendMarkRequest();
        request.then(function(response) {
            if (response.ok) {
                
                document.querySelectorAll('.card').forEach(function(card) {
                    card.style.display = 'none';
                });

                
                document.getElementById('unread-notifications-count').textContent = 0; 
                document.getElementById('unread-notifications-count-bell').textContent = 0; 

                document.getElementById('no-notifications').classList.remove('d-none');

                document.getElementById('mark-all').classList.add('d-none');


            } else {
                console.error('Failed to mark all notifications as read');
            }
        }).catch(function(error) {
            console.error('Error occurred:', error);
        });
    });
});
   
</script>
@endpush