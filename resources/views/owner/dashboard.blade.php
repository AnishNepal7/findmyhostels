@extends('layouts.owner')

@section('content')
<div class="container">
    <h1>Welcome, Hostel Owner!</h1>
    <p>This is your hostel owner dashboard. Here, you can manage your rooms and bookings.</p>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Your Hostels</h5>
                    <p class="card-text">You own <strong>{{ $hostelsCount }}</strong> hostels.</p>
                    <a href="{{ route('owner.hostels') }}" class="btn btn-primary">Manage Hostels</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Available Rooms</h5>
                    <p class="card-text">You have <strong>{{ $roomsCount }}</strong> available rooms.</p>
                    <a href="{{ route('owner.rooms') }}" class="btn btn-primary">Manage Rooms</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection