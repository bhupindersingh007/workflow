@extends('layouts.app')

@section('content')

<div class="container mt-5 pb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h4>Register</h4>

            <hr>

            <form action="{{ route('register.store') }}" method="POST">

                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ old('first_name') }}">
                        @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ old('last_name') }}">
                        @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


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

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mb-2">Register</button>
            </form>

            <p class="mt-3 text-muted">Already have an account? <a href="{{ route('login.create') }}">Login</a></p>
        </div>
    </div>
</div>



@endsection


@push('scripts')
<script>
    const url = '{{ route('register.store') }}';
    

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
             first_name: document.querySelector('input[name=first_name]').value, 
             last_name: document.querySelector('input[name=last_name]').value, 
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