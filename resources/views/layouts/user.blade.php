<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - FindMyHostels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Same styles as admin layout */
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <div class="logo text-white mb-4">
            <img src="/images/logo.png" alt="Logo" style="width: 40px; height: 40px;"> User Panel
        </div>
        <nav class="nav flex-column">
            <a href="{{ route('user.dashboard') }}" class="nav-link active">Dashboard</a>
            <a href="{{ route('user.bookings') }}" class="nav-link">My Bookings</a>
            <a href="{{ route('hostels.search') }}" class="nav-link">Search Hostels</a>
            <a href="{{ route('user.profile') }}" class="nav-link">Profile</a>
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