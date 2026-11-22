<section>
    <header>
        <h2 class="h5 fw-bold">
            Informasi Profil
        </h2>

        <p class="mt-1 text-muted">
            Perbarui nama, email, dan foto profil Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST"
          action="{{ route('profile.update') }}"
          enctype="multipart/form-data"
          class="mt-4">

        @csrf
        @method('PATCH')

        {{-- Foto Profil --}}
        <div class="text-center mb-4">

            @if ($user->foto)

                <img src="{{ asset('storage/'.$user->foto) }}"
                     alt="Foto Profil"
                     class="rounded-circle shadow"
                     width="130"
                     height="130"
                     style="object-fit:cover;">

            @else

                <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center shadow"
                     style="width:130px;height:130px;">

                    <i class="bi bi-person-fill text-secondary"
                       style="font-size:65px;"></i>

                </div>

            @endif

            <div class="mt-3">

                <label for="foto" class="form-label fw-semibold">
                    Foto Profil
                </label>

                <input type="file"
                       name="foto"
                       id="foto"
                       class="form-control @error('foto') is-invalid @enderror"
                       accept=".jpg,.jpeg,.png">

                <small class="text-muted">
                    Format: JPG, JPEG atau PNG. Maksimal 2 MB.
                </small>

                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

        {{-- Nama --}}
        <div class="mb-3">

            <x-input-label for="name" value="Nama" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                :value="old('name', $user->name)"
                class="{{ $errors->get('name') ? 'is-invalid' : '' }}"
                required
                autofocus />

            <x-input-error :messages="$errors->get('name')" />

        </div>

        {{-- Email --}}
        <div class="mb-3">

            <x-input-label for="email" value="Email" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                :value="old('email', $user->email)"
                class="{{ $errors->get('email') ? 'is-invalid' : '' }}"
                required />

            <x-input-error :messages="$errors->get('email')" />

        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())

            <div class="alert alert-warning">

                Email Anda belum diverifikasi.

                <button form="send-verification"
                        class="btn btn-link p-0">

                    Kirim ulang email verifikasi

                </button>

            </div>

        @endif

        <div class="d-flex align-items-center gap-2 mt-4">

            <x-primary-button>
                Simpan
            </x-primary-button>

            @if (session('status') === 'profile-updated')

                <span class="text-success">
                    <i class="bi bi-check-circle-fill"></i>
                    Profil berhasil diperbarui.
                </span>

            @endif

        </div>

    </form>

</section>