<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        // Mengambil data user dengan jabatan donatur
        $donaturs = User::where('jabatan', 'donatur')->get();
        return view('admin.donaturs.index', compact('donaturs'));
    }

    public function create()
    {
        return view('donaturs.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Membuat user dengan jabatan donatur
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jabatan' => 'donatur',
        ]);

        return redirect()->route('donaturs.index')->with('success', 'Donatur berhasil ditambahkan.');
    }

    public function edit(User $donatur)
    {
        return view('donaturs.edit', compact('donatur'));
    }

    public function update(Request $request, User $donatur)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $donatur->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update data donatur
        $donatur->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $donatur->password,
        ]);

        return redirect()->route('donaturs.index')->with('success', 'Donatur berhasil diperbarui.');
    }

    public function destroy(User $donatur)
    {
        $donatur->delete();

        return redirect()->route('donaturs.index')->with('success', 'Donatur berhasil dihapus.');
    }
}
