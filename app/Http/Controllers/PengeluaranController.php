<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use PDF; // Aliases for Snappy PDF
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengeluaranExport;;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::with('kegiatan')->get(); // Include kegiatan data
        return view('admin.pengeluarans.index', compact('pengeluarans'));
    }

    public function create()
    {
        $kegiatans = Kegiatan::all(); // Get all kegiatan for the dropdown
        return view('admin.pengeluarans.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kegiatan_id' => 'nullable|exists:kegiatans,id', // Validate kegiatan_id exists
            'nama_pengeluaran' => 'required|string|max:255',
            'jumlah_pengeluaran' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data pengeluaran
        Pengeluaran::create([
            'kegiatan_id' => $request->kegiatan_id, // Relate to kegiatan
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('admin.pengeluarans.show', compact('pengeluaran'));
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('admin.pengeluarans.edit', compact('pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengeluaran' => 'required|string|max:255',
            'jumlah_pengeluaran' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->update($request->all());

        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil dihapus.');
    }

    public function laporanPengeluaran(Request $request)
    {
        // Cek apakah tanggal sudah dipilih
        if ($request->has('start_date') && $request->has('end_date')) {
            // Validasi input tanggal
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            // Ambil data pengeluaran berdasarkan rentang tanggal
            $pengeluarans = Pengeluaran::whereBetween('tanggal_pengeluaran', [$request->start_date, $request->end_date])->get();
        } else {
            $pengeluarans = collect(); 
        }

        return view('admin.pengeluarans.laporan_pengeluaran', compact('pengeluarans'));
    }

    
// Export to PDF
// Export to PDF
public function exportPDF(Request $request)
{
    $pengeluarans = Pengeluaran::with('kegiatan')
        ->whereBetween('tanggal_pengeluaran', [$request->start_date, $request->end_date])
        ->get();

    // Calculate total amount
    $totalPengeluaran = $pengeluarans->sum('jumlah_pengeluaran');

    $pdf = \PDF::loadView('admin.pengeluarans.export_pdf', compact('pengeluarans', 'totalPengeluaran'))
        ->setPaper('A4', 'landscape');

    return $pdf->download('laporan_pengeluaran.pdf');
}



    // Export to Excel
    public function exportExcel(Request $request)
    {
        return Excel::download(new PengeluaranExport($request->start_date, $request->end_date), 'laporan_pengeluaran.xlsx');
    }
}
