<x-main-layout :title-page="__('Tambah Lokasi')">

    <style>
        .form-card{
            max-width:720px;
            margin:30px auto;
            border:none !important;
            border-radius:22px;
            overflow:hidden;
            background:#fff;
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
            color:#fff;
        }

        .form-header p{
            margin:6px 0 0;
            color:rgba(255,255,255,.9);
        }

        .form-body{
            background:#fff !important;
            padding:32px;
        }

        .form-body label{
            display:block;
            font-weight:600;
            color:#444;
            margin-bottom:8px;
        }

        .form-body .form-control,
        .form-body .form-select{
            height:50px;
            border:1px solid #dee2e6;
            border-radius:12px;
            transition:.3s;
        }

        .form-body .form-control:focus,
        .form-body .form-select:focus{
            border-color:#ff9800;
            box-shadow:0 0 0 .2rem rgba(255,152,0,.15);
        }

        .form-body textarea.form-control{
            height:auto;
            min-height:120px;
        }

        @media(max-width:768px){

            .form-card{
                margin:20px 15px;
            }

            .form-header{
                padding:20px 24px;
            }

            .form-header h3{
                font-size:24px;
            }

            .form-body{
                padding:24px;
            }

        }
    </style>

    <form action="{{ route('lokasi.store') }}"
          method="POST"
          class="card form-card">

        @csrf

        <div class="form-header">
            <h3>
                <i class="bi bi-geo-alt-fill me-2"></i>
                Tambah Lokasi
            </h3>

            <p>
                Tambahkan lokasi penyimpanan inventaris baru.
            </p>
        </div>

        <div class="form-body">
            @include('lokasi.partials._form')
        </div>

    </form>

</x-main-layout>