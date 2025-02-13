@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Hero Section -->
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-5 fw-bold text-primary">Find Your Perfect Hostel</h1>
            <p class="fs-4 text-muted">Discover affordable, safe, and comfortable hostels near you.</p>
            
            <!-- Search Bar -->
            <form action="{{ route('hostels.search') }}" method="GET" class="d-flex justify-content-center">
                <input type="text" name="search" class="form-control w-50 me-2" placeholder="Search by location or name">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>

    <!-- Popular Hostels -->
    <h2 class="text-center text-primary mb-4">Popular Hostels</h2>
    <div class="row">
        @foreach ($popularHostels as $hostel)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset($hostel->image) }}" class="card-img-top" alt="{{ $hostel->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hostel->name }}</h5>
                        <p class="card-text text-muted">{{ \Str::limit($hostel->description, 80) }}</p>
                        <a href="{{ route('hostels.show', $hostel->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- How It Works Section -->
    <div class="py-5 text-center bg-primary text-white rounded my-4 shadow-sm">
        <h2 class="mb-4">How It Works</h2>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h4>1. Search</h4>
                <p>Find hostels easily with our smart search system.</p>
            </div>
            <div class="col-md-3">
                <h4>2. Choose</h4>
                <p>Compare hostels, check facilities, and select the best fit.</p>
            </div>
            <div class="col-md-3">
                <h4>3. Book</h4>
                <p>Secure your hostel with just a few clicks!</p>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <h2 class="text-center text-primary mb-4">Why Choose Us?</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h5 class="text-success">Verified Hostels</h5>
                <p>All listings are verified for safety and comfort.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h5 class="text-success">Easy Booking</h5>
                <p>Simple, fast, and hassle-free booking process.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h5 class="text-success">24/7 Support</h5>
                <p>We're here to help whenever you need us.</p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center my-5">
        <h3>Ready to find your next hostel?</h3>
        <a href="{{ route('hostels.index') }}" class="btn btn-lg btn-primary mt-3">Explore All Hostels</a>
    </div>
</div>
@endsection
