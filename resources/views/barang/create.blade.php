<x-main-layout :title-page="'Tambah Barang'">

    <div class="content-card">

        <div class="content-header">

            <div>
                <h4 class="mb-1 fw-bold">
                    <i class="bi bi-plus-circle-fill text-primary me-2"></i>
                    Tambah Barang
                </h4>

                <small class="text-muted">
                    Tambahkan data inventaris baru.
                </small>
            </div>

        </div>

        <div class="content-body">

            <form action="{{ route('barang.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('barang.partials._form')

            </form>

        </div>

    </div>

</x-main-layout>