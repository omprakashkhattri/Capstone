<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 flex items-center justify-center min-h-screen">

    <!-- Login Card -->
    <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-md animate__animated animate__fadeInDown">

        <!-- Heading -->
        <h2 class="text-3xl font-extrabold text-center mb-6 text-black animate__animated animate__fadeIn animate__delay-1s">
            User Login
        </h2>

        <!-- Login Form -->
        <form action="{{ route('login.user') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email -->
            <div class="animate__animated animate__fadeInLeft animate__delay-1s">
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" placeholder="Enter your email"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" required>
            </div>

            <!-- Password -->
            <div class="animate__animated animate__fadeInRight animate__delay-1s">
                <label class="block text-gray-700 font-medium">Password</label>
                <input type="password" name="password" placeholder="Enter password"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" required>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-green-600 to-blue-600 text-white py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300 animate__animated animate__pulse animate__infinite">
                Login
            </button>
        </form>

        <!-- Extra Links -->
        <div class="text-center mt-4 animate__animated animate__fadeInUp animate__delay-2s">
            <a href="{{ route('password.request.user') }}" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
        </div>

        <div class="text-center mt-2">
            <a href="{{ route('register.user') }}" class="text-sm text-green-600 hover:underline">Create Account</a>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-2">
            <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:underline">← Back to Home</a>
        </div>
    </div>
<a href="{{ route('register.user') }}" 
   class="btn btn-outline-success w-100 rounded-3 fw-semibold">
   Create Account
</a>

</body>
</html>
