<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\LaporanPerbaikan;
use Illuminate\Support\Facades\Auth;

class LaporanPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ==========================
        // HALAMAN ADMIN
        // ==========================
        if (Auth::user()->hasRole('admin')) {

            $laporan = LaporanPerbaikan::with(['barang', 'user'])
                ->latest()
                ->paginate(10);

            return view('laporan-perbaikan.admin.index', compact('laporan'));
        }

        // ==========================
        // HALAMAN PETUGAS
        // ==========================
        $barang = Barang::where('kondisi', 'Rusak Ringan')
            ->where('jumlah', '>', 0)
            ->whereDoesntHave('laporanPerbaikans', function ($q) {
                $q->whereIn('status', [
                    'sedang_dilaporkan',
                    'sedang_diperbaiki',
                ]);
            })
            ->with(['lokasi', 'kategori'])
            ->orderBy('nama_barang')
            ->get();

        $laporan = LaporanPerbaikan::with('barang')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('laporan-perbaikan.petugas.index', compact(
            'barang',
            'laporan'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id'       => 'required|exists:barangs,id',
            'jenis_kerusakan' => 'required|string|max:255',
            'keterangan'      => 'nullable|string|max:1000',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        $cekLaporan = LaporanPerbaikan::where('barang_id', $barang->id)
            ->whereIn('status', [
                'sedang_dilaporkan',
                'sedang_diperbaiki'
            ])
            ->exists();

        if ($cekLaporan) {
            return back()
                ->withInput()
                ->with('error', 'Barang ini sudah dilaporkan dan sedang diproses admin.');
        }

        LaporanPerbaikan::create([
            'barang_id'             => $barang->id,
            'user_id'               => Auth::id(),
            'jumlah_dilaporkan'     => $barang->jumlah,
            'jenis_kerusakan'       => $request->jenis_kerusakan,
            'keterangan'            => $request->keterangan,
            'status'                => 'sedang_dilaporkan',
            'jumlah_berhasil'       => 0,
            'jumlah_tidak_berhasil' => 0,
            'tanggal_lapor'         => now(),
        ]);

        return redirect()
            ->route('laporan-perbaikan.index')
            ->with('success', 'Laporan berhasil dikirim ke admin.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPerbaikan $laporan)
    {
        $laporan->load([
            'barang.kategori',
            'barang.lokasi',
            'user',
        ]);

        return view('admin.perbaikan.show', compact('laporan'));
    }

    /**
     * Detail laporan.
     */
    public function detail(LaporanPerbaikan $laporan)
    {
        $laporan->load([
            'barang.kategori',
            'barang.lokasi',
            'user',
        ]);

        return view('laporan-perbaikan.detail', compact('laporan'));
    }

    /**
     * Mulai perbaikan.
     */
    public function mulai(LaporanPerbaikan $laporan)
    {
        if ($laporan->status == 'sedang_dilaporkan') {

            $laporan->update([
                'status' => 'sedang_diperbaiki',
            ]);
        }

        return redirect()
            ->route('laporan-perbaikan.detail', $laporan)
            ->with('success', 'Perbaikan berhasil dimulai.');
    }

    /**
     * Selesaikan perbaikan.
     */
   public function selesai(Request $request, LaporanPerbaikan $laporan)
{
    $request->validate([
        'status' => 'required|in:berhasil,gagal',
    ]);

    $barang = Barang::findOrFail($laporan->barang_id);

    if ($request->status == 'berhasil') {

        $laporan->update([
            'status' => 'berhasil_diperbaiki',
            'tanggal_selesai' => now(),
        ]);

        $barang->update([
            'kondisi' => 'Baik',
        ]);

    } else {

        $laporan->update([
            'status' => 'tidak_berhasil_diperbaiki',
            'tanggal_selesai' => now(),
        ]);

        $barang->update([
            'kondisi' => 'Rusak Berat',
        ]);

    }

    return redirect()
        ->route('laporan-perbaikan.detail', $laporan)
        ->with('success', 'Status perbaikan berhasil diperbarui.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}