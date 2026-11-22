@extends('layouts.app')

@section('content')

<div class="content-card">

    <div class="content-header mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-tools text-warning me-2"></i>
                Lapor Barang Rusak
            </h3>

            <small class="text-muted">
                Laporkan barang dengan kondisi <strong>Rusak Ringan</strong> kepada admin untuk diproses.
            </small>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <div class="card shadow-sm border-0 rounded-4 mb-4">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">
                <i class="bi bi-clipboard-plus text-warning me-2"></i>
                Form Laporan
            </h5>

            <form action="{{ route('laporan-perbaikan.store') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Pilih Barang
                    </label>

                    <select
                        id="barangSelect"
                        name="barang_id"
                        class="form-select py-2"
                        required>

                        <option value="">
                            -- Pilih Barang --
                        </option>

                        @foreach($barang as $item)

                            <option
                                value="{{ $item->id }}"
                                data-kode="{{ $item->kode_barang }}"
                                data-lokasi="{{ $item->lokasi->nama_lokasi }}"
                                data-kategori="{{ $item->kategori->nama_kategori }}"
                                data-jumlah="{{ $item->jumlah }}">

                                {{ $item->nama_barang }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div
                    id="infoBarang"
                    class="card bg-light border-0 rounded-4 mb-4 d-none">

                    <div class="card-body">

                        <h6 class="fw-bold mb-3">
                            <i class="bi bi-box-seam text-warning me-2"></i>
                            Informasi Barang
                        </h6>

                        <div class="row">

                            <div class="col-md-3 mb-3">

                                <small class="text-muted">
                                    Kode Barang
                                </small>

                                <div
                                    class="fw-semibold"
                                    id="kodeBarang">
                                    -
                                </div>

                            </div>

                            <div class="col-md-3 mb-3">

                                <small class="text-muted">
                                    Lokasi
                                </small>

                                <div
                                    class="fw-semibold"
                                    id="lokasiBarang">
                                    -
                                </div>

                            </div>

                            <div class="col-md-3 mb-3">

                                <small class="text-muted">
                                    Kategori
                                </small>

                                <div
                                    class="fw-semibold"
                                    id="kategoriBarang">
                                    -
                                </div>

                            </div>

                            <div class="col-md-3 mb-3">

                                <small class="text-muted">
                                    Rusak Ringan
                                </small>

                                <div
                                    class="fw-bold text-warning"
                                    id="jumlahBarang">
                                    -
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">



                    <div class="col-12">

    <div class="mb-4">

        <label class="form-label fw-semibold">
            Jenis Kerusakan
        </label>

        <input
            type="text"
            name="jenis_kerusakan"
            class="form-control py-2"
            placeholder="Contoh : Baut patah, Keyboard rusak, Layar retak..."
            required>

    </div>

</div>
                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="5"
                        class="form-control"
                        placeholder="Tambahkan informasi mengenai kerusakan barang..."></textarea>

                </div>

                <div class="text-end">

                    <button
                        type="submit"
                        class="btn btn-warning px-5 py-2 fw-semibold">

                        <i class="bi bi-send me-2"></i>

                        Kirim Laporan

                    </button>

                </div>

            </form>

        </div>

    </div>

    {{-- RIWAYAT --}}
    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body">

            <h5 class="fw-bold mb-4">
                <i class="bi bi-clock-history text-warning me-2"></i>
                Riwayat Laporan Saya
            </h5>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                   <thead>

    <tr>

        <th width="60">No</th>
        <th>Barang</th>
        <th width="120">Jumlah</th>
        <th>Status</th>
        <th width="170">Tanggal</th>
        <th width="90" class="text-center">Aksi</th>

    </tr>

</thead>
                   <tbody>

    @forelse($laporan as $item)

        <tr>

            <td>
                {{ $loop->iteration + ($laporan->firstItem() - 1) }}
            </td>

            <td>

                <div class="fw-semibold">
                    {{ $item->barang->nama_barang }}
                </div>

                <small class="text-muted">
                    {{ $item->jenis_kerusakan }}
                </small>

            </td>

            <td>
                {{ $item->jumlah_dilaporkan }}
            </td>

            <td>

                @switch($item->status)

                    @case('sedang_dilaporkan')
                        <span class="badge bg-warning text-dark">
                            Sedang Dilaporkan
                        </span>
                    @break

                    @case('sedang_diperbaiki')
                        <span class="badge bg-primary">
                            Sedang Diperbaiki
                        </span>
                    @break

                    @case('berhasil_diperbaiki')
                        <span class="badge bg-success">
                            Berhasil Diperbaiki
                        </span>
                    @break

                    @case('tidak_berhasil_diperbaiki')
                        <span class="badge bg-danger">
                            Tidak Berhasil Diperbaiki
                        </span>
                    @break

                    @default
                        <span class="badge bg-secondary">
                            {{ $item->status ?? '-' }}
                        </span>

                @endswitch

            </td>

            <td>
                {{ $item->tanggal_lapor?->format('d M Y') }}
            </td>

            <td class="text-center">

                <a href="{{ route('laporan-perbaikan.detail', $item) }}"
                   class="btn btn-outline-warning btn-sm"
                   title="Lihat Detail">

                    <i class="bi bi-eye"></i>

                </a>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="6" class="text-center py-5">

                <i class="bi bi-inbox fs-1 text-secondary d-block mb-2"></i>

                <span class="text-muted">

                    Belum ada laporan yang dikirim.

                </span>

            </td>

        </tr>

    @endforelse

</tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $laporan->links() }}

            </div>

        </div>

    </div>

</div>

<script>

const barangSelect = document.getElementById('barangSelect');
const infoBarang = document.getElementById('infoBarang');

barangSelect.addEventListener('change', function () {

    if(this.value === ''){

        infoBarang.classList.add('d-none');
        return;

    }

    const option = this.options[this.selectedIndex];

    document.getElementById('kodeBarang').innerText = option.dataset.kode;
    document.getElementById('lokasiBarang').innerText = option.dataset.lokasi;
    document.getElementById('kategoriBarang').innerText = option.dataset.kategori;
    document.getElementById('jumlahBarang').innerText = option.dataset.jumlah;

    infoBarang.classList.remove('d-none');

});

</script>

@endsection