<style>
/* ===========================
   TOOLBAR
=========================== */

.toolbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
}

/* ===========================
   SEARCH
=========================== */

.search-form{
    width:710px;
}

.search-group{
    display:flex;
    align-items:center;
    height:44px;
    border:1px solid #d9dee7;
    border-radius:6px;
    background:#fff;
    overflow:hidden;
}

.search-icon{
    width:42px;
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    border-right:1px solid #d9dee7;
    color:#6b7280;
    font-size:15px;
}

.search-input{
    flex:1;
    height:100%;
    border:none !important;
    box-shadow:none !important;
    padding:0 12px;
    font-size:14px;
}

.search-input:focus{
    outline:none;
    box-shadow:none !important;
}

.search-input::placeholder{
    color:#6b7280;
}

.search-btn{
    display:none;
}

.search-group:focus-within{
    border-color:#cfd6e4;
}

/* ===========================
   RESPONSIVE
=========================== */

@media(max-width:400px){

    .toolbar{
        flex-direction:column;
        align-items:stretch;
    }

    .search-form{
        width:100%;
    }

}
</style>

<div class="toolbar">

    @can('manage lokasi')
        <a href="{{ route('lokasi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-square"></i>
            Tambah Lokasi
        </a>
    @endcan

    <form action="{{ route('lokasi.index') }}" method="GET" class="search-form">

        <div class="search-group">

            <div class="search-icon">
                <i class="bi bi-search"></i>
            </div>

            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Cari nama lokasi..."
                value="{{ request('search') }}">

            <button type="submit" class="search-btn"></button>

        </div>

    </form>

</div>