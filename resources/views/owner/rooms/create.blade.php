@extends('layouts.auth')

@section('content')
<div class="container mt-4"  >
    <div class="card shadow-lg mb-5" style=" width: 100%;">
        <div class="card-header bg-primary text-white text-center sticky-top" style="position: sticky; top: 0; z-index: 1020;">
            <h3>Add Room</h3>
        </div>
        <div class="card-body" style="overflow-y: auto;  width: 100%;">
            <form action="{{ route('owner.storeRoom') }}" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                @csrf
                
                <div class="mb-3 mt-4">
                    <label for="room_type" class="form-label">Room Type</label>
                    <input type="text" name="room_type" id="room_type" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>
                
                <div class="mb-3">
    <label for="available" class="form-label">Availability</label>
    <select name="available" id="available" class="form-select" required>
        <option value="1">Available</option>
        <option value="0">Not Available</option>
    </select>
</div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Room Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Select Facilities</label>
                    <div class="p-3 bg-light border rounded shadow-sm">
                        <div class="row">
                            @foreach($facilities as $facility)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}" id="facility_{{ $facility->id }}">
                                        <label class="form-check-label fw-bold" for="facility_{{ $facility->id }}">
                                            {{ $facility->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Add Room</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
