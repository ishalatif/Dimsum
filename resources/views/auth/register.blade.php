<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register Dimsum Lezat</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    body {
      background-color: #fafafa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .register-wrapper {
      max-width: 380px;
      margin: 60px auto;
      background: #fff;
      border: 1px solid #dbdbdb;
      padding: 40px;
      border-radius: 8px;
    }

    .register-logo {
      width: 80px;
      height: 80px;
      object-fit: cover;
      margin-bottom: 20px;
    }

    .register-title {
      font-size: 28px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 30px;
    }

    .register-input {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 12px;
      border: 1px solid #dbdbdb;
      border-radius: 4px;
      background-color: #fafafa;
      font-size: 14px;
    }

    .register-button {
      background-color: #0095f6;
      color: white;
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      font-weight: bold;
      border: none;
      transition: background-color 0.2s ease-in-out;
    }

    .register-button:hover {
      background-color: #007acc;
    }

    .register-footer {
      text-align: center;
      font-size: 14px;
      margin-top: 20px;
    }

    .register-footer a {
      color: #0095f6;
      text-decoration: none;
    }

    .register-footer a:hover {
      text-decoration: underline;
    }

    .error-message {
      color: #dc2626;
      font-size: 13px;
      margin-top: -8px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="register-wrapper">
    <!-- Logo -->
    <div class="text-center">
      <img src="{{ asset('images/dimsum.png') }}" alt="Logo" class="register-logo rounded-full shadow">
    </div>

    <!-- Judul -->
    <h2 class="register-title">Daftar Akun</h2>

    <!-- Form Register -->
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Nama -->
      <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required class="register-input">
      @error('name')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <!-- Email -->
      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required class="register-input">
      @error('email')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <!-- Password -->
      <input type="password" name="password" placeholder="Password" required class="register-input">
      @error('password')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <!-- Konfirmasi Password -->
      <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required class="register-input">
      @error('password_confirmation')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <button type="submit" class="register-button">Daftar</button>
    </form>

    <div class="register-footer mt-4">
      Sudah punya akun?
      <a href="{{ route('login') }}">Login</a>
    </div>
  </div>

</body>
</html>
