<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindMyHostels</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Optional: Bootstrap Icons for social media -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Custom styles for links and social media */
        .hover-link {
            text-decoration: none;
            color: #ddd;
            transition: color 0.3s ease;
        }

        .hover-link:hover {
            color: #00bcd4;
        }

        .footer .social-links a {
            text-decoration: none;
            color: #ddd;
            font-size: 1.1em;
        }

        .footer .social-links a:hover {
            color: #00bcd4;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="FindMyHostels Logo" width="100">
                FindMyHostels
            </a>

            <!-- Search Bar -->
            <form class="d-flex mx-auto w-50">
                <input class="form-control me-2" type="search" placeholder="Search Hostels..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>

            <!-- Navbar Toggler for Mobile View -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('services') }}">Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/logo.png') }}" width="180" alt="FindMyHostels Logo">
                        <div class="ms-3">
                            <h5>FindMyHostels</h5>
                            <p class="mb-1">Kapan, Kathmandu</p>
                            <p class="mb-1">Phone: +977 123-456-7890</p>
                            <p>Email: support@findmyhostels.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="me-5">
                        <h5>Useful Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/') }}" class="text-white hover-link">Home</a></li>
                            <li><a href="{{ url('about') }}" class="text-white hover-link">About Us</a></li>
                            <li><a href="{{ url('services') }}" class="text-white hover-link">Our Services</a></li>
                            <li><a href="{{ url('register') }}" class="text-white hover-link">Register as Hostel</a></li>
                        </ul>
                    </div>
                    <div class="ms-5">
                        <h5>Follow Us</h5>
                        <div class="social-links">
                            <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i> Facebook</a>
                            <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i> Twitter</a>
                            <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i> Instagram</a>
                            <a href="#" class="text-white"><i class="bi bi-linkedin"></i> LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-white">
            <div class="text-center">
                <p>&copy; 2025 FindMyHostels. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
