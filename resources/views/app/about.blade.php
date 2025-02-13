@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- About Us Header -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">About Us</h1>
        <p class="lead text-muted">Connecting travelers with the best hostels, making every stay feel like home.</p>
    </div>

    <!-- Our Story Section -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/hostels/room.png') }}" alt="Our Story" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-6">
            <h2 class="text-success">Our Story</h2>
            <p class="text-muted">
                Founded with a passion for travel and comfort, our platform was created to make hostel bookings simple, reliable, and stress-free.
                We believe that finding a perfect place to stay shouldn’t be a hassle. Whether you’re a student, a traveler, or someone seeking temporary accommodation, we’re here to connect you with the best options around.
            </p>
        </div>
    </div>

    <!-- Mission & Vision Section -->
    <div class="row text-center bg-light p-4 rounded shadow-sm mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <h3 class="text-primary">Our Mission</h3>
            <p class="text-muted">To make hostel hunting effortless, providing safe, affordable, and verified accommodations for everyone, everywhere.</p>
        </div>
        <div class="col-md-6">
            <h3 class="text-primary">Our Vision</h3>
            <p class="text-muted">To be the most trusted platform for hostel bookings, redefining how people find and experience their stays.</p>
        </div>
    </div>

    <!-- Our Values Section -->
    <h2 class="text-center text-success mb-4">Core Values That Drive Us</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h5 class="text-primary">Trust & Transparency</h5>
                <p class="text-muted">We ensure all hostels are verified, creating a safe space for our users.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h5 class="text-primary">User-Centric Approach</h5>
                <p class="text-muted">Our platform is designed with simplicity and user convenience in mind.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h5 class="text-primary">Innovation</h5>
                <p class="text-muted">We constantly evolve, adding features that enhance the booking experience.</p>
            </div>
        </div>
    </div>

    <!-- Meet the Team (Optional Section) -->
    <div class="text-center my-5">
        <h2 class="text-primary mb-4">Meet Our Team</h2>
        <p class="text-muted">A passionate group of individuals dedicated to transforming hostel bookings.</p>
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/yubaraj.jpg') }}" class="card-img-top" alt="Team Member" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Yubaraj Niraula</h5>
                        <p class="card-text text-muted">Founder & CEO</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/malika.jpg') }}" class="card-img-top" alt="Team Member" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Maleeka Karki</h5>
                        <p class="card-text text-muted">Co-Founder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center bg-primary text-white p-4 rounded shadow-sm">
        <h3>Want to know more about our work?</h3>
        <a href="{{ route('hostels.index') }}" class="btn btn-light mt-3">Explore Hostels Now</a>
    </div>

</div>
@endsection
