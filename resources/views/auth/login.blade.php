<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Dimsum Lezat</title>

  <!-- Tailwind (jika pakai Vite) -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Atau Bootstrap CDN jika tidak pakai Tailwind -->
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

  
</head>
<body>

  <div class="login-wrapper">
    <!-- Logo -->
    <div class="text-center">
      <img src="{{ asset('images/dimsum.png') }}" alt="Logo" class="login-logo rounded-full shadow">
    </div>

    <!-- Judul -->
    <h2 class="login-title">Login Dimsum Lezat</h2>

    <!-- Session Status -->
    @if (session('status'))
      <div class="text-green-600 text-center mb-3 font-semibold">
        {{ session('status') }}
      </div>
    @endif

    <!-- Form Login -->
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <input type="email" name="email" class="login-input" placeholder="Email" value="{{ old('email') }}" required autofocus>
      @error('email')
        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
      @enderror

      <input type="password" name="password" class="login-input" placeholder="Password" required>
      @error('password')
        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
      @enderror

      <button type="submit" class="login-button">Login</button>
    </form>

    <!-- Footer -->
    <div class="login-footer mt-4">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Lupa password?</a><br>
      @endif
      Belum punya akun?
      <a href="{{ route('register') }}">Daftar</a>
    </div>
  </div>

</body>
</html>
