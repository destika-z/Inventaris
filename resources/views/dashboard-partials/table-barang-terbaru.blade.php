<table class="table dashboard-table align-middle mb-0">

    <thead>

        <tr>

            <th>Barang</th>

            <th>Lokasi</th>

            <th>Ditambahkan</th>

        </tr>

    </thead>

    <tbody>

        @forelse($barangTerbaru as $barang)

            <tr>

                <td>

                    <i class="bi bi-box-seam text-primary me-2"></i>

                    {{ $barang->nama_barang }}

                </td>

                <td>

                    <i class="bi bi-geo-alt-fill text-danger me-2"></i>

                    {{ $barang->lokasi->nama_lokasi ?? '-' }}

                </td>

                <td>

                    <i class="bi bi-calendar-plus text-success me-2"></i>

                    <div>

                        {{ $barang->created_at->translatedFormat('d M Y') }}

                        <br>

                        <small class="text-muted">

                            {{ $barang->created_at->diffForHumans() }}

                        </small>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="3" class="text-center py-5 text-muted">

                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>

                    Belum ada data barang.

                </td>

            </tr>

        @endforelse

    </tbody>

</table>