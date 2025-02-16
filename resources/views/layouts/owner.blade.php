<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Owner Dashboard - FindMyHostels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Same styles as admin layout */
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <div class="logo text-white mb-4">
            <img src="/images/logo.png" alt="Logo" style="width: 40px; height: 40px;"> Hostel Owner Panel
        </div>
        <nav class="nav flex-column">
            <a href="{{ route('owner.dashboard') }}" class="nav-link active">Dashboard</a>
            <a href="{{ route('owner.rooms') }}" class="nav-link">Manage Rooms</a>
            <a href="{{ route('owner.bookings') }}" class="nav-link">Bookings</a>
            <a href="{{ route('owner.profile') }}" class="nav-link">Profile</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} FindMyHostels. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>