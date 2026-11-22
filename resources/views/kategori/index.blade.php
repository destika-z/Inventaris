<x-main-layout :title-page="__('Kategori')">

    <div class="content-card">

        {{-- Header --}}
        <div class="content-header mb-4">

            <div>

                <h4 class="fw-bold mb-1">
                    <i class="bi bi-tags-fill text-warning me-2"></i>
                    Daftar Kategori
                </h4>

                <small class="text-muted">
                    Kelola data kategori barang.
                </small>

            </div>

        </div>

        {{-- Toolbar --}}
        <div class="content-body">

            @include('kategori.partials.toolbar')

            <x-notif-alert class="mt-4"/>

        </div>

        {{-- Table --}}
        <div class="table-responsive">

            @include('kategori.partials.list-kategori')

        </div>

        {{-- Footer --}}
        <div class="content-footer d-flex justify-content-end align-items-center py-3 px-4">

            {{ $kategoris->links() }}

        </div>

    </div>

    <x-modal-delete/>

</x-main-layout>