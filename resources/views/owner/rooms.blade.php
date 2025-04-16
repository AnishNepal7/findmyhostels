@extends('layouts.admin')

@section('content')
    <h1>Rooms</h1>
    <a href="{{ route('owner.createRoom') }}" class="btn btn-primary mb-3">Add Room</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Room Type</th>
                <th>Price</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->price }}</td>
                    <td>
                        <span class="badge {{ $room->available ? 'bg-success' : 'bg-danger' }}">
                            {{ $room->available ? 'Available' : 'Not Available' }}
                        </span>
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('owner.editRoom', $room) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button (Confirm before deletion) -->
                        <form action="{{ route('owner.deleteRoom', $room) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                        </form>

                        <!-- Change Availability Button -->
                        <form action="{{ route('owner.toggleAvailable', $room->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $room->available ? 'btn-danger' : 'btn-success' }}">
                                {{ $room->available  ? 'Make Unavailable' : 'Make available' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
