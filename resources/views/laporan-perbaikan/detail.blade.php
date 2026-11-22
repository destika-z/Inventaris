@extends('layouts.app')

@section('content')

<div class="content-header mb-4">
    <div>
        <h4 class="fw-bold mb-1">
            <i class="bi bi-tools text-warning me-2"></i>
            Detail Laporan Perbaikan
        </h4>

        <small class="text-muted">
            Informasi lengkap laporan kerusakan barang.
        </small>
    </div>
</div>

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-4">

        <div class="row g-4">

            <!-- Barang & Kode Barang -->
            <div class="col-md-6">
                <label class="text-muted small">Barang</label>

                <div class="fw-semibold fs-5">
                    {{ $laporan->barang->nama_barang }}
                </div>
            </div>

            <div class="col-md-6">
                <label class="text-muted small">Kode Barang</label>

                <div class="fw-semibold">
                    {{ $laporan->barang->kode_barang }}
                </div>
            </div>

            <div class="col-12">
                <hr class="my-0">
            </div>

            <!-- Kategori & Lokasi -->
            <div class="col-md-6">
                <label class="text-muted small">Kategori</label>

                <div class="fw-semibold">
                    {{ $laporan->barang->kategori->nama_kategori }}
                </div>
            </div>

            <div class="col-md-6">
                <label class="text-muted small">Lokasi</label>

                <div class="fw-semibold">
                    {{ $laporan->barang->lokasi->nama_lokasi }}
                </div>
            </div>

            <div class="col-12">
                <hr class="my-0">
            </div>

            <!-- Pelapor & Tanggal -->
            <div class="col-md-6">
                <label class="text-muted small">Pelapor</label>

                <div class="fw-semibold">
                    {{ $laporan->user->name }}
                </div>
            </div>

            <div class="col-md-6">
                <label class="text-muted small">Tanggal Lapor</label>

                <div class="fw-semibold">
                    {{ $laporan->tanggal_lapor->format('d M Y H:i') }}
                </div>
            </div>

            <div class="col-12">
                <hr class="my-0">
            </div>

            <!-- Jumlah Rusak & Jenis Kerusakan -->
            <div class="col-md-6">
                <label class="text-muted small">Jumlah Rusak</label>

                <div class="fw-bold fs-5 text-warning">
                    {{ $laporan->jumlah_dilaporkan }}
                </div>
            </div>

            <div class="col-md-6">
                <label class="text-muted small">Jenis Kerusakan</label>

                <div class="fw-semibold">
                    {{ $laporan->jenis_kerusakan }}
                </div>
            </div>

            <div class="col-12">
                <hr class="my-0">
            </div>

            <!-- Keterangan -->
            <div class="col-12">
                <label class="text-muted small">Keterangan</label>

                <div class="border rounded-3 p-3 bg-light">
                    {{ $laporan->keterangan ?: '-' }}
                </div>
            </div>

            <div class="col-12">
                <hr class="my-0">
            </div>

            <!-- Status -->
           <div class="col-12">

    <label class="text-muted small">
        Status
    </label>

    <div class="mt-2">

        @switch($laporan->status)

            @case('sedang_dilaporkan')
                <span class="badge bg-warning text-dark px-3 py-2">
                    Sedang Dilaporkan
                </span>
            @break


            @case('sedang_diperbaiki')
                <span class="badge bg-primary px-3 py-2">
                    Sedang Diperbaiki
                </span>
            @break


            @case('berhasil_diperbaiki')
                <span class="badge bg-success px-3 py-2">
                    Berhasil Diperbaiki
                </span>
            @break


            @case('tidak_berhasil_diperbaiki')
                <span class="badge bg-danger px-3 py-2">
                    Tidak Berhasil Diperbaiki
                </span>
            @break


            @default
                <span class="badge bg-secondary px-3 py-2">
                    Status Tidak Diketahui
                </span>

        @endswitch

    </div>

</div>

        </div>

        <hr class="my-4">

        <div class="d-flex justify-content-between align-items-center">

            <a href="{{ route('laporan-perbaikan.index') }}"
               class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali
            </a>

            <div>

    @role('admin')

        @if($laporan->status == 'sedang_dilaporkan')

            <form action="{{ route('laporan-perbaikan.mulai', $laporan) }}"
                  method="POST"
                  class="d-inline">

                @csrf
                @method('PATCH')

                <button type="submit"
                        class="btn btn-primary rounded-pill px-4">

                    <i class="bi bi-tools me-2"></i>
                    Mulai Perbaikan

                </button>

            </form>

        @elseif($laporan->status == 'sedang_diperbaiki')

            <div class="d-flex gap-2">

                <form action="{{ route('laporan-perbaikan.selesai', $laporan) }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <input type="hidden"
                           name="status"
                           value="berhasil">

                    <button type="submit"
                            class="btn btn-success px-4">

                        Berhasil

                    </button>

                </form>

                <form action="{{ route('laporan-perbaikan.selesai', $laporan) }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <input type="hidden"
                           name="status"
                           value="gagal">

                    <button type="submit"
                            class="btn btn-outline-danger px-4">

                        Tidak Berhasil

                    </button>

                </form>

            </div>

        @endif

    @endrole

</div>

         

        </div>

    </div>
</div>

@endsection