<style>
    /* ==========================================
   HALAMAN BARANG
========================================== */

body{
    background:#fffaf5;
}

/* ==========================
   CARD UTAMA
========================== */

.page-card{
    background:#fff;
    border-radius:22px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

/* ==========================
   JUDUL
========================== */

.page-title{
    display:flex;
    align-items:center;
    gap:12px;

    font-size:38px;
    font-weight:800;
    color:#1f2937;

    margin-bottom:8px;
}

.page-title i{
    color:#ff9800;
}

.page-subtitle{
    color:#777;
    font-size:16px;
    margin-bottom:25px;
}

/* ==========================
   TOMBOL
========================== */

.btn-primary{
    background:#ff9800;
    border:none;
    border-radius:12px;
    font-weight:600;
    padding:10px 20px;
    transition:.3s;
}

.btn-primary:hover{
    background:#ef6c00;
    transform:translateY(-2px);
}

.btn-success{
    border:none;
    border-radius:12px;
    font-weight:600;
    padding:10px 20px;
    transition:.3s;
}

.btn-success:hover{
    transform:translateY(-2px);
}

/* ==========================
   SEARCH
========================== */

.input-group-text{
    background:#fff4e8;
    color:#ff9800;
    border:1px solid #e5e7eb;
    border-right:none;
    border-radius:14px 0 0 14px;
}

.form-control{
    height:50px;
    border:1px solid #e5e7eb;
    border-left:none;
    border-radius:0 14px 14px 0;
}

.form-control:focus{
    border-color:#ff9800;
    box-shadow:0 0 0 .2rem rgba(255,152,0,.15);
}

/* ==========================
   TABEL
========================== */

.table{
    margin-top:20px;
    margin-bottom:0;
}

.table thead th{
    background:#fff7ed;
    color:#444;
    font-weight:700;
    border:none;
    padding:16px;
}

.table tbody td{
    padding:16px;
    vertical-align:middle;
    border-color:#f3f4f6;
}

.table tbody tr{
    transition:.25s;
}

.table tbody tr:hover{
    background:#fffaf5;
}

/* ==========================
   BADGE
========================== */

.badge{
    border-radius:50px;
    padding:6px 12px;
    font-size:12px;
    font-weight:600;
}

.bg-secondary{
    background:#fff4e8 !important;
    color:#ff9800 !important;
}

/* ==========================
   KONDISI
========================== */

.bg-success{
    background:#16a34a !important;
}

.bg-warning{
    background:#eab308 !important;
    color:#fff !important;
}

.bg-danger{
    background:#dc2626 !important;
}

/* ==========================
   AKSI
========================== */

.btn-action{
    width:38px;
    height:38px;
    border-radius:50%;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    transition:.3s;
}

.btn-action:hover{
    transform:translateY(-3px);
}

/* ==========================
   PAGINATION
========================== */

.pagination{
    margin-top:25px;
}

.page-link{
    color:#ff9800;
    border-radius:10px !important;
    margin:0 3px;
}

.page-item.active .page-link{
    background:#ff9800;
    border-color:#ff9800;
    color:#fff;
}

.page-link:hover{
    background:#fff4e8;
    color:#ef6c00;
}

/* ==========================
   RESPONSIVE
========================== */

@media(max-width:768px){

    .page-card{
        padding:20px;
    }

    .page-title{
        font-size:30px;
    }

    .table{
        font-size:14px;
    }
    /* ==========================================
   PAGINATION
========================================== */

.pagination-wrapper{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:25px;
    flex-wrap:wrap;
    gap:15px;
}

.pagination-info{
    color:#6b7280;
    font-size:15px;
    font-weight:500;
}

.pagination{
    margin:0;
}

.pagination .page-item{
    margin:0 3px;
}

.pagination .page-link{
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px !important;
    border:1px solid #e5e7eb;
    color:#666;
    font-weight:600;
    transition:.25s;
}

.pagination .page-link:hover{
    background:#fff4e8;
    color:#ff9800;
    border-color:#ff9800;
}

.pagination .page-item.active .page-link{
    background:#ff9800;
    border-color:#ff9800;
    color:#fff;
}

.pagination .page-item.disabled .page-link{
    background:#f3f4f6;
    color:#9ca3af;
}

.content-footer{
    border-top:1px solid #f1f5f9;
    background:#fff;
}

.content-footer .pagination{
    margin:0;
}

.content-footer .page-link{
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px !important;
    margin:0 3px;
    border:1px solid #e5e7eb;
    color:#666;
}

.content-footer .page-item.active .page-link{
    background:#ff9800;
    border-color:#ff9800;
}

.content-footer .page-link:hover{
    background:#fff4e8;
    color:#ff9800;
}

/* Sembunyikan teks "Showing..." */
nav[role="navigation"] > div:first-child,
nav[role="navigation"] p{
    display:none !important;
}
}
</style>

<x-main-layout :title-page="'Data Barang'">

    <div class="content-card">

        {{-- Header --}}
        <div class="content-header mb-3">

            <div>

                <h4 class="fw-bold mb-1">

                    <i class="bi bi-box-seam-fill text-warning me-2"></i>

                    Daftar Barang

                </h4>

                <small class="text-muted">

                    Kelola data inventaris barang dengan mudah.

                </small>

            </div>

        </div>

        {{-- Toolbar --}}
        <div class="content-body">

            @include('barang.partials.toolbar')

            <x-notif-alert class="mt-4"/>

        </div>

        {{-- Table --}}
        <div class="table-responsive">

            @include('barang.partials.list-barang')

        </div>

        {{-- Footer --}}
        <div class="content-footer py-3 px-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div class="text-muted small">
                    Menampilkan {{ $barangs->firstItem() }}–{{ $barangs->lastItem() }}
                    dari {{ $barangs->total() }} data
                </div>

                {{ $barangs->links() }}

            </div>

        </div>

    </div>

    @include('components.modal-delete')

</x-main-layout>