@extends('layouts.app')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <a href="{{ route('laporan-perbaikan.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Kembali

        </a>

        @switch($laporan->status)

            @case('sedang_dilaporkan')

                <span class="badge bg-warning text-dark fs-6">

                    Menunggu

                </span>

            @break

            @case('sedang_diperbaiki')

                <span class="badge bg-primary fs-6">

                    Sedang Diperbaiki

                </span>

            @break

            @case('berhasil')

                <span class="badge bg-success fs-6">

                    Berhasil

                </span>

            @break

            @case('sebagian')

                <span class="badge bg-info text-dark fs-6">

                    Sebagian

                </span>

            @break

            @case('gagal')

                <span class="badge bg-danger fs-6">

                    Gagal

                </span>

            @break

        @endswitch

    </div>

    <div class="content-header mb-4">

        <h4 class="fw-bold">

            <i class="bi bi-tools text-warning me-2"></i>

            Detail Laporan Perbaikan

        </h4>

    </div>

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="text-muted small">

                Barang

            </label>

            <div class="fw-semibold">

                {{ $laporan->barang->nama_barang }}

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <label class="text-muted small">

                Pelapor

            </label>

            <div class="fw-semibold">

                {{ $laporan->user->name }}

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <label class="text-muted small">

                Kode Barang

            </label>

            <div class="fw-semibold">

                {{ $laporan->barang->kode_barang }}

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <label class="text-muted small">

                Kategori

            </label>

            <div class="fw-semibold">

                {{ $laporan->barang->kategori->nama_kategori }}

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <label class="text-muted small">

                Lokasi

            </label>

            <div class="fw-semibold">

                {{ $laporan->barang->lokasi->nama_lokasi }}

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <label class="text-muted small">

                Jumlah Dilaporkan

            </label>

            <div class="fw-bold text-warning">

                {{ $laporan->jumlah_dilaporkan }}

            </div>

        </div>

    </div>

    <hr>

    <div class="mb-4">

        <label class="text-muted small">

            Jenis Kerusakan

        </label>

        <div class="fw-semibold">

            {{ $laporan->jenis_kerusakan }}

        </div>

    </div>

    <div class="mb-4">

        <label class="text-muted small">

            Keterangan

        </label>

        <div>

            {{ $laporan->keterangan ?: '-' }}

        </div>

    </div>

    <hr>

    @if($laporan->status=='sedang_dilaporkan')

        <div class="text-end">

            <button
                class="btn btn-primary">

                <i class="bi bi-play-fill me-2"></i>

                Mulai Perbaikan

            </button>

        </div>

    @endif

</div>

@endsection