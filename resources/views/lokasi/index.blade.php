<style>/* ===========================
   TOMBOL AKSI
=========================== */

.aksi{
    display:flex;
    gap:10px;
    align-items:center;
}

.aksi .btn{
    width:36px;
    height:36px;
    padding:0;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:.25s ease;
    box-shadow:none !important;
}

/* ================= EDIT ================= */

.aksi .btn-warning{
    background:#FFC107 !important;
    border:1.5px solid #FFC107 !important;
}

.aksi .btn-warning i{
    color:#000 !important;
    font-size:14px;
}

.aksi .btn-warning:hover{
    background:#e0a800 !important;
    border-color:#e0a800 !important;
    transform:scale(1.05);
}

/* ================= HAPUS ================= */

.aksi .btn-danger{
    background:#fff !important;
    border:1.5px solid #ff4d5a !important;
}

.aksi .btn-danger i{
    color:#ff4d5a !important;
    font-size:14px;
}

.aksi .btn-danger:hover{
    background:#ff4d5a !important;
    border-color:#ff4d5a !important;
    transform:scale(1.05);
}

.aksi .btn-danger:hover i{
    color:#fff !important;
}
</style>
<x-main-layout :title-page="__('Lokasi')">

    <div class="content-card">

    {{-- Header --}}
   <div class="content-header mb-3">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bi bi-geo-alt-fill text-warning me-2"></i>

                Daftar Lokasi

            </h4>

            <small class="text-muted">

                Kelola data lokasi penyimpanan barang.

            </small>

        </div>

    </div>

    {{-- Toolbar --}}
    <div class="content-body">

        @include('lokasi.partials.toolbar')

        <x-notif-alert class="mt-4"/>

    </div>

    {{-- Table --}}
    <div class="table-responsive">

        @include('lokasi.partials.list-lokasi')

    </div>

    {{-- Footer --}}
    <div class="content-footer d-flex justify-content-end align-items-center py-3 px-4">

        {{ $lokasis->links() }}

    </div>

</div>

<x-modal-delete/>

</x-main-layout>