@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Hostels</h2>

            <!-- Search Form -->
            <!-- <form action="{{ route('hostels.search') }}" method="GET" class="d-flex mb-4">
                <input type="text" name="search" value="{{ old('search', $search ?? '') }}" class="form-control me-2" placeholder="Search Hostels by name or location">
                <button type="submit" class="btn btn-primary">Search</button>
            </form> -->

            <!-- Hostel List -->
            <div class="row">
                @foreach ($hostels as $hostel)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset($hostel->image) }}" class="card-img-top" alt="{{ $hostel->name }}">
                            <div class="card-body">
                                <h5 class="card-title text-primary font-weight-bold" style="font-size: 1.2rem;">{{ $hostel->name }}</h5>
                                <p class="card-text text-muted" style="font-size: 0.9rem;">{{ $hostel->location }}</p>
                                <p class="card-text" style="font-size: 0.95rem; color: #555;">{{ \Str::limit($hostel->description, 100) }}</p>
                                <a href="{{ route('hostels.show', $hostel->id) }}" class="btn btn-info btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $hostels->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
