<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-6 hidden md:block">
        <h2 class="text-2xl font-bold mb-6">Hello, {{ session('user_name', auth()->user()->name) }}</h2>
        <nav class="space-y-4">
            <a href="{{ route('user.dashboard') }}" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-home mr-2"></i> Dashboard
            </a>
            <a href="{{ route('user.profile') }}" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-user mr-2"></i> Profile
            </a>
            <a href="{{ route('user.bookings') }}" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-car mr-2"></i> My Bookings
            </a>
            <a href="{{ route('user.payments') }}" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-credit-card mr-2"></i> Payments
            </a>
            <a href="{{ route('user.vehicles') }}" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-car-side mr-2"></i> Vehicles
            </a>
            <a href="{{ route('user.reviews') }}" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-star mr-2"></i> Reviews
            </a>
            <a href="{{ route('user.schedule') }}" class="flex items-center text-gray-700 hover:text-blue-600">
                <i class="fas fa-calendar-alt mr-2"></i> Schedule
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center text-red-600 hover:text-red-800 mt-4">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
            <div class="text-gray-600">Welcome back, {{ session('user_name', auth()->user()->name) }}</div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Total Bookings</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalBookings ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Upcoming Bookings</h2>
                <p class="text-3xl font-bold text-green-600">{{ $upcomingBookings ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                <h2 class="text-lg font-semibold text-gray-600 mb-2">Payments</h2>
                <p class="text-3xl font-bold text-purple-600">${{ $totalPayments ?? '0.00' }}</p>
            </div>
        </div>

        <!-- Recent Bookings Table -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Bookings</h2>
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Booking ID</th>
                            <th class="py-3 px-6 text-left">Vehicle</th>
                            <th class="py-3 px-6 text-left">Pickup Date</th>
                            <th class="py-3 px-6 text-left">Return Date</th>
                            <th class="py-3 px-6 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse($bookings as $booking)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $booking->id }}</td>
                            <td class="py-3 px-6">{{ $booking->vehicle->make }} {{ $booking->vehicle->model }}</td>
                            <td class="py-3 px-6">{{ $booking->pickup_date }}</td>
                            <td class="py-3 px-6">{{ $booking->return_date }}</td>
                            <td class="py-3 px-6">
                                <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-xs">{{ $booking->status }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-6">No bookings yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>
</html>
