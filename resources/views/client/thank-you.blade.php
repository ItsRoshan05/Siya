<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .thank-you-container {
            margin-top: 100px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .thank-you-title {
            color: #28a745;
            font-weight: bold;
        }
        .thank-you-message {
            color: #495057;
        }
        .btn-pay {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px 30px;
            font-size: 16px;
            border-radius: 50px;
            transition: all 0.3s;
        }
        .btn-pay:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="thank-you-container">
            <h1 class="thank-you-title display-4">Informasi Donasi</h1>
            
            <div class="mt-4">
                <p class="thank-you-message"><strong>Nama:</strong> {{ $name }}</p>
                <p class="thank-you-message"><strong>Email:</strong> {{ $email }}</p>
                <p class="thank-you-message"><strong>Jumlah Donasi:</strong> Rp {{ $amount }}</p>   
            </div>

            <button id="pay-button" class="btn btn-pay btn-lg mt-3">Bayar Sekarang</button>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            // Menggunakan snapToken yang dikirim dari controller
            let snapToken = "{{ $snapToken }}";

            snap.pay(snapToken, {
                // Callback untuk status pembayaran
                onSuccess: function(result) {
                    alert('Pembayaran berhasil!');
                    console.log(result);
                    window.location.href = '{{ url('/') }}';

                },
                onPending: function(result) {
                    alert('Pembayaran tertunda. Silakan lanjutkan nanti.');
                    console.log(result);
                },
                onError: function(result) {
                    alert('Terjadi kesalahan dalam pembayaran.');
                    console.log(result);
                }
            });
        };
    </script>
</body>
</html>
