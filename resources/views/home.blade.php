<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redspot Car Rental</title>

  <!-- Bootstrap CSS (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <meta name="theme-color" content="#0d6efd">
</head>
<body>
  <!-- ===== NAVBAR ===== -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-75 fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Redspot</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navCollapse">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="#fleet">Our Fleet</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>

        <div class="d-flex align-items-center">
          <!-- Login dropdown -->
          <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adminLoginModal">Admin</a></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staffLoginModal">Staff</a></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#customerLoginModal">Customer</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- ===== HERO with optional video background ===== -->
  <header class="hero-section">
    <!-- OPTIONAL: place a file at public/videos/hero.mp4 for a background video -->
    <video id="bg-video" class="bg-video" autoplay muted loop playsinline>
      <source src="{{ asset('videos/hero.mov') }}" type="video/mp4">
      <!-- fallback to image or color -->
    </video>

    <div class="overlay"></div>

    <div class="container hero-content">
      <div class="row align-items-center">
        <div class="col-md-6 text-white">
          <h1 class="display-4 animate__animated animate__fadeInDown">Hassle-free car rental. Anytime. Anywhere.</h1>
          <p class="lead mt-3 animate__animated animate__fadeInUp">Search, book, and get on the road in minutes — secure payments, transparent pricing, modern pickup & return flows.</p>

          <div class="mt-4 animate__animated animate__fadeInUp">
            <a href="{{ url('/vehicles') }}" class="btn btn-primary btn-lg me-2">Browse Vehicles</a>
            <a href="#features" class="btn btn-outline-light btn-lg">How it works</a>
          </div>

          <!-- quick login hint -->
          <p class="mt-4 text-muted small">Demo logins — Admin: <strong>admin@redspot.com</strong> / password</p>
        </div>

        <div class="col-md-5 offset-md-1">
          <!-- Demo feature card -->
          <div class="card glass-card shadow animate__animated animate__fadeInRight">
            <div class="card-body">
              <h5 class="card-title">Instant availability</h5>
              <p class="card-text">Real-time availability checks prevent double-booking and let staff manage fleet in one place.</p>
              <ul class="list-unstyled mb-0">
                <li><i class="bi bi-check2-circle text-success"></i> Fast search</li>
                <li><i class="bi bi-check2-circle text-success"></i> Secure payments</li>
                <li><i class="bi bi-check2-circle text-success"></i> Pickup & return logs</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- ===== FEATURES (anchor target) ===== -->
  <section id="features" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Why choose Redspot</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-card">
            <i class="bi bi-speedometer2 feature-icon"></i>
            <h5>Optimised Fleet</h5>
            <p>Automated scheduling, maintenance holds and analytics to improve utilisation.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="bi bi-shield-lock feature-icon"></i>
            <h5>Secure Payments</h5>
            <p>Stripe-ready tokenised payments and PCI-aware design for safe transactions.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="bi bi-people feature-icon"></i>
            <h5>Role-based Access</h5>
            <p>Admin, staff and driver roles with audit logs and controlled permissions.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== FLEET preview (link to vehicles page) ===== -->
  <section id="fleet" class="py-5 bg-light">
    <div class="container">
      <h3 class="mb-4">Our Fleet</h3>
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car">
            <div class="card-body">
              <h5 class="card-title">Toyota Corolla</h5>
              <p class="card-text">Comfortable, fuel-efficient sedan.</p>
              <a href="{{ url('/vehicles') }}" class="btn btn-outline-primary btn-sm">View fleet</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="{{ asset('images/car2.jpg') }}" class="card-img-top" alt="Car">
            <div class="card-body">
              <h5 class="card-title">Hyundai i30</h5>
              <p class="card-text">Compact hatchback for city driving.</p>
              <a href="{{ url('/vehicles') }}" class="btn btn-outline-primary btn-sm">View fleet</a>
            </div>
          </div>
        </div>
        <!-- add more cards as needed -->
      </div>
    </div>
  </section>

  <!-- ===== CONTACT/FOOTER ===== -->
  <footer id="contact" class="py-4 text-center">
    <div class="container">
      <small class="text-muted">&copy; {{ date('Y') }} Redspot Car Rental — Demo project</small>
    </div>
  </footer>

  <!-- ===== LOGIN MODALS ===== -->
  @if(session('login_error'))
    <div class="alert alert-danger text-center mb-0">{{ session('login_error') }}</div>
  @endif

  <!-- Admin modal -->
  <div class="modal fade" id="adminLoginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" method="POST" action="{{ url('/login') }}">
        @csrf
        <input type="hidden" name="role" value="admin">
        <div class="modal-header">
          <h5 class="modal-title">Admin Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" required placeholder="admin@redspot.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required placeholder="password">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
          <button class="btn btn-primary" type="submit">Sign in</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Staff modal -->
  <div class="modal fade" id="staffLoginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" method="POST" action="{{ url('/login') }}">
        @csrf
        <input type="hidden" name="role" value="staff">
        <div class="modal-header">
          <h5 class="modal-title">Staff Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" required placeholder="staff@example.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
          <button class="btn btn-primary" type="submit">Sign in</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Customer modal -->
  <div class="modal fade" id="customerLoginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" method="POST" action="{{ url('/login') }}">
        @csrf
        <input type="hidden" name="role" value="customer">
        <div class="modal-header">
          <h5 class="modal-title">Customer Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" required placeholder="you@example.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
          <button class="btn btn-primary" type="submit">Sign in</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Hide video if not available or on small devices (optional)
    document.addEventListener('DOMContentLoaded', function(){
      const video = document.getElementById('bg-video');
      if (!video || window.innerWidth < 768) {
        if (video) video.style.display = 'none';
        document.querySelector('.overlay').style.opacity = 0.55;
      }
    });
  </script>
</body>
</html>
