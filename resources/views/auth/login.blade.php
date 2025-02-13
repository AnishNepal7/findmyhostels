@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="card shadow-lg p-4" style="border-radius: 20px;">
        <h3 class="text-center mb-4">Welcome Back 👋</h3>

        <form method="POST" action="{{ url('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <a href="{{ url('password/reset') }}" class="text-decoration-none">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <p>Don't have an account? <a href="{{ url('register') }}" class="text-primary">Register Now</a></p>
        </div>
    </div>
@endsection
