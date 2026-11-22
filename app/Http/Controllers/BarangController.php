<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('permission:manage barang', except: ['destroy']),
            new Middleware('permission:delete barang', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $barangs = Barang::with(['kategori', 'lokasi'])
            ->when($search, function ($query, $search) {
                $query->where('nama_barang', 'like', '%' . $search . '%')
                      ->orWhere('kode_barang', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();

        $barang = new Barang();

        return view('barang.create', compact('barang', 'kategori', 'lokasi'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'kode_barang' => [
            'required',
            'string',
            'max:50',
            'unique:barangs,kode_barang',
            'regex:/^[A-Za-z0-9]+$/',
        ],

        'nama_barang' => [
            'required',
            'string',
            'max:150',
            'regex:/^(?=.*[A-Za-z])[A-Za-z0-9\s.,()\-\/]+$/',
        ],

        'kategori' => auth()->user()->hasRole('admin')
            ? 'required|string|max:100'
            : 'nullable|string|max:100',

        'kategori_id' => auth()->user()->hasRole('petugas')
            ? 'required|exists:kategoris,id'
            : 'nullable',

        'lokasi_id' => 'required|exists:lokasis,id',
        'jumlah' => 'required|integer|min:0',

        'satuan' => [
            'required',
            'string',
            'max:20',
            'regex:/^[A-Za-z\s]+$/',
        ],

        'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        'tanggal_pengadaan' => 'required|date',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

    ], [

        'kode_barang.required' => 'Kode barang wajib diisi.',
        'kode_barang.unique' => 'Kode barang sudah digunakan.',
        'kode_barang.max' => 'Kode barang maksimal 50 karakter.',
        'kode_barang.regex' => 'Kode barang hanya boleh berisi huruf dan angka.',

        'nama_barang.required' => 'Nama barang wajib diisi.',
        'nama_barang.max' => 'Nama barang maksimal 150 karakter.',
        'nama_barang.regex' => 'Nama barang hanya boleh berisi huruf, angka, dan spasi. Karakter khusus tidak diperbolehkan.',

        'kategori.required' => 'Kategori wajib diisi.',
        'kategori.max' => 'Kategori maksimal 100 karakter.',

        'kategori_id.required' => 'Kategori wajib dipilih.',
        'kategori_id.exists' => 'Kategori tidak valid.',

        'lokasi_id.required' => 'Lokasi wajib dipilih.',
        'lokasi_id.exists' => 'Lokasi tidak valid.',

        'jumlah.required' => 'Jumlah barang wajib diisi.',
        'jumlah.integer' => 'Jumlah barang harus berupa angka.',
        'jumlah.min' => 'Jumlah barang tidak boleh kurang dari 0.',

        'satuan.required' => 'Satuan wajib diisi.',
        'satuan.max' => 'Satuan maksimal 20 karakter.',
        'satuan.regex' => 'Satuan hanya boleh berisi huruf.',

        'kondisi.required' => 'Kondisi barang wajib dipilih.',
        'kondisi.in' => 'Kondisi barang tidak valid.',

        'tanggal_pengadaan.required' => 'Tanggal pengadaan wajib diisi.',
        'tanggal_pengadaan.date' => 'Format tanggal pengadaan tidak valid.',

        'gambar.image' => 'File yang diunggah harus berupa gambar.',
        'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau GIF.',
        'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
    ]);


    $validated['kode_barang'] = strtoupper($validated['kode_barang']);
    $validated['nama_barang'] = ucwords(strtolower($validated['nama_barang']));


  // Upload gambar
if ($request->hasFile('gambar')) {

    $namaGambar = time() . '.' . $request->file('gambar')->getClientOriginalExtension();

    $request->file('gambar')->move(
        public_path('gambar-barang'),
        $namaGambar
    );

    $validated['gambar'] = $namaGambar;
}

if (auth()->user()->hasRole('admin')) {

    $kategori = Kategori::firstOrCreate([
        'nama_kategori' => ucwords(strtolower($request->kategori))
    ]);

    $validated['kategori_id'] = $kategori->id;

    unset($validated['kategori']);
}

$barang = new Barang();

$barang->kode_barang = $validated['kode_barang'];
$barang->nama_barang = $validated['nama_barang'];
$barang->kategori_id = $validated['kategori_id'];
$barang->lokasi_id = $validated['lokasi_id'];
$barang->jumlah = $validated['jumlah'];
$barang->satuan = $validated['satuan'];
$barang->kondisi = $validated['kondisi'];
$barang->tanggal_pengadaan = $validated['tanggal_pengadaan'];
$barang->gambar = $validated['gambar'] ?? null;

$barang->save();

return redirect()
    ->route('barang.index')
    ->with('success', 'Data barang berhasil ditambahkan.');
}

        public function show(Barang $barang)
    {
        $barang->load(['kategori', 'lokasi']);

        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();

        return view('barang.edit', compact('barang', 'kategori', 'lokasi'));
    }

  public function update(Request $request, Barang $barang)
{
    $validated = $request->validate([
        'kode_barang' => [
            'required',
            'string',
            'max:50',
            'unique:barangs,kode_barang,' . $barang->id,
            'regex:/^[A-Za-z0-9]+$/',
        ],

        'nama_barang' => [
            'required',
            'string',
            'max:150',
            'regex:/^(?=.*[A-Za-z])[A-Za-z0-9\s.,()\-\/]+$/',
        ],

        'kategori' => auth()->user()->hasRole('admin')
            ? 'required|string|max:100'
            : 'nullable|string|max:100',

        'kategori_id' => auth()->user()->hasRole('petugas')
            ? 'required|exists:kategoris,id'
            : 'nullable',

        'lokasi_id' => 'required|exists:lokasis,id',
        'jumlah' => 'required|integer|min:0',

        'satuan' => [
            'required',
            'string',
            'max:20',
            'regex:/^[A-Za-z\s]+$/',
        ],

        'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        'tanggal_pengadaan' => 'required|date',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

    ], [

        'kode_barang.required' => 'Kode barang wajib diisi.',
        'kode_barang.unique' => 'Kode barang sudah digunakan.',
        'kode_barang.max' => 'Kode barang maksimal 50 karakter.',
        'kode_barang.regex' => 'Kode barang hanya boleh berisi huruf dan angka.',

        'nama_barang.required' => 'Nama barang wajib diisi.',
        'nama_barang.max' => 'Nama barang maksimal 150 karakter.',
        'nama_barang.regex' => 'Nama barang hanya boleh berisi huruf, angka, dan spasi. Karakter khusus tidak diperbolehkan.',

        'kategori.required' => 'Kategori wajib diisi.',
        'kategori.max' => 'Kategori maksimal 100 karakter.',

        'kategori_id.required' => 'Kategori wajib dipilih.',
        'kategori_id.exists' => 'Kategori tidak valid.',

        'lokasi_id.required' => 'Lokasi wajib dipilih.',
        'lokasi_id.exists' => 'Lokasi tidak valid.',

        'jumlah.required' => 'Jumlah barang wajib diisi.',
        'jumlah.integer' => 'Jumlah barang harus berupa angka.',
        'jumlah.min' => 'Jumlah barang tidak boleh kurang dari 0.',

        'satuan.required' => 'Satuan wajib diisi.',
        'satuan.max' => 'Satuan maksimal 20 karakter.',
        'satuan.regex' => 'Satuan hanya boleh berisi huruf.',

        'kondisi.required' => 'Kondisi barang wajib dipilih.',
        'kondisi.in' => 'Kondisi barang tidak valid.',

        'tanggal_pengadaan.required' => 'Tanggal pengadaan wajib diisi.',
        'tanggal_pengadaan.date' => 'Format tanggal pengadaan tidak valid.',

        'gambar.image' => 'File yang diunggah harus berupa gambar.',
        'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau GIF.',
        'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
    ]);

    $validated['kode_barang'] = strtoupper($validated['kode_barang']);
    $validated['nama_barang'] = ucwords(strtolower($validated['nama_barang']));

    // Upload gambar baru
    if ($request->hasFile('gambar')) {

        // Hapus gambar lama jika ada
        if (
            $barang->gambar &&
            File::exists(public_path('gambar-barang/' . $barang->gambar))
        ) {
            File::delete(public_path('gambar-barang/' . $barang->gambar));
        }

        // Simpan gambar baru
        $namaGambar = time() . '.' . $request->gambar->extension();

        $request->gambar->move(
            public_path('gambar-barang'),
            $namaGambar
        );

        $validated['gambar'] = $namaGambar;
    }

    if (auth()->user()->hasRole('admin')) {

        $kategori = Kategori::firstOrCreate([
            'nama_kategori' => ucwords(strtolower($request->kategori))
        ]);

        $validated['kategori_id'] = $kategori->id;

        unset($validated['kategori']);
    }

    $barang->update($validated);

    return redirect()
        ->route('barang.index')
        ->with('success', 'Data barang berhasil diperbarui.');
}


        public function destroy(Barang $barang)
{
    if (
        $barang->gambar &&
        File::exists(public_path('gambar-barang/' . $barang->gambar))
    ) {
        File::delete(public_path('gambar-barang/' . $barang->gambar));
    }

    $barang->delete();

    return redirect()
        ->route('barang.index')
        ->with('success', 'Barang berhasil dihapus.');
}

    public function cetakLaporan()
    {
        $barangs = Barang::with(['kategori', 'lokasi'])->get();

        $data = [
            'title' => 'Laporan Data Barang Inventaris',
            'date' => date('d F Y'),
            'barangs' => $barangs,
        ];

        $pdf = Pdf::loadView('barang.laporan', $data);

        return $pdf->stream('laporan-inventaris-barang.pdf');
    }
}