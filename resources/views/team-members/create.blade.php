@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Invite Team Member</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('team-members.index') }}">Back</a>
</header>

<hr>



{{-- Invite New Team Member --}}

<form action="{{ route('team-members.store') }}" method="POST" onsubmit="return confirm('Are you sure?');">

    @csrf

    <div class="mb-3">
        <label for="project" class="form-label">Project Name</label>
        <select class="form-select mb-1" id="project_id" name="project_id">
            <option value="" selected disabled>Choose...</option>
            @foreach ($projects as $project)
              <option value="{{ $project->id }}">{{ $project->title }}</option>
            @endforeach
        </select>
        
        @error('project_id')
        <small class="text-danger">The project name is required.</small>
        @enderror
    </div>

    <label for="team-member" class="form-label">Team Member</label>
    <div class="input-group">
        <input type="text" class="form-control" id="team-member" placeholder="Enter name or email...">
        <span class="input-group-text bg-primary border-primary text-white">
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
          stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        </span>

    </div>

    <div class="mt-1 mb-3">
            
        @error('invited_user_id')
        <small class="text-danger">The team member is required.</small>
        @enderror
    </div>


    <div id="users-list" class="list-group mb-3 d-none"></div>


    
    <button type="submit" class="btn btn-primary">Invite</button>

</form>


@endsection


@push('scripts')

<script>

    const url = `{{ route('users.index') }}`;
   
    async function displayUsers(inputValue) {

        const response = await fetch(`${url}?search=${inputValue}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!response.ok) {
            throw new Error('Failed to fetch user data');
        }

        // users data
        let usersData = await response.json();

        const usersList = document.getElementById('users-list');

        usersList.classList.remove('d-none');
        usersList.innerHTML = '';

        if(usersData.length == 0){ 
            
            const notFound = document.createElement('p');
            notFound.textContent = `The user you're searching for is not in our records.`;
            notFound.classList.add('text-danger');
            usersList.appendChild(notFound);
        }

    
        usersData.forEach(user => {

            const label = document.createElement('label');
            label.textContent = `${user.first_name} ${user.last_name} (${user.email})`;
            label.classList.add('ms-2');
            label.htmlFor = user.email;
            
            
            const radioBtn = document.createElement('input');
            radioBtn.type = 'radio';
            radioBtn.name = 'invited_user_id';
            radioBtn.value = user.id;
            radioBtn.id = user.id;
            radioBtn.classList.add('form-check-input')

            const div = document.createElement('div');
            div.classList.add('list-group-item')
            div.appendChild(radioBtn);
            div.appendChild(label);
            usersList.appendChild(div);
        });
    }

    document.getElementById('team-member').addEventListener('input', function () {
        const inputValue = this.value.trim();
        if (inputValue.length) {
            displayUsers(inputValue);
        } else {
            const usersList = document.getElementById('users-list');
            usersList.classList.remove('d-none');
            usersList.innerHTML = '';
        }
    });
</script>


@endpush