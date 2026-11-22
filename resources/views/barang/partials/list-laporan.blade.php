<table class="data-table">

    <thead>

        <tr>

            <th class="col-no">No</th>

            <th class="col-kode">Kode</th>

            <th class="col-nama">Nama Barang</th>

            <th class="col-kategori">Kategori</th>

            <th class="col-lokasi">Lokasi</th>

            <th class="col-jumlah">Jumlah</th>

            <th class="col-kondisi">Kondisi</th>

            <th class="col-tanggal">Tanggal Pengadaan</th>

        </tr>

    </thead>

    <tbody>

        @forelse($barangs as $index => $barang)

        <tr>

            <td class="text-center">
                {{ $index + 1 }}
            </td>

            <td>
                {{ $barang->kode_barang }}
            </td>

            <td class="text-bold">
                {{ $barang->nama_barang }}
            </td>

            <td>
                {{ $barang->kategori->nama_kategori }}
            </td>

            <td>
                {{ $barang->lokasi->nama_lokasi }}
            </td>

            <td class="text-center">
                {{ $barang->jumlah }} {{ $barang->satuan }}
            </td>

            <td class="text-center">

                <span
                    style="
                        display:inline-block;
                        min-width:100px;
                        padding:4px 10px;
                        border-radius:20px;
                        text-align:center;
                        white-space:nowrap;
                        font-size:10px;
                        font-weight:bold;

                        @if($barang->kondisi == 'Baik')
                            background:#dcfce7;
                            color:#15803d;
                        @elseif($barang->kondisi == 'Rusak Ringan')
                            background:#fef3c7;
                            color:#b45309;
                        @else
                            background:#fee2e2;
                            color:#b91c1c;
                        @endif
                    "
                >
                    {!! str_replace(' ', '&nbsp;', $barang->kondisi) !!}
                </span>

            </td>

            <td class="text-center">
                {{ date('d M Y', strtotime($barang->tanggal_pengadaan)) }}
            </td>

        </tr>

        @empty

        <tr>

            <td colspan="8" class="text-center">
                Tidak ada data barang.
            </td>

        </tr>

        @endforelse

    </tbody>

</table>

<div class="footer">
    InvenBar | Sistem Inventaris Barang | SMK Negeri 1 Padaherang
</div>