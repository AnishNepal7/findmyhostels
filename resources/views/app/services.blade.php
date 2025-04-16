@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Our Services</h1>
        <p class="lead text-muted">Making your hostel experience simple, affordable, and memorable.</p>
    </div>

    <!-- Services List -->
    <div class="row text-center">
        <!-- Service 1 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded p-3">
                <img src="{{ asset('images/247service.jpg') }}" class="card-img-top" alt="24/7 Support" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary">24/7 Support</h5>
                    <p class="card-text text-muted">
                        We offer round-the-clock customer support to assist you with any issues, bookings, or inquiries.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded p-3">
                <img src="{{ asset('images/verified.jpg') }}" class="card-img-top" alt="Verified Hostels" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary">Verified Hostels</h5>
                    <p class="card-text text-muted">
                        All hostels listed are thoroughly verified for quality, safety, and comfort, ensuring a hassle-free experience.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded p-3">
                <img src="{{ asset('images/flexiblebooking.jpg') }}" class="card-img-top" alt="Flexible Booking" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary">Flexible Booking</h5>
                    <p class="card-text text-muted">
                        We provide easy and flexible booking options, allowing you to modify or cancel bookings with ease.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 4 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded p-3">
                <img src="{{ asset('images/securepayment.jpg') }}" class="card-img-top" alt="Secure Payment" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary">Secure Payment</h5>
                    <p class="card-text text-muted">
                        All transactions on our platform are fully secure, with multiple payment options available.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 5 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded p-3">
                <img src="{{ asset('images/recommendation.jpg') }}" class="card-img-top" alt="Personalized Recommendations" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary">Personalized Recommendations</h5>
                    <p class="card-text text-muted">
                        Based on your preferences and location, we offer tailored hostel recommendations to suit your needs.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 6 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-light rounded p-3">
                <img src="{{ asset('images/cancelation.jpg') }}" class="card-img-top" alt="Easy Cancellation" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary">Easy Cancellation</h5>
                    <p class="card-text text-muted">
                        If your plans change, cancel your booking easily and get a full refund as per our flexible cancellation policy.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-5 bg-primary text-white p-4 rounded shadow-sm">
        <h3>Ready to book your stay?</h3>
        <a href="{{ route('hostels.index') }}" class="btn btn-light mt-3">Explore Hostels Now</a>
    </div>

    <!-- Register Hostel Call to Action -->
    <div class="text-center mt-4 bg-light text-dark p-4 rounded shadow-sm border">
        <h4>Do you own a hostel?</h4>
        <p class="text-muted mb-3">Reach thousands of students and travelers. List your hostel today!</p>
        <a href="{{ url('hostels/register') }}" class="btn btn-primary">Register Your Hostel</a>
    </div>

</div>
@endsection
