@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Hostel Listings</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search hostels by name, location, or PAN number...">
    </div>

    <table class="table table-bordered table-hover" id="hostelTable">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Hostel Name</th>
                <th>Location</th>
                <th>PAN No</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hostels as $hostel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hostel->name }}</td>
                    <td>{{ $hostel->location }}</td>
                    <td>{{ $hostel->pan_no ?? 'N/A' }}</td>
                    <td>
                        @if ($hostel->status == 1)
                            <span class="badge bg-success">Enabled</span>
                        @else
                            <span class="badge bg-danger">Disabled</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('hostels.toggleStatus', $hostel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $hostel->status == 1 ? 'btn-danger' : 'btn-success' }}">
                                {{ $hostel->status == 1 ? 'Disable' : 'Enable' }}
                            </button>
                        </form>
                        <a href="{{ route('hostels.edit', $hostel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Simple JS Search
    document.getElementById('searchInput').addEventListener('input', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#hostelTable tbody tr');

        rows.forEach(row => {
            let name = row.cells[1].textContent.toLowerCase();
            let location = row.cells[2].textContent.toLowerCase();
            let panNo = row.cells[3].textContent.toLowerCase();

            row.style.display = (name.includes(filter) || location.includes(filter) || panNo.includes(filter)) ? '' : 'none';
        });
    });
</script>
@endsection
