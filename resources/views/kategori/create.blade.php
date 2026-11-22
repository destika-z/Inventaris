<x-main-layout :title-page="__('Tambah Kategori')">

    <style>
        .form-card{
            max-width:720px;
            margin:30px auto;
            border:none;
            border-radius:22px;
            overflow:hidden;
            box-shadow:0 15px 40px rgba(0,0,0,.08);
        }

        .form-header{
            background:linear-gradient(135deg,#ff9800,#ef6c00);
            color:#fff;
            padding:24px 30px;
        }

        .form-header h3{
            margin:0;
            font-size:28px;
            font-weight:700;
        }

        .form-header p{
            margin:6px 0 0;
            color:rgba(255,255,255,.9);
        }

        .form-body{
            padding:32px;
            background:#fff;
        }
    </style>

    <form action="{{ route('kategori.store') }}"
          method="POST"
          class="card form-card">

        @csrf

        <div class="form-header">
            <h3>
                <i class="bi bi-tags-fill me-2"></i>
                Tambah Kategori
            </h3>

            <p>
                Tambahkan kategori baru untuk inventaris barang.
            </p>
        </div>

        <div class="form-body">
            @include('kategori.partials._form')
        </div>

    </form>

</x-main-layout>