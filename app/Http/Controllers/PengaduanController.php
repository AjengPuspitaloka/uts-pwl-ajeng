<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;


class PengaduanController extends Controller
{
    // Tampilkan semua pengaduan
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'));
    }

    // Form tambah pengaduan
    public function create()
    {
        return view('pengaduan.create');
    }

    // Simpan pengaduan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'isi' => 'required|string'
        ]);

        Pengaduan::create([
            'nama' => $request->nama,
            'isi' => $request->isi,
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil ditambahkan!');
    }

    // Form edit pengaduan
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    // Update pengaduan
public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'nullable|string|max:255',
        'isi' => 'nullable|string',
        'status' => 'required|in:belum,sedang,selesai',
    ]);

    $pengaduan = Pengaduan::findOrFail($id);

    $pengaduan->update([
        'nama' => $request->nama ?? $pengaduan->nama,
        'isi' => $request->isi ?? $pengaduan->isi,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Status pengaduan berhasil diperbarui.');
}

    // Hapus pengaduan
   public function destroy(Pengaduan $pengaduan)
{
    $pengaduan->delete();
    return redirect()->route('pengaduan.index');
}

}
