@extends('layouts.template')

@section('csstambahan')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


@section('konten')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jumlah Donasi</th>
                    <th>Tipe Pembayaran</th>
                    <th>Pesan Donasi</th>
                    <th>Verify</th>
                    <th>Bukti Pembayaran</th>
                    <th>Tanggal Masuk Data</th>
                    <th>Tanggal Update Data</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donate)
                    <tr>
                        <td>{{ $donate->nama }}</td>
                        <td>{{ $donate->email }}</td>
                        <td>{{ $donate->donation_amount }}</td>
                        <td>{{ $donate->donation_type }}</td>
                        <td>{{ $donate->donation_message }}</td>
                        <td>{{ $donate->is_verify }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $donate->payment_proof) }}"
                                alt="Bukti Pembayaran" style="width:100px; height:auto;">
                        </td>
                        <td>{{ $donate->created_at }}</td>
                        <td>{{ $donate->updated_at }}</td>
                        <td>
                            <!-- Tombol Show -->
                            <a href="{{ route('donations.show', $donate->id) }}"
                                class="btn btn-outline-info">Show</a>

                            <!-- Tombol Edit -->
                            <a href="{{ route('donations.edit', $donate->id) }}"
                                class="btn btn-outline-primary">Edit</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('donations.destroy', $donate->id) }}"
                                method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jumlah Donasi</th>
                    <th>Tipe Pembayaran</th>
                    <th>Pesan Donasi</th>
                    <th>Verify</th>
                    <th>Bukti Pembayaran</th>
                    <th>Tanggal Masuk Data</th>
                    <th>Tanggal Update Data</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

@section('jstambahan')
<!-- DataTables & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this data?');
    }

</script>
@endsection
