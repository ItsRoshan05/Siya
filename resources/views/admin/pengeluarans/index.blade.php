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
        <h3 class="card-title">Data Pengeluaran</h3>
        <a href="{{ route('pengeluarans.create') }}" class="btn btn-primary float-right">Tambah
            Pengeluaran</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Pengeluaran</th>
                    <th>Nama Kegiatan</th>
                    <th>Jumlah Pengeluaran</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengeluarans as $pengeluaran)
                    <tr>
                        <td>{{ $pengeluaran->nama_pengeluaran }}</td>
                        <td>{{ $pengeluaran->kegiatan ? $pengeluaran->kegiatan->nama_kegiatan : 'Tidak ada kegiatan terkait' }}</td>
                        <td>{{ $pengeluaran->jumlah_pengeluaran }}</td>
                        <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                        <td>{{ $pengeluaran->keterangan }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('pengeluarans.edit', $pengeluaran->id) }}"
                                class="btn btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('pengeluarans.destroy', $pengeluaran->id) }}"
                                method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama Pengeluaran</th>
                    <th>Nama Kegiatan</th>
                    <th>Jumlah Pengeluaran</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>Keterangan</th>
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
