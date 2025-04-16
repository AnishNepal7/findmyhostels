@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Pending Hostels</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Hostel Name</th>
                <th>Location</th>
                <th>Owner Name</th>
                <th>PAN No</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendingHostels as $hostel)
                <tr data-href=" " class="clickable-row">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hostel->name }}</td>
                    <td>{{ $hostel->location }}</td>
                    <td>{{ $hostel->owner_name }}</td>
                    <td>{{ $hostel->pan_no ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('hostels.show', $hostel->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('hostels.edit', $hostel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('hostels.destroy', $hostel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <form action="{{ route('hostels.approve', $hostel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No pending hostels found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    .clickable-row { cursor: pointer; }
    .clickable-row:hover { background-color: #f1f1f1; }
</style>

<script>
    document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', () => {
            window.location.href = row.dataset.href;
        });
    });
</script>
@endsection
