<x-main-layout :title-page="__('User')">

    <div class="content-card">

        {{-- Header --}}
       <div class="content-header mb-4">

            <div>

                <h4 class="fw-bold mb-1">

                    <i class="bi bi-people-fill text-warning me-2"></i>

                    Daftar User

                </h4>

                <small class="text-muted">

                    Kelola data pengguna sistem inventaris.

                </small>

            </div>

        </div>

        {{-- Toolbar --}}
        <div class="content-body">

            @include('user.partials.toolbar')

            <x-notif-alert class="mt-4"/>

        </div>

        {{-- Table --}}
        <div class="table-responsive">

            @include('user.partials.list-user')

        </div>

        {{-- Footer --}}
        <div class="content-footer d-flex justify-content-end align-items-center py-3 px-4">

            {{ $users->links() }}

        </div>

    </div>

    <x-modal-delete/>

</x-main-layout>