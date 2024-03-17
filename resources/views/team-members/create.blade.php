@extends('layouts.dashboard')
@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Invite Team Member</h5>
    <a class="btn btn-sm btn-primary" href="{{ route('team-members.index') }}">Back</a>
</header>

<hr>



{{-- Invite New Team Member --}}

<form action="{{ route('team-members.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="project" class="form-label">Project Name</label>
        <select class="form-select" id="project">
            <option selected>Choose...</option>
            <option value="project1">Project 1</option>
            <option value="project2">Project 2</option>
            <option value="project3">Project 3</option>
        </select>
    </div>

    <label for="teamMemberName" class="form-label">Team Member</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="teamMemberName" placeholder="Enter name or email...">
        <span class="input-group-text bg-primary border-primary text-white">
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"
          stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        </span>

    </div>

    <div id="users-list" class="list-group mb-3 d-none"></div>


    
    <button type="submit" class="btn btn-primary">Invite</button>

</form>


@endsection


@push('scripts')

<script>
    // Dummy user data
    const usersData = [
        { name: 'John Doe', email: 'john.doe@example.com' },
        { name: 'Jane Smith', email: 'jane.smith@example.com' },
        { name: 'Michael Johnson', email: 'michael.johnson@example.com' },
        { name: 'Sarah Williams', email: 'sarah.williams@example.com' },
        { name: 'David Brown', email: 'david.brown@example.com' }
    ];

    function displayUsers(inputValue) {
        const usersList = document.getElementById('users-list');

        usersList.classList.remove('d-none');
        usersList.innerHTML = '';

        const filteredUsers = usersData.filter(user =>
            user.name.toLowerCase().includes(inputValue.toLowerCase()) ||
            user.email.toLowerCase().includes(inputValue.toLowerCase())
        );

        filteredUsers.forEach(user => {

            const label = document.createElement('label');
            label.textContent = `${user.name} (${user.email})`;
            label.classList.add('ms-2');
            label.htmlFor = user.email;
            
            
            const radioBtn = document.createElement('input');
            radioBtn.type = 'radio';
            radioBtn.name = 'selectedUser';
            radioBtn.value = user.email;
            radioBtn.id = user.email;
            radioBtn.classList.add('form-check-input')

            const div = document.createElement('div');
            div.classList.add('list-group-item')
            div.appendChild(radioBtn);
            div.appendChild(label);
            usersList.appendChild(div);
        });
    }

    document.getElementById('teamMemberName').addEventListener('input', function () {
        const inputValue = this.value.trim();
        if (inputValue.length > 0) {
            displayUsers(inputValue);
        } else {
            const usersList = document.getElementById('users-list');
            usersList.classList.remove('d-none');
            usersList.innerHTML = '';
        }
    });
</script>


@endpush