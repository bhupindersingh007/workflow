@extends('layouts.dashboard')
@section('content')

<h5>Change Password</h5>

<hr>

<form action="{{ route('change.password.store') }}" method="POST" onsubmit="confirmSubmit(this);">

    @csrf

    <div class="mb-3">
        <label for="password" class="form-label">Current Password</label>
        <input type="password" class="form-control" id="current_password" name="current_password" value="{{ old('current_password') }}">
        @error('current_password')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="new_password" class="form-label">New Password</label>
        <input type="password" class="form-control" id="new_password" name="new_password" value="{{ old('new_password') }}">
        @error('new_password')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
        @error('password_confirmation')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mb-2">Update</button>

</form>



@endsection