<style>
/* =====================================================
   FITUR UNGGULAN
===================================================== */

.feature-section{
    padding:90px 0;
    background:#fff;
}

.feature-title{
    font-size:48px;
    font-weight:800;
    color:#1f2937;
    margin-bottom:12px;
}

.feature-subtitle{
    font-size:18px;
    color:#6b7280;
    margin-bottom:55px;
}

.feature-card{
    background:#fff;
    border:1px solid #f3f4f6;
    border-radius:22px;
    padding:32px;
    display:flex;
    align-items:center;
    gap:24px;
    height:100%;
    box-shadow:0 10px 28px rgba(0,0,0,.08);
    transition:.35s ease;
}

.feature-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 45px rgba(245,158,11,.18);
}

.feature-icon{
    width:95px;
    height:95px;
    min-width:95px;
    border-radius:50%;
    background:linear-gradient(135deg,#fff4e8,#ffe4c7);
    display:flex;
    align-items:center;
    justify-content:center;
}

.feature-icon img{
    width:48px;
    height:48px;
    object-fit:contain;
}

.feature-card h4{
    margin:0 0 12px;
    font-size:28px;
    font-weight:700;
    color:#1f2937;
}

.feature-card p{
    margin:0;
    color:#555;
    line-height:1.8;
}

.feature-badges{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
    margin-top:18px;
}

.feature-badges span{
    background:#fff7ed;
    color:#f97316;
    padding:6px 12px;
    border-radius:50px;
    font-size:13px;
    font-weight:600;
}

.feature-badges i{
    margin-right:5px;
}

@media(max-width:768px){

    .feature-section{
        padding:70px 0;
    }

    .feature-title{
        font-size:38px;
    }

    .feature-subtitle{
        font-size:16px;
    }

    .feature-card{
        flex-direction:column;
        text-align:center;
    }
html{
    scroll-behavior:smooth;
}

#fitur{
    scroll-margin-top:90px;
}
}
</style>

<section id="fitur" class="feature-section">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="feature-title">
                Fitur Unggulan
            </h2>

            <p class="feature-subtitle">
                Fitur lengkap untuk membantu manajemen inventaris semakin efisien.
            </p>
        </div>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-lg-4">
                <div class="feature-card">

                    <div class="feature-icon">
                        <img src="{{ asset('images/managemen-barang.png') }}" alt="Manajemen Barang">
                    </div>

                    <div>
                        <h4>Manajemen Barang</h4>

                        <p>
                            Kelola seluruh data inventaris dengan mudah dan terstruktur.
                        </p>

                        <div class="feature-badges">
                            <span><i class="bi bi-box"></i> Barang</span>
                            <span><i class="bi bi-stack"></i> Stok</span>
                            <span><i class="bi bi-tags-fill"></i> Kategori</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4">
                <div class="feature-card">

                    <div class="feature-icon">
                        <img src="{{ asset('images/laporan-cepat.png') }}" alt="Laporan Cepat">
                    </div>

                    <div>
                        <h4>Laporan Cepat</h4>

                        <p>
                            Lihat laporan inventaris secara real-time dan akurat.
                        </p>

                        <div class="feature-badges">
                            <span><i class="bi bi-file-earmark-pdf-fill"></i> PDF</span>
                            <span><i class="bi bi-graph-up-arrow"></i> Statistik</span>
                            <span><i class="bi bi-clock-history"></i> Real-time</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4">
                <div class="feature-card">

                    <div class="feature-icon">
                        <img src="{{ asset('images/multi-user.png') }}" alt="Multi User">
                    </div>

                    <div>
                        <h4>Multi User</h4>

                        <p>
                            Mendukung akses pengguna sesuai hak akses masing-masing.
                        </p>

                        <div class="feature-badges">
                            <span><i class="bi bi-person-check-fill"></i> Admin</span>
                            <span><i class="bi bi-shield-lock-fill"></i> Hak Akses</span>
                            <span><i class="bi bi-person-badge-fill"></i> User</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>