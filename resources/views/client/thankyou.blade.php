<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Terima Kasih!</h1>

        @if(session('new_account'))
            <p class="mb-4">Akun baru Anda telah dibuat!</p>
            <p class="mb-4">Email: {{ session('username') }}</p>
            <p class="mb-4">Password: {{ session('randomPassword') }}</p>
            <p class="mb-4">Silahkan simpan informasi ini untuk login di masa mendatang.</p>
        @else
            <p class="mb-4">Terima kasih sudah berdonasi lagi!</p>
        @endif

        <p class="mb-4">Donasi Anda sangat berarti bagi kami.</p>
        <a href="{{ url('/') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Kembali ke Beranda</a>
    </div>
</body>
</html>