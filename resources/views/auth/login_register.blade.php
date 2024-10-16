<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <title>Login Page | AsmrProg</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Buat Akun</h1>
                <span>Masukan Email dan Username anda</span>
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <button type="submit">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Masuk</h1>
                <span>Gunakan Email Anda</span>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <button type="submit">Masuk</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Login Admin Panel</h1>
                    <!-- <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button> -->
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('auth/script.js') }}"></script>
</body>
</html>
