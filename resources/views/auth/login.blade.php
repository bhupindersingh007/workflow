@extends('layouts.app')

@section('content')

<div class="container mt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

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

@push('scripts')
<script>
    const url = '{{ route('login.store') }}';

        document.querySelector('form').addEventListener('submit', ()=>{
            
            let password = document.querySelector('input[name=password]').value;
       
            fetch(url, {
            method : 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With' : 'XMLHttpRequest',
                'X-CSRF-Token': document.querySelector('input[name=_token]').value
            },
            body : JSON.stringify({ 
                email: document.querySelector('input[name=email]').value, 
                password: password ? sha256(password) : ''
            })
        })
        .then(response => {
            if (!response.ok) {
            throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
        })

</script>
@endpush