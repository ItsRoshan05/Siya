<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <script>
        // Waktu countdown dalam detik
        let countdown = 5;

        // Fungsi untuk mengurangi countdown dan memperbarui tampilan
        function updateCountdown() {
            document.getElementById('countdown').textContent = countdown;
            countdown--;

            // Redirect ke halaman utama setelah countdown selesai
            if (countdown < 0) {
                window.location.href = "{{ url('/') }}";
            }
        }

        // Jalankan fungsi updateCountdown setiap 1 detik
        setInterval(updateCountdown, 1000);
    </script>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Terima Kasih Sudah Berdonasi</h1>
        <p>Anda akan diarahkan ke halaman utama dalam <span id="countdown">5</span> detik.</p>
    </div>
</body>
</html>
