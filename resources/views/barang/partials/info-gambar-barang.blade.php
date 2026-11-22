@if ($barang->gambar)

    <div class="detail-image-wrapper">

        <img src="{{ asset('gambar-barang/' . $barang->gambar) }}"
             alt="{{ $barang->nama_barang }}"
             class="detail-image">

    </div>

@else

    <div class="detail-image-wrapper d-flex align-items-center justify-content-center">

        <span class="text-muted">
            Tidak Ada Gambar
        </span>

    </div>

@endif