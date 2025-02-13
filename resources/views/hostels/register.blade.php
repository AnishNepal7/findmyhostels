@extends('layouts.auth')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="max-width: 700px; width: 100%;">
        <h2 class="text-center mb-4 text-primary">Register Your Hostel</h2>

        <form action="{{ route('hostels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Owner Name -->
            <div class="mb-3">
                <label for="owner_name" class="form-label">Owner Name</label>
                <input type="text" name="owner_name" id="owner_name" class="form-control" placeholder="Enter Owner's Name" required>
            </div>

            <!-- Hostel Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Hostel Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Hostel Name" required>
            </div>

            <!-- Location -->
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Enter Location" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Describe your hostel" required></textarea>
            </div>

            <!-- PAN Number -->
            <div class="mb-3">
                <label for="pan_no" class="form-label">PAN Number</label>
                <input type="text" name="pan_no" id="pan_no" class="form-control" placeholder="Enter PAN Number" required>
            </div>

            <!-- Documents Upload -->
            <div class="mb-3">
                <label for="documents" class="form-label">Upload Documents (PDF, JPG, PNG)</label>
                <input type="file" name="documents" id="documents" class="form-control" accept=".pdf, .jpg, .png" required>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Hostel Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Submit for Approval</button>
            </div>
        </form>
    </div>
</div>
@endsection
