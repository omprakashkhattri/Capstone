<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Dashboard - Redspot</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card">
      <div class="card-body">
        <h3>Welcome, {{ $name ?? 'User' }}!</h3>
        <p>Signed in as <strong>{{ $role ?? 'guest' }}</strong>.</p>

        <div class="mt-3">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-secondary">Logout</button>
          </form>
        </div>

        <hr>
        <p class="text-muted">This is a simple demo dashboard. In the final project each role will see custom pages (admin reports, staff pickup forms, customer bookings).</p>
      </div>
    </div>
  </div>
</body>
</html>
