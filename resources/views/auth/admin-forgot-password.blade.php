<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Forgot Password - Redspot Car Rental</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        font-family: 'Segoe UI', sans-serif;
    }
    .card {
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        background: white;
    }
    .btn-primary-custom {
        background: linear-gradient(45deg, #6a11cb, #2575fc);
        border: none;
        color: white;
        transition: 0.3s;
    }
    .btn-primary-custom:hover {
        background: linear-gradient(45deg, #2575fc, #6a11cb);
    }
    .form-control:focus {
        border-color: #6a11cb;
        box-shadow: 0 0 5px rgba(106,17,203,0.5);
    }
    h3 {
        color: #6a11cb;
    }
    .back-login a {
        color: #2575fc;
        text-decoration: none;
        font-weight: 600;
    }
    .back-login a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-5" style="width: 400px;">
        <h3 class="text-center mb-4">Admin Forgot Password</h3>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success text-center rounded-3">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Forgot Password Form --}}
        <form method="POST" action="{{ route('password.request.admin.submit') }}">
            @csrf
            <div class="mb-4">
                <input type="email" 
                       name="email" 
                       class="form-control" 
                       placeholder="Enter your email" 
                       value="{{ old('email') }}" 
                       required>
            </div>
            <button type="submit" class="btn btn-primary-custom w-100 mb-3">Send Reset Link</button>
        </form>

        <div class="text-center back-login">
            <p>Remember your password? <a href="{{ route('login.admin') }}">Login Here</a></p>
            <p><a href="{{ route('home') }}">← Back to Home</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
