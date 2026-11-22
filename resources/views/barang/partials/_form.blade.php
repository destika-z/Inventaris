@csrf

<div class="row mb-3">
    <div class="col-md-6">
        <x-form-input
            label="Kode Barang"
            name="kode_barang"
            :value="$barang->kode_barang"
            pattern="[A-Za-z0-9]+"
            maxlength="50"
            title="Kode barang hanya boleh berisi huruf dan angka."
            oninput="this.value=this.value.replace(/[^A-Za-z0-9]/g,'')" />
    </div>

    <div class="col-md-6">
        <x-form-input
            label="Nama Barang"
            name="nama_barang"
            :value="$barang->nama_barang" />
    </div>
</div>

<div class="row mb-3">

    {{-- Kategori --}}
    <div class="col-md-6">

        @role('admin')

            <label for="kategori" class="form-label">
                Kategori
            </label>

            <input
                id="kategori"
                type="text"
                name="kategori"
                class="form-control @error('kategori') is-invalid @enderror"
                list="listKategori"
                value="{{ old('kategori', optional($barang->kategori)->nama_kategori ?? '') }}"
                placeholder="Pilih atau ketik kategori">

            <datalist id="listKategori">
                @foreach($kategori as $item)
                    <option value="{{ $item->nama_kategori }}">
                @endforeach
            </datalist>

            @error('kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        @elserole('petugas')

            <x-form-select
                label="Kategori"
                name="kategori_id"
                :value="$barang->kategori_id"
                :option-data="$kategori"
                option-label="nama_kategori"
                option-value="id" />

        @endrole

    </div>

    {{-- Lokasi --}}
    <div class="col-md-6">
        <x-form-select
            label="Lokasi"
            name="lokasi_id"
            :value="$barang->lokasi_id"
            :option-data="$lokasi"
            option-label="nama_lokasi"
            option-value="id" />
    </div>

</div>

<div class="row mb-3">
    <div class="col-md-6">
        <x-form-input
            label="Jumlah"
            name="jumlah"
            type="number"
            :value="$barang->jumlah" />
    </div>

    <div class="col-md-6">
        <x-form-input
            label="Satuan"
            name="satuan"
            :value="$barang->satuan"
            oninput="this.value=this.value.toLowerCase().replace(/\b\w/g,c=>c.toUpperCase())" />
    </div>
</div>

<div class="row mb-3">

    <div class="col-md-6">

        @php
            $kondisi = [
                ['kondisi' => 'Baik'],
                ['kondisi' => 'Rusak Ringan'],
                ['kondisi' => 'Rusak Berat'],
            ];
        @endphp

        <x-form-select
            label="Kondisi"
            name="kondisi"
            :value="$barang->kondisi"
            :option-data="$kondisi"
            option-label="kondisi"
            option-value="kondisi" />

    </div>

    <div class="col-md-6">

        @php
            $tanggal = $barang->tanggal_pengadaan
                ? date('Y-m-d', strtotime($barang->tanggal_pengadaan))
                : null;
        @endphp

        <x-form-input
            label="Tanggal Pengadaan"
            name="tanggal_pengadaan"
            type="date"
            :value="$tanggal" />

    </div>

</div>

<div class="mb-3">

    <label class="form-label fw-semibold">
        Gambar Barang
    </label>

   @if(!empty($barang->gambar))

    <div class="mb-2">
        <img
            src="{{ asset('gambar-barang/'.$barang->gambar) }}"
            alt="Gambar Barang"
            class="img-thumbnail"
            style="max-width:180px;">
    </div>

@endif

    <input
        type="file"
        name="gambar"
        class="form-control @error('gambar') is-invalid @enderror">

    @error('gambar')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="mt-4">
    <x-primary-button>
        {{ isset($update) ? __('Update') : __('Simpan') }}
    </x-primary-button>

    <x-tombol-kembali :href="route('barang.index')" />
</div>