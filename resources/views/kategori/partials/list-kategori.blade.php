<style>
.action-buttons{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
}

.action-buttons .btn{
    width:38px;
    height:38px;
    padding:0;
    border-radius:50% !important;
    display:flex;
    justify-content:center;
    align-items:center;
}
</style>

<x-table-list>

    <x-slot name="header">
        <tr>
            <th>#</th>
            <th>Nama Kategori</th>
            <th class="text-center">Aksi</th>
        </tr>
    </x-slot>

    @forelse ($kategoris as $index => $kategori)

        <tr>

            <td>{{ $kategoris->firstItem() + $index }}</td>

            <td>{{ $kategori->nama_kategori }}</td>

            <td class="text-center">
                <div class="action-buttons justify-content-center">

                    {{-- Lihat Barang (Admin & Petugas) --}}
                    <x-tombol-aksi
                        :href="route('kategori.barang', $kategori->id)"
                        type="show" />

                    {{-- Edit --}}
                    @can('manage kategori')
                        <x-tombol-aksi
                            :href="route('kategori.edit', $kategori->id)"
                            type="edit" />

                        {{-- Hapus --}}
                        <x-tombol-aksi
                            :href="route('kategori.destroy', $kategori->id)"
                            type="delete" />
                    @endcan

                </div>
            </td>

        </tr>

    @empty

        <tr>
            <td colspan="3" class="text-center py-4 text-muted">
                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                Belum ada data kategori.
            </td>
        </tr>

    @endforelse

</x-table-list>