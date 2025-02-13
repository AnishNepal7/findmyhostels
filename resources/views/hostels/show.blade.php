@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Hostel Details Section -->
            <div class="hostel-details mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset($hostel->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $hostel->name }}">
                    </div>
                    <div class="col-md-8">
                        <h2 class="text-primary">{{ $hostel->name }}</h2>
                        <p class="text-muted"><strong>Location:</strong> {{ $hostel->location }}</p>
                        <p class="text-muted"><strong>Owner:</strong> {{ $hostel->owner_name }}</p>
                        <p><strong>Description:</strong></p>
                        <p>{{ $hostel->description }}</p>
                        <p><strong>Pan No:</strong> {{ $hostel->pan_no ?? 'Not Provided' }}</p>
                    </div>
                </div>
            </div>

            <!-- Rooms Section -->
            <h3 class="mb-3 text-center">Rooms</h3>
            <div class="row">
                @foreach ($hostel->rooms as $room)
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="row g-0"> <!-- Responsive Grid -->
                                <!-- Image Section -->
                                <div class="col-md-4 col-sm-12">
                                    <img src="{{ asset($room->image ?? 'images/hostels/sample.png') }}" 
                                         alt="{{ $room->room_type }}" 
                                         style="width: 100%; height: 250px; object-fit: cover; object-position: center;"
                                         class="rounded-start w-100">
                                </div>

                                <!-- Details Section -->
                                <div class="col-md-8 col-sm-12">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">{{ $room->room_type }}</h5>
                                        <p class="card-text"><strong>Price:</strong> ₹{{ $room->price }}</p>
                                        <p class="card-text text-muted">{{ $room->description }}</p>

                                        <!-- Display Facilities -->
                                        <h6>Facilities:</h6>
                                        <ul class="list-inline">
                                            @foreach ($room->facilities as $facility)
                                                <li class="badge bg-secondary me-1">{{ $facility->name }}</li>
                                            @endforeach
                                        </ul>

                                        <!-- Availability Status -->
                                        <p class="{{ $room->available ? 'text-success' : 'text-danger' }}">
                                            <strong>Status:</strong> {{ $room->available ? 'Available' : 'Booked' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('hostels.index') }}" class="btn btn-primary btn-sm mt-4">Back to Hostel Listings</a>
            </div>
        </div>
    </div>
</div>
@endsection
