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
    <h1>Laporan Pengeluaran</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Pengeluaran</th>
                <th>Jumlah Pengeluaran</th>
                <th>Tanggal Pengeluaran</th>
                <th>Nama Kegiatan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengeluarans as $pengeluaran)
                <tr>
                    <td>{{ $pengeluaran->nama_pengeluaran }}</td>
                    <td>Rp{{ number_format($pengeluaran->jumlah_pengeluaran, 0, ',', '.') }}</td>
                    <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                    <td>{{ $pengeluaran->kegiatan ? $pengeluaran->kegiatan->nama_kegiatan : 'N/A' }}</td>
                    <td>{{ $pengeluaran->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="1">Total:</td>
                <td>Rp{{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
                <td colspan="3"></td> <!-- Empty cells for alignment -->
            </tr>
        </tfoot>
    </table>
</body>
</html>
