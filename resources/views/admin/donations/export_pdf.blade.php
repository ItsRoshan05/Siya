<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengeluaran</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        tfoot td {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Laporan donasi</h1>
    <table>
        <thead>
            <tr>
                <th>Nama </th>
                <th>Jumlah Donasi</th>
                <th>Nomor Hp</th>
                <th>Tanggal Donasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donations as $donasi)
                <tr>
                    <td>{{ $donasi->nama }}</td>
                    <td>Rp{{ number_format($donasi->donation_amount, 0, ',', '.') }}</td>
                    <td>{{ $donasi->phone }}</td>
                    <td>{{ $donasi->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="1">Total:</td>
                <td>Rp{{ number_format($totaldonasi, 0, ',', '.') }}</td>
                <td colspan="3"></td> <!-- Empty cells for alignment -->
            </tr>
        </tfoot>
    </table>
</body>
</html>
