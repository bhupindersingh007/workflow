@extends('layouts.dashboard')
@section('content')

<h5>Update Account</h5>
<hr>

<form action="{{ route('update.account.store') }}" method="POST" onsubmit="return confirm('Are you sure?');">

    @csrf

    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name"
            value="{{ old('first_name', auth()->user()->first_name) }}">
        @error('first_name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name"
            value="{{ old('last_name', auth()->user()->last_name) }}">
        @error('last_name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email"
            value="{{ old('email', auth()->user()->email) }}">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mb-2">Update</button>

</form>

@endsection