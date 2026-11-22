@csrf

<div class="mb-4">

    <label for="nama_kategori" class="form-label fw-semibold">
        Nama Kategori
    </label>

    <input
        type="text"
        name="nama_kategori"
        id="nama_kategori"
        class="form-control @error('nama_kategori') is-invalid @enderror"
        value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
        placeholder="Masukkan nama kategori..."
        autocomplete="off">

    @error('nama_kategori')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="d-flex gap-2 mt-4">

    <x-primary-button>
        {{ isset($update) ? __('Update') : __('Simpan') }}
    </x-primary-button>

    <x-tombol-kembali :href="route('kategori.index')" />

</div>