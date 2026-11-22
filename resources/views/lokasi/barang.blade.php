<x-main-layout :title-page="__('Barang Lokasi')">

<div class="content-card">

    {{-- Header --}}
    <div class="content-header mb-3">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bi bi-box-seam text-primary me-2"></i>

                Barang di {{ $lokasi->nama_lokasi }}

            </h4>

            <small class="text-muted">
                Daftar barang yang tersimpan di lokasi ini.
            </small>

        </div>

    </div>

    {{-- Table --}}
    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($barangs as $index => $barang)

                <tr>

                    <td>{{ $index + 1 }}</td>

                    <td>{{ $barang->kode_barang }}</td>

                    <td>{{ $barang->nama_barang }}</td>

                    <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>

                    <td>{{ $barang->jumlah }}</td>

                    <td>
                        @if($barang->kondisi == 'Baik')

                            <span class="badge bg-success">
                                {{ $barang->kondisi }}
                            </span>

                        @elseif($barang->kondisi == 'Rusak Ringan')

                            <span class="badge bg-warning text-dark">
                                {{ $barang->kondisi }}
                            </span>

                        @elseif($barang->kondisi == 'Rusak Berat')

                            <span class="badge bg-danger">
                                {{ $barang->kondisi }}
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                {{ $barang->kondisi }}
                            </span>

                        @endif
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-5 text-muted">

                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>

                        Belum ada barang di lokasi ini.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    {{-- Tombol Kembali --}}
    <div class="d-flex justify-content-end mt-4">

        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">

            Kembali

            <i class="bi bi-arrow-right ms-1"></i>

        </a>

    </div>

</div>

</x-main-layout>