<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Account - Redspot Car Rental</title>
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
    .already-account a {
        color: #2575fc;
        text-decoration: none;
        font-weight: 600;
    }
    .already-account a:hover {
        text-decoration: underline;
    }
    .form-check-label {
        user-select: none;
    }
</style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-5" style="width: 450px;">
        <h3 class="text-center mb-4">Create Account</h3>

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

        {{-- Advanced Registration Form --}}
        <form method="POST" action="{{ route('register.user.submit') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required pattern="[0-9]{10}">
            </div>
            <div class="mb-3">
                <textarea name="address" class="form-control" placeholder="Address" rows="2" required>{{ old('address') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label me-3">Gender:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                <label class="form-check-label" for="terms">I agree to the <a href="#">Terms & Conditions</a></label>
            </div>
            <button type="submit" class="btn btn-primary-custom w-100 mb-3">Create Account</button>
        </form>

        <div class="text-center already-account">
            <p>Already have an account? <a href="{{ route('login.user') }}">Login Here</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
