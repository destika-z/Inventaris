<div class="table-responsive">

    <table class="table dashboard-table align-middle mb-0">

        <thead>

            <tr>

                <th width="60">#</th>

                <th>Kode</th>

                <th>Nama Barang</th>

                <th>Kategori</th>

                <th>Lokasi</th>

                <th>Jumlah</th>

                <th>Kondisi</th>

                <th class="text-end" width="150">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($barangs as $index => $barang)

                <tr>

                    <td>

                        <span class="fw-bold text-secondary">

                            {{ $barangs->firstItem() + $index }}

                        </span>

                    </td>

                    <td>

                        <span class="badge bg-light text-primary px-3 py-2">

                            {{ $barang->kode_barang }}

                        </span>

                    </td>

                    <td>

                        <div class="d-flex align-items-center">

                            <div class="table-icon me-3">

                                <i class="bi bi-box-seam"></i>

                            </div>

                            <div>

                                <div class="fw-semibold">

                                    {{ $barang->nama_barang }}

                                </div>

                            </div>

                        </div>

                    </td>

                    <td>

                        <span class="badge bg-secondary-subtle text-secondary">

                            {{ $barang->kategori->nama_kategori }}

                        </span>

                    </td>

                    <td>

                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>

                        {{ $barang->lokasi->nama_lokasi }}

                    </td>

                    <td>

                        <strong>

                            {{ $barang->jumlah }}

                        </strong>

                        {{ $barang->satuan }}

                    </td>

                    <td>

                        @if($barang->kondisi == 'Baik')

                            <span class="badge bg-success">

                                <i class="bi bi-check-circle me-1"></i>

                                Baik

                            </span>

                        @elseif($barang->kondisi == 'Rusak Ringan')

                            <span class="badge bg-warning text-dark">

                                <i class="bi bi-exclamation-circle me-1"></i>

                                Rusak Ringan

                            </span>

                        @else

                            <span class="badge bg-danger">

                                <i class="bi bi-x-circle me-1"></i>

                                Rusak Berat

                            </span>

                        @endif

                    </td>

                    <td class="text-end">

                        <div class="d-flex justify-content-end gap-2">

                            @can('manage barang')

                                <a href="{{ route('barang.show',$barang->id) }}"
                                   class="btn btn-sm btn-outline-primary rounded-circle">

                                    <i class="bi bi-eye"></i>

                                </a>

                                <a href="{{ route('barang.edit',$barang->id) }}"
                                   class="btn btn-sm btn-outline-warning rounded-circle">

                                    <i class="bi bi-pencil"></i>

                                </a>

                            @endcan

                            @role('admin')

                                <button
                                    class="btn btn-sm btn-outline-danger rounded-circle"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-url="{{ route('barang.destroy',$barang->id) }}">

                                    <i class="bi bi-trash"></i>

                                </button>

                            @endrole

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center py-5">

                        <i class="bi bi-inbox fs-1 text-secondary d-block mb-3"></i>

                        <h6 class="fw-bold">

                            Belum ada data barang

                        </h6>

                        <small class="text-muted">

                            Silakan tambahkan data barang terlebih dahulu.

                        </small>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

