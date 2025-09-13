<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redspot Car Rental</title>
    
    <!-- Bootstrap CSS (from public folder) -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Optional custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Redspot Car Rental</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vehicles.index') }}">Vehicles</a>
                    </li>
                    {{-- Show login/register only if not logged in --}}
                    @if(!session()->has('user_id') && !session()->has('admin_id'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.user') }}">User Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.user') }}">Create Account</a>
                        </li>
                    @else
                        {{-- Show logout if logged in --}}
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Logout</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container mt-5">
        {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
