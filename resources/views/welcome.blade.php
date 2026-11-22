<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'InvenBar') }}</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/smk.png') }}">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- CSS Landing Page --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .hero-section{
            background: url('{{ asset("images/LT.png") }}') no-repeat center center;
            background-size:100% auto;
            min-height:430px;
            padding:45px 0;
            display:flex;
            align-items:center;
            overflow:hidden;
        }

        /* Container */
        .hero-section .container{
            max-width:1140px;
        }

        /* Area kiri */
        .hero-section .col-lg-6{
            padding-left:20px;
        }

        /* Judul */
        .hero-title{
            font-size:48px;
            font-weight:800;
            line-height:1.2;
            color:#1f2937;
            margin-bottom:18px;
        }

        .hero-title span{
            color:#ff7b00;
        }

        /* Deskripsi */
        .hero-text{
            max-width:500px;
            font-size:17px;
            line-height:1.8;
            color:#555;
            margin-bottom:20px;
        }

        /* Tombol */
        .hero-action{
            display:flex;
            gap:16px;
            margin-top:0;
        }

        .hero-start-btn{
            background:#ff8c00;
            color:#fff;
            border:none;
            border-radius:12px;
            padding:12px 28px;
            font-weight:700;
            transition:.3s;
        }

        .hero-start-btn:hover{
            background:#f57c00;
            color:#fff;
        }

        .btn-outline-warning{
            background:#fff;
            color:#ff8c00;
            border:2px solid #ff8c00;
            border-radius:12px;
            padding:12px 28px;
            font-weight:700;
            transition:.3s;
        }

        .btn-outline-warning:hover{
            background:#ff8c00;
            color:#fff;
        }

        @media(max-width:991px){
            .hero-section{
                background-size:cover;
                background-position:right center;
                min-height:500px;
                padding:50px 0;
            }

            .hero-title{
                font-size:38px;
                text-align:center;
            }

            .hero-text{
                text-align:center;
                max-width:100%;
            }

            .hero-action{
                justify-content:center;
                flex-wrap:wrap;
            }
        }

        @media(max-width:576px){
            .hero-section{
                min-height:420px;
                padding:40px 0;
            }

            .hero-title{
                font-size:30px;
            }

            .hero-text{
                font-size:15px;
            }

            .hero-action{
                flex-direction:column;
            }

            .hero-start-btn,
            .btn-outline-warning{
                width:100%;
            }
        }
    </style>

</head>

<body>

    {{-- Navbar --}}
    @include('welcome-partials.navbar')

    {{-- Hero --}}
    @include('welcome-partials.section-hero')

    {{-- Fitur --}}
    @include('welcome-partials.section-fitur')

    {{-- Footer --}}
    @include('welcome-partials.footer')

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>