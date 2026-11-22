<x-main-layout :title-page="'Edit Barang'">

    <div class="content-card">

        <div class="content-header">

            <div>
                <h4 class="mb-1 fw-bold">
                    <i class="bi bi-pencil-square text-warning me-2"></i>
                    Edit Barang
                </h4>

                <small class="text-muted">
                    Perbarui data inventaris.
                </small>
            </div>

        </div>


        <div class="content-body">

            <form action="{{ route('barang.update', $barang->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('barang.partials._form', [
                    'update' => true
                ])

            </form>

        </div>

    </div>

</x-main-layout>