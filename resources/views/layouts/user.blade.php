<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - FindMyHostels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            min-height: 100vh;
            position: fixed;
        }

        .sidebar .logo {
            font-size: 1.3rem;
            font-weight: bold;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar .nav-link {
            color: #ccc;
            padding: 12px 20px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #495057;
            color: #fff;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            width: 100%;
            background-color: #f8f9fa;
        }

        footer {
            margin-top: 50px;
            padding: 20px;
            text-align: center;
            background-color: #f1f1f1;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #ddd;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="logo">
            <img src="/images/logo.png" alt="Logo" style="width: 40px; height: 40px;"> 
            <span>FindMyHostels</span>
        </div>
        <nav class="nav flex-column mt-4">
            <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('hostels.search') }}" class="nav-link {{ request()->routeIs('hostels.search') ? 'active' : '' }}">
                <i class="fas fa-search-location"></i> Search Hostels
            </a>
            <a href="{{ route('user.profile') }}" class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                <i class="fas fa-user"></i> Profile
            </a>
            
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
        
        <!-- Footer -->
        <footer>
            <div>
                &copy; {{ date('Y') }} <strong>FindMyHostels</strong>. All rights reserved.
            </div>
            <div>
                <small>Helping students find the perfect place to stay with ease and confidence.</small>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
