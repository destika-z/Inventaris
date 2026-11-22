<x-table-list>

    <x-slot name="header">
        <tr>
            <th>#</th>
            <th>Nama Lokasi</th>
            <th class="text-center">Aksi</th>
        </tr>
    </x-slot>

    @forelse($lokasis as $index => $lokasi)

        <tr>
            <td>
                {{ $lokasis->firstItem() + $index }}
            </td>

            <td>
                {{ $lokasi->nama_lokasi }}
            </td>

            <td class="text-center">
                <div class="action-buttons justify-content-center">

                    {{-- Lihat Barang --}}
                    <x-tombol-aksi
                        href="{{ route('lokasi.barang', $lokasi->id) }}"
                        type="show"/>

                    {{-- Edit & Hapus hanya Admin --}}
                    @can('manage lokasi')
                        <x-tombol-aksi
                            href="{{ route('lokasi.edit', $lokasi->id) }}"
                            type="edit"/>

                        <x-tombol-aksi
                            href="{{ route('lokasi.destroy', $lokasi->id) }}"
                            type="delete"/>
                    @endcan

                </div>
            </td>
        </tr>

    @empty

        <tr>
            <td colspan="3" class="text-center py-4 text-muted">
                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                Belum ada data lokasi.
            </td>
        </tr>

    @endforelse

</x-table-list>