@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Welcome, Admin!</h1>
    <p>This is your admin dashboard. Here, you can manage hostels, users, and pending approvals.</p>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pending Hostels</h5>
                    <p class="card-text">You have <strong>{{ $pendingHostelsCount }}</strong> hostels pending approval.</p>
                    <a href="{{ route('admin.pendinghostels') }}" class="btn btn-primary">View Pending Hostels</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registered Users</h5>
                    <p class="card-text">There are <strong>{{ $usersCount }}</strong> registered users.</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection