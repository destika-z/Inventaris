<div class="mb-3">

    <x-form-input
        label="Nama Lokasi"
        name="nama_lokasi"
        :value="$lokasi->nama_lokasi"/>

</div>

<x-primary-button>
    {{ isset($update) ? 'Update' : 'Simpan' }}
</x-primary-button>

<x-tombol-kembali :href="route('lokasi.index')"/>