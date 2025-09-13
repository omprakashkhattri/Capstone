<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redspot Car Rental</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f8f9fa;
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            color: #fff;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #007bff, #6610f2);
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }

        .hero-section p {
            font-size: 1.3rem;
            margin-top: 15px;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.2);
        }

        .hero-section .btn-primary {
            font-size: 1.2rem;
            padding: 0.7rem 2rem;
            border-radius: 50px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Login Buttons Top Right */
        .login-buttons {
            position: absolute;
            top: 20px;
            right: 30px;
            z-index: 3;
        }

        .login-buttons a {
            margin-left: 10px;
            font-weight: 600;
            color: #000 !important; /* Black text */
        }

        /* Floating Car */
        .floating-car {
            position: absolute;
            bottom: 20px;
            left: -200px;
            z-index: 2;
            width: 250px;
            animation: floatCar 12s linear infinite;
        }

        @keyframes floatCar {
            0% { left: -300px; transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(2deg); }
            100% { left: 100%; transform: translateY(0) rotate(0deg); }
        }

        /* Services Section */
        .services {
            padding: 80px 15px;
            background: #fff;
        }

        .service-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .service-card i {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 25px 0;
            background: #343a40;
            color: #fff;
        }

        /* Center Bootstrap Modal Vertically */
        .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }
    </style>
</head>
<body>

    <!-- Login buttons -->
   <!-- Login buttons -->
<div class="login-buttons">
    <a href="{{ route('login.admin') }}" class="btn btn-outline-light animate__animated animate__fadeInDown">
        Admin Login
    </a>
    <a href="{{ route('login.user') }}" class="btn btn-outline-light animate__animated animate__fadeInDown animate__delay-1s">
        User Login
    </a>
    <a href="{{ route('login.employee') }}" class="btn btn-outline-light animate__animated animate__fadeInDown animate__delay-2s">
        Employee Login
    </a>
</div>


    <!-- Hero Section -->
    <section class="hero-section">
        <div id="particles-js"></div>
        <div class="hero-content">
            <h1 class="animate__animated animate__fadeInDown">🚗 Welcome to Redspot Car Rental</h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s">Drive your dream car today with ease and comfort.</p>
            <a href="{{ route('vehicles.index') }}" class="btn btn-primary mt-4 animate__animated animate__fadeInUp animate__delay-2s">Explore Vehicles</a>
        </div>
        <img src="{{ asset('images/car.png') }}" alt="Floating Car" class="floating-car">
    </section>

    <!-- Services Section -->
    <section class="services container text-center">
        <h2 class="mb-5 animate__animated animate__fadeInUp">Why Choose Redspot?</h2>
        <div class="row g-4">
            <div class="col-md-4 animate__animated animate__fadeInLeft">
                <div class="card service-card p-4">
                    <i class="bi bi-speedometer2"></i>
                    <h5>Fast & Easy Booking</h5>
                    <p>Book your vehicle in just a few clicks, hassle-free and quick.</p>
                </div>
            </div>
            <div class="col-md-4 animate__animated animate__fadeInUp">
                <div class="card service-card p-4">
                    <i class="bi bi-shield-lock"></i>
                    <h5>Secure Payments</h5>
                    <p>All transactions are safe and encrypted for your peace of mind.</p>
                </div>
            </div>
            <div class="col-md-4 animate__animated animate__fadeInRight">
                <div class="card service-card p-4">
                    <i class="bi bi-people-fill"></i>
                    <h5>Excellent Support</h5>
                    <p>24/7 customer support to help you with any questions or issues.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Redspot Car Rental. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Particles.js Init -->
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 60 },
                "color": { "value": "#ffffff" },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.5 },
                "size": { "value": 3 },
                "move": { "enable": true, "speed": 2 }
            },
            "interactivity": {
                "events": { "onhover": { "enable": true, "mode": "repulse" } }
            },
            "retina_detect": true
        });
    </script>
</body>
</html>
