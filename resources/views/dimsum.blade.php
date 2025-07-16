<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dimsum Lezat</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Dimsum Lezat</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>

          @auth
          <!-- Jika user login -->

          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Banner -->
  <section class="hero text-center">
    <div>
      <h1>Selamat Datang di Dimsum Lezat!</h1>
      <p>Dimsum homemade, enak, halal, dan higienis.</p>
      <a href="#menu" class="btn btn-warning mt-3">Lihat Menu</a>
    </div>
  </section>

  <!-- Menu Section -->
  <section id="menu" class="container my-5">
    <h2 class="text-center mb-4">Menu Dimsum Kami</h2>
    <div class="row g-4">

      @foreach ($menus as $menu)
      <div class="col-md-4">
        <div class="card product-card shadow-sm">
          <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top img-fluid" alt="{{ $menu->nama }}">
          <div class="card-body text-center">
             <h5 class="card-title">{{ $menu->nama }}</h5>
            <p class="card-text">{{ $menu->deskripsi }}</p>
            <p class="fw-bold text-success">Rp {{ number_format($menu->harga) }}</p>
            <a href="https://wa.me/6281234567890" class="btn btn-success">Pesan via WA</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </section>

  <!-- Kontak -->
  <section id="kontak" class="bg-light py-5">
  <div class="text-center px-3">
    <h2 class="mb-4">Kontak Kami</h2>
    <p>📍 Alamat: Jl. Lezat No. 99, Surabaya</p>
    <p>📞 Telepon: 0812-3456-7890</p>
    <p>📱 Instagram: <a href="https://instagram.com/dimsumlezat" target="_blank">@dimsumlezat</a></p>
  </div>
</section>


  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p>&copy; {{ date('Y') }} Dimsum Lezat. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
