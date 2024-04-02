@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-3 mb-md-4 pb-5" style="min-height: 70vh;">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="text-center fw-bold mb-3" style="letter-spacing: 0.08rem">  
                <span class="text-primary">WORK</span>FLOW
            </h2>

            <h4>Login</h4>
            <hr>

            <form action="{{ route('login.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="{{ old('password') }}">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mb-2">Login</button>
            </form>

            <p class="mt-3 text-muted">Don't have an account? <a href="{{ route('register.create') }}">Register</a></p>

        </div>
    </div>
</div>



@endsection
