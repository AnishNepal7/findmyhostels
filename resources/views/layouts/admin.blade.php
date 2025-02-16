<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FindMyHostels</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #212529;
            color: white;
            position: fixed; /* Fixed position */
            height: 100vh; /* Full height */
            overflow-y: auto; /* Enable scrolling if content overflows */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Ensure it stays on top */
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 15px 0;
            background: #1c1f23;
            margin-bottom: 20px;
        }

        .sidebar .nav-link {
            color: #adb5bd;
            font-size: 0.9rem;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: white;
        }

        /* Main Content */
        .content {
            margin-left: 250px; /* Offset for the fixed sidebar */
            background-color: #f8f9fa;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto; /* Enable scrolling for main content */
            min-height: calc(100vh - 50px); /* Leave space for footer */
        }

        .content h1 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Footer */
        footer {
            background-color: #212529;
            color: #adb5bd;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
            z-index: 1000; /* Ensure it stays on top */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="logo text-white">
            <img src="/images/logo.png" alt="Logo" style="width: 40px; height: 40px;"> FindMyHostels
        </div>
        <nav class="nav flex-column">
            <a href="/admin/dashboard" class="nav-link active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/admin/hostels" class="nav-link"><i class="fas fa-building"></i> Hostels</a>
            <a href="/admin/users" class="nav-link"><i class="fas fa-users"></i> Users</a>
            <a href="/admin/pending" class="nav-link"><i class="fas fa-clock"></i> Approvals</a>
            <a href="/admin/settings" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <h1>@yield('title')</h1>
            <p>@yield('description')</p>
            @yield('content') <!-- Blade Content Section -->
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