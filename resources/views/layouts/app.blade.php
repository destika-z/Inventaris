<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/smk.png') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="min-vh-100 bg-light pb-2">

        @include('layouts.navigation')

        {{-- Header --}}
        @isset($header)

            <header class="bg-white shadow-sm">

                <div class="container py-4">

                    {{ $header }}

                </div>

            </header>

        @endisset

        {{-- Content --}}
        <main class="container py-4">

            @yield('content')

        </main>

    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        let myModalEl = document.querySelector('[data-modal="1"]');

        if (myModalEl) {
            const myModal = new bootstrap.Modal(myModalEl);
            myModal.show();
        }
    </script>

    {{-- Script dari komponen --}}
    @stack('scripts')

</body>

</html>