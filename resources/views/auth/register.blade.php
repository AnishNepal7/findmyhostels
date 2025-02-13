@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="card shadow-lg p-4" style="border-radius: 20px;">
        <h3 class="text-center mb-4">Create Your Account 🚀</h3>

        <form method="POST" action="{{ url('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>

        <div class="text-center mt-3">
            <p>Already have an account? <a href="{{ url('login') }}" class="text-primary">Login Here</a></p>
        </div>
    </div>
@endsection
