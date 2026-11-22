<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ $titlePage ? $titlePage . ' - ' : '' }}
        {{ config('app.name', 'Laravel') }}
    </title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/smk.png') }}">

    {{-- Font Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/font/bootstrap-icons.min.css') }}" rel="stylesheet">

    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
</head>

<body class="bg-body-custom">

    @include('layouts.navigation')

    <main class="container-fluid px-4 px-lg-5 py-4">
        {{ $slot }}
    </main>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        const deleteModal = document.getElementById('deleteModal');

        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', event => {

                const button = event.relatedTarget;
                const url = button.getAttribute('data-url');

                deleteModal.querySelector('form').action = url;

            });
        }

        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

@stack('scripts')

    </script>

</body>

</html>