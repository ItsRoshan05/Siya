<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="display-4">Terima Kasih Sudah Berdonasi</h1>
        
        <div class="alert alert-success mt-4">
            <h5>{{ session('message') }}</h5>
            @if(session('new_account'))
                <p><strong>Username:</strong> {{ session('username') }}</p>
                <p><strong>Password:</strong> {{ session('randomPassword') }}</p>
            @endif
        </div>

        <p class="mt-4">Silakan klik tombol di bawah untuk masuk ke akun Anda:</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Masuk</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
