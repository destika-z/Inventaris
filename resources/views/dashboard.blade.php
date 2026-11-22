<style>
/* ===========================
   DASHBOARD
=========================== */

body{
    background:#fffaf5;
}

/* Hero */
.dashboard-hero{
    background:linear-gradient(135deg,#ff9800,#ef6c00);
    border-radius:24px;
    padding:35px 40px;
    color:#fff;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    box-shadow:0 15px 35px rgba(255,152,0,.25);
}

.dashboard-hero h2{
    font-size:38px;
    font-weight:800;
    margin:0;
}

.dashboard-hero strong{
    color:#fff3c4;
}

.dashboard-hero p{
    font-size:16px;
}

.dashboard-hero .badge{
    border-radius:14px;
    font-size:15px;
    font-weight:600;
    color:#ff8a00 !important;
}

/* Card */
.content-card{
    background:#fff;
    border:none;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    transition:.3s;
}

.content-card:hover{
    transform:translateY(-5px);
    box-shadow:0 18px 40px rgba(255,152,0,.18);
}

.content-header{
    padding:22px 25px;
    border-bottom:1px solid #f3f4f6;
    background:#fffaf5;
}

.content-header h5{
    margin:0;
    font-size:24px;
    font-weight:700;
    color:#222;
}

.content-header small{
    color:#888;
}

.content-body{
    padding:25px;
}

/* Icon Judul */
.content-header i{
    color:#ff8a00 !important;
}

/* Table */
.table{
    margin-bottom:0;
}

.table thead{
    background:#fff4e8;
}

.table thead th{
    color:#ff8a00;
    font-weight:700;
    border:none;
}

.table tbody td{
    vertical-align:middle;
}

.table tbody tr:hover{
    background:#fffaf5;
}

/* Progress */
.progress{
    height:12px;
    border-radius:30px;
    background:#ececec;
    overflow:hidden;
}

/* Warna sesuai kondisi */
.progress-bar.bg-success{
    background:linear-gradient(90deg,#22c55e,#16a34a) !important;
}

.progress-bar.bg-warning{
    background:linear-gradient(90deg,#facc15,#eab308) !important;
}

.progress-bar.bg-danger{
    background:linear-gradient(90deg,#ef4444,#dc2626) !important;
}

/* Angka kondisi */
.text-success{
    color:#16a34a !important;
}

.text-warning{
    color:#ca8a04 !important;
}

.text-danger{
    color:#dc2626 !important;
}
.progress-bar{
    background:linear-gradient(90deg,#ff9800,#ef6c00);
}

/* Responsive */
@media(max-width:768px){

    .dashboard-hero{
        flex-direction:column;
        text-align:center;
        gap:20px;
        padding:28px;
    }

    .dashboard-hero h2{
        font-size:30px;
    }

}
</style>

<x-main-layout title-page="Dashboard">

    <div class="dashboard-hero">

        <div>

            <h2 class="mb-2">

                Selamat Datang,
                <strong>{{ auth()->user()->name }}</strong> 👋

            </h2>

            <p class="mb-0 text-white-50">

                Kelola inventaris barang dengan mudah melalui dashboard.

            </p>

        </div>

        <div>

            <span class="badge bg-light text-primary shadow-sm px-4 py-3">

                <i class="bi bi-calendar3 me-2"></i>

                {{ now()->translatedFormat('d F Y') }}

            </span>

        </div>

    </div>

    @include('dashboard-partials.list-kartu-total')

    <div class="row g-4 mt-3">

        <div class="col-lg-5">

            <div class="content-card h-100">

                <div class="content-header">

                    <div>

                        <h5>

                            <i class="bi bi-pie-chart-fill text-primary me-2"></i>

                            Ringkasan Kondisi Barang

                        </h5>

                        <small>

                            Statistik kondisi inventaris

                        </small>

                    </div>

                </div>

                <div class="content-body">

                    @include('dashboard-partials.list-kondisi-barang')

                </div>

            </div>

        </div>

        <div class="col-lg-7">

            <div class="content-card h-100">

                <div class="content-header">

                    <div>

                        <h5>

                            <i class="bi bi-clock-history text-success me-2"></i>

                            Barang Terbaru

                        </h5>

                        <small>

                            5 data inventaris baru ditambahkan

                        </small>

                    </div>

                </div>

                <div class="content-body p-0">

                    <div class="table-responsive">

                        @include('dashboard-partials.table-barang-terbaru')

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-main-layout>