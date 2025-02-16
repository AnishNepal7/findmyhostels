<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Owner Dashboard - FindMyHostels</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease-in-out;
        }

        .sidebar .logo {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            font-size: 0.9rem;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #34495e;
            color: #fff;
        }

        .content {
            margin-left: 250px;
            background-color: #f8f9fa;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }

        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .sidebar .logo img {
                display: none;
            }

            .sidebar .nav-link {
                text-align: center;
                padding: 10px;
            }

            .content {
                margin-left: 60px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <div class="logo text-center mb-4">
            <img src="/images/logo.png" alt="Logo">
            <h5 class="mt-2">Hostel Owner Panel</h5>
        </div>
        <nav class="nav flex-column">
            <a href="{{ route('owner.dashboard') }}" class="nav-link active">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{ route('owner.rooms') }}" class="nav-link">
                <i class="fas fa-bed me-2"></i> Manage Rooms
            </a>
            <a href="{{ route('user.profile') }}" class="nav-link">
                <i class="fas fa-user me-2"></i> Profile
            </a>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>