<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Storage;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('admin.donations.index', compact('donations'));
    }

    public function create()
    {
        return view('admin.donations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'donation_amount' => 'required|numeric',
            'donation_type' => 'required|string',
            'payment_proof' => 'required|file|max:2048|mimes:jpg,png,pdf',
        ]);

        // Simpan bukti pembayaran
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        // Buat data donasi
        Donation::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'donation_amount' => $request->donation_amount,
            'donation_type' => $request->donation_type,
            'donation_message' => $request->donation_message,
            'anonymous' => $request->has('anonymous'),
            'payment_proof' => $paymentProofPath,
        ]);

        return redirect()->route('donations.index')->with('success', 'Donasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $donation = Donation::findOrFail($id);
        return view('admin.donations.show', compact('donation'));
    }

    public function edit($id)
    {
        $donation = Donation::findOrFail($id);
        return view('admin.donations.edit', compact('donation'));
    }

    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'donation_amount' => 'required|numeric',
            'donation_type' => 'required|string',
            'payment_proof' => 'file|max:2048|mimes:jpg,png,pdf',
        ]);

        $donation->nama = $request->nama;
        $donation->email = $request->email;
        $donation->donation_amount = $request->donation_amount;
        $donation->donation_type = $request->donation_type;
        $donation->donation_message = $request->donation_message;
        $donation->anonymous = $request->has('anonymous');

        // Update bukti pembayaran jika ada file baru
        if ($request->hasFile('payment_proof')) {
            // Hapus file lama
            Storage::disk('public')->delete($donation->payment_proof);
            // Simpan file baru
            $donation->payment_proof = $request->file('payment_proof')->store('payment_proofs', 'public');
        }

        $donation->save();

        return redirect()->route('donations.index')->with('success', 'Donasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        Storage::disk('public')->delete($donation->payment_proof);
        $donation->delete();

        return redirect()->route('donations.index')->with('success', 'Donasi berhasil dihapus.');
    }

    public function toggleVerification(Request $request)
    {
    $donation = Donation::findOrFail($request->id);
    $donation->is_verify = $request->is_verify;
    $donation->save();

    return response()->json(['message' => 'Status verifikasi berhasil diperbarui.']);
    }

    public function laporanDonasi(Request $request){
       // Cek apakah tanggal sudah dipilih
       if ($request->has('start_date') && $request->has('end_date')) {
        // Validasi input tanggal
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Ambil data pengeluaran berdasarkan rentang tanggal
        $donations = Donation::whereBetween('created_at', [$request->start_date, $request->end_date])->get();
    } else {
        $donations = collect(); 
    }        
        return view('admin.donations.laporan_donation', compact('donations'));
    }

    public function exportPDF(Request $request)
{
    $donations = Donation::with('kegiatan')
        ->whereBetween('created_at', [$request->start_date, $request->end_date])
        ->get();

    // Calculate total amount
    $totaldonasi = $donations->sum('donation_amount');

    $pdf = \PDF::loadView('admin.donations.export_pdf', compact('donations', 'totaldonasi'))
        ->setPaper('A4', 'landscape');

    return $pdf->download('Laporan_donasi.pdf');
}


    // Export to Excel
    public function exportExcel(Request $request)
    {
        // Validasi tanggal
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
    
        // Memanggil export
        return Excel::download(new PengeluaranExport($request->start_date, $request->end_date), 'laporan_pengeluaran.xlsx');
    }
    
}
