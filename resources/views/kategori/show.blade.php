<x-main-layout :title-page="__('Detail Kategori')">

    <div class="content-card">

        {{-- Header --}}
        <div class="content-header mb-4">

            <div>

                <h4 class="fw-bold mb-1">
                    <i class="bi bi-tags-fill text-warning me-2"></i>
                    {{ $kategori->nama_kategori }}
                </h4>

                <small class="text-muted">
                    Daftar barang pada kategori ini.
                </small>

            </div>

        </div>

        {{-- Content --}}
        <div class="content-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Lokasi</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($kategori->barang as $index => $barang)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>{{ $barang->kode_barang }}</td>

                                <td>{{ $barang->nama_barang }}</td>

                                <td>{{ $barang->lokasi->nama_lokasi ?? '-' }}</td>

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

                                    <i class="bi bi-box-seam fs-1 d-block mb-2"></i>

                                    Belum ada barang pada kategori ini.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Tombol Kembali --}}
            <div class="d-flex justify-content-end mt-4">

                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">

                    Kembali

                    <i class="bi bi-arrow-right ms-1"></i>

                </a>

            </div>

        </div>

    </div>

</x-main-layout>