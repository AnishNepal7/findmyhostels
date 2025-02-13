<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FindMyHostels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            transition: all 0.3s;
        }
        .sidebar .nav-link {
            color: #ddd;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #495057;
            color: white;
        }
        .content {
            flex-grow: 1;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            background: #212529;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <div class="logo text-white mb-4">
            <img src="/images/logo.png" alt="Logo" style="width: 40px; height: 40px;"> FindMyHostels
        </div>
        <nav class="nav flex-column">
            <a href="/admin/dashboard" class="nav-link active">Dashboard</a>
            <a href="/admin/hostels" class="nav-link">Hostels</a>
            <a href="/admin/users" class="nav-link">Users</a>
            <a href="/admin/pending" class="nav-link">Approvals</a>
            <a href="/admin/settings" class="nav-link">Settings</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            @yield('content') <!-- Blade Content Section -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} FindMyHostels. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
