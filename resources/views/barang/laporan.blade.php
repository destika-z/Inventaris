<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>

    @include('barang.partials.style-laporan')
</head>

<body>

   <div class="header">

    <table class="header-table">

        <tr>

            <td class="logo-col">
                <img src="{{ public_path('images/smk.png') }}" alt="Logo SMK">
            </td>

            <td class="title-col">

                <h1>SMK NEGERI 1 PADAHERANG</h1>

                <h2>Laporan Data Barang Inventaris</h2>

                <p>Tahun {{ date('Y') }}</p>

            </td>

        </tr>

    </table>

</div>



    <hr>

    <div class="info-box">

        <div class="info-item">

            <span>Total Barang</span>

            <strong>{{ $barangs->count() }} Data</strong>

        </div>

        <div class="info-item">

            <span>Dicetak Oleh</span>

            <strong>{{ auth()->user()->name }}</strong>

        </div>

        <div class="info-item">

            <span>Tanggal Cetak</span>

            <strong>{{ $date }}</strong>

        </div>

    </div>

    @include('barang.partials.list-laporan')

</body>

</html>