@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Profile</h1>
    <p>Here is your profile information:</p>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</p>
            <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>
</div>
@endsection