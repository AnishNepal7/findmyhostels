<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindMyHostels</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        body > .page-content {
            flex: 1;
        }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
            color: #f8f9fa !important;
            padding: 0.5rem 1rem;
            white-space: nowrap;
        }

        .navbar-nav .nav-link:hover {
            color: #e0f7fa !important;
        }

        .navbar-brand img {
            width: 120px;
        }

        .navbar-brand {
            font-size: 1.4rem;
            font-weight: 600;
            color: #ffffff !important;
        }

        .navbar .bi-person-circle {
            font-size: 1.5rem;
        }

        .navbar-nav {
            gap: 0.5rem;
        }

        /* Footer styles */
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
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="FindMyHostels Logo" class="me-2">
            FindMyHostels
        </a>

        <form action="{{ route('hostels.search') }}" method="GET" class="d-flex mx-auto w-50">
            <input class="form-control me-2" type="text" name="search" value="{{ old('search', $search ?? '') }}" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('services') }}">Our Services</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">
                            <i class="bi bi-person-circle me-1"></i> Sign In
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="page-content container my-5">
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
                        <li><a href="{{ url('hostels/register') }}" class="text-white hover-link">Register as Hostel</a></li>
                    </ul>
                </div>
                <div class="ms-5">
                    <h5>Follow Us</h5>
                    <div class="social-links">
                        <a href="https://www.facebook.com/FindmyHostels" target="_blank" class="text-white me-3">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
