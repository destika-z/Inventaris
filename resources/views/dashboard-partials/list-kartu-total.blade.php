<style>
/* ===========================
   CARD STATISTIK
=========================== */

.stat-card{
    border:0;
    border-radius:20px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    transition:.3s;
    border-top:5px solid #ff9800;
}

.stat-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 40px rgba(255,152,0,.18);
}

.stat-card .card-body{
    padding:24px;
}

.stat-card .card-title{
    color:#777;
    font-size:14px;
    font-weight:600;
    text-transform:uppercase;
    margin-bottom:8px;
}

.stat-card .card-text{
    font-size:42px;
    font-weight:800;
    color:#222;
}

.stat-card .card-footer{
    background:#fffaf5;
    border-top:1px solid #f3f4f6;
}

.stat-card .card-footer a{
    color:#ff8a00;
    font-weight:700;
    text-decoration:none;
}

.stat-card .card-footer a:hover{
    color:#ef6c00;
}

.stat-icon{
    width:56px;
    height:56px;
    border-radius:16px;
    background:#fff4e8;
    display:flex;
    align-items:center;
    justify-content:center;
}

.stat-icon img{
    width:28px;
}
</style>
<div class="row">

@php
    $kartus = [
        [
            'text' => 'TOTAL BARANG',
            'total' => $jumlahBarang,
            'route' => 'barang.index',
            'icon' => 'bi-box-seam',
            'color' => 'primary'
        ],

        [
            'text' => 'TOTAL KATEGORI',
            'total' => $jumlahKategori,
            'route' => 'kategori.index',
            'icon' => 'bi-tag',
            'color' => 'secondary'
        ],

        [
            'text' => 'TOTAL LOKASI',
            'total' => $jumlahLokasi,
            'route' => 'lokasi.index',
            'icon' => 'bi-geo-alt',
            'color' => 'success'
        ],

        [
            'text' => 'TOTAL USER',
            'total' => $jumlahUser,
            'route' => 'user.index',
            'icon' => 'bi-people',
            'color' => 'danger',
            'role' => 'admin'
        ],
    ];
@endphp

@foreach ($kartus as $kartu)

    @if (isset($kartu['role']))
        @if(auth()->check() && auth()->user()->hasRole($kartu['role']))
            <x-kartu-total
                :text="$kartu['text']"
                :total="$kartu['total']"
                :route="$kartu['route']"
                :icon="$kartu['icon']"
                :color="$kartu['color']"
            />
        @endif
    @else
        <x-kartu-total
            :text="$kartu['text']"
            :total="$kartu['total']"
            :route="$kartu['route']"
            :icon="$kartu['icon']"
            :color="$kartu['color']"
        />
    @endif

@endforeach

</div>