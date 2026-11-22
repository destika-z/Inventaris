<style>
<style>

/* ===========================
   DETAIL BARANG
=========================== */

.content-card{
    background:#fff;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    overflow:hidden;
}

.content-header{
    padding:24px 30px;
    border-bottom:1px solid #f1f1f1;
    background:linear-gradient(135deg,#fff8ef,#ffffff);
}

.content-body{
    padding:30px;
}

/* Gambar */

.detail-image{
    width:100%;
    height:380px;
    object-fit:contain;
    background:#fffaf3;
    border:2px solid #ffe5c4;
    border-radius:18px;
    padding:20px;
    transition:.3s;
}

.detail-image:hover{
    transform:scale(1.02);
}

/* Table */

.detail-table{
    width:100%;
    border-collapse:separate;
    border-spacing:0 12px;
}

.detail-table th{
    width:240px;
    background:#fff4e7;
    color:#ff8c00;
    padding:15px 18px;
    font-weight:700;
    border-radius:12px 0 0 12px;
}

.detail-table td{
    background:#fff;
    padding:15px 18px;
    border-radius:0 12px 12px 0;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
}

/* Badge kondisi */

.badge-baik{
    background:#16a34a;
    color:#fff;
    border-radius:50px;
    padding:6px 14px;
}

.badge-ringan{
    background:#f59e0b;
    color:#fff;
    border-radius:50px;
    padding:6px 14px;
}

.badge-berat{
    background:#dc2626;
    color:#fff;
    border-radius:50px;
    padding:6px 14px;
}

/* Tombol */

.btn-warning{
    background:#ff9800;
    border:none;
}

.btn-warning:hover{
    background:#f57c00;
}

</style>

</style>
<x-main-layout :title-page="'Detail Barang'">

<div class="content-card">

    <div class="content-header">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bi bi-box text-primary me-2"></i>

                Detail Barang

            </h4>

            <small class="text-muted">

                Informasi lengkap barang inventaris.

            </small>

        </div>

    </div>

    <div class="content-body">

        <div class="row g-5">

            <div class="col-lg-4">

                @include('barang.partials.info-gambar-barang')

            </div>

            <div class="col-lg-8">

                @include('barang.partials.info-data-barang')

            </div>

        </div>

        <div class="mt-5">

            <a href="{{ route('barang.edit',$barang->id) }}"
               class="btn btn-warning rounded-pill px-4">

                <i class="bi bi-pencil-square me-2"></i>

                Edit

            </a>

            <x-tombol-kembali :href="route('barang.index')"/>

        </div>

    </div>

</div>

</x-main-layout>