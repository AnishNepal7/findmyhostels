@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, User!</h1>
    <p>This is your user dashboard. Here, you can search for hostels and manage your account.</p>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Search Hostels</h5>
                    <p class="card-text">Find hostels based on your preferences.</p>
                    <a href="{{ route('hostels.search') }}" class="btn btn-primary">Search Hostels</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Your Profile</h5>
                    <p class="card-text">Update your profile information and preferences.</p>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary">View Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection