@extends('layouts.app')

@section('content')


<div class="content-header mb-4">

    <div>

        <h4 class="fw-bold mb-1">

            <i class="bi bi-tools text-warning me-2"></i>

            Daftar Laporan Masuk

        </h4>

        <small class="text-muted">

            Seluruh laporan kerusakan yang dikirim oleh petugas.

        </small>

    </div>

</div>

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th width="60">No</th>
                    <th>Barang</th>
                    <th>Pelapor</th>
                    <th class="text-center">Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal</th>
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

                                {{ $item->barang->kode_barang }}

                            </small>

                        </td>

                        <td>

                            {{ $item->user->name }}

                        </td>

                        <td class="text-center">

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


        @case('diperbaiki_sebagian')

            <span class="badge bg-info text-dark">
                Diperbaiki Sebagian
            </span>

        @break


        @default

            <span class="badge bg-secondary">
                {{ $item->status ?? 'Belum Ada Status' }}
            </span>

    @endswitch

</td>

</td>

                        <td>

                            {{ $item->tanggal_lapor->format('d M Y') }}

                        </td>

                       <td class="text-center">

    <a href="{{ route('laporan-perbaikan.detail', $item) }}"
       class="btn btn-outline-warning btn-sm">

        <i class="bi bi-eye"></i>

    </a>

</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-5">

                            <i class="bi bi-inbox fs-1 text-secondary"></i>

                            <div class="mt-2 text-muted">

                                Belum ada laporan masuk.

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-4">

        {{ $laporan->links() }}

    </div>

</div>

@endsection