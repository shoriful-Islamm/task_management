<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task management System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light dark:bg-dark selection:bg-danger selection:text-white">
        @if (Route::has('login'))
            <div class="position-fixed top-0 end-0 p-3 text-end">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary fw-semibold text-dark text-decoration-none dark:text-white">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary fw-semibold text-dark text-decoration-none dark:text-white me-4">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-success fw-semibold text-dark text-decoration-none dark:text-white">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="container text-center py-5">
            <h2 class="display-4 text-dark mb-4">Task Management System</h2>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Get Started</h5>
                            <p class="card-text">Sign up and start managing your tasks today.</p>
                            <a href="{{ route('register') }}" class="btn btn-primary w-100">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
