<div class="row align-items-center g-3">

    {{-- Tombol --}}
    <div class="col-lg-6">

        <div class="d-flex flex-wrap gap-2">

            @can('manage barang')

                <a href="{{ route('barang.create') }}"
                   class="btn btn-primary btn-modern">

                    <i class="bi bi-plus-circle me-2"></i>

                    Tambah Barang

                </a>

            @endcan

            <a href="{{ route('barang.laporan') }}"
               target="_blank"
               class="btn btn-success btn-modern">

                <i class="bi bi-printer me-2"></i>

                Cetak Laporan

            </a>

        </div>

    </div>

    {{-- Search --}}
    <div class="col-lg-6">

        <form method="GET">

            <div class="input-group search-modern">

                <span class="input-group-text">

                    <i class="bi bi-search"></i>

                </span>

                <input
                    type="text"
                    class="form-control"
                    name="search"
                    placeholder="Cari nama atau kode barang..."
                    value="{{ request('search') }}">

            </div>

        </form>

    </div>

</div>