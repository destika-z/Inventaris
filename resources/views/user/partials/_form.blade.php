@csrf

<div class="mb-3">
    <x-form-input
        label="Nama Lengkap"
        name="name"
        :value="$user->name" />
</div>

<div class="mb-3">
    <x-form-input
        label="Email"
        name="email"
        type="email"
        :value="$user->email" />
</div>

<div class="mb-3">
    <label for="role" class="form-label fw-semibold">
        Role
    </label>

    <select
        name="role"
        id="role"
        class="form-select @error('role') is-invalid @enderror"
        required>

        <option value="">-- Pilih Role --</option>

        <option value="admin"
            {{ old('role', isset($user) && $user->roles->first() ? $user->roles->first()->name : '') == 'admin' ? 'selected' : '' }}>
            Admin
        </option>

        <option value="petugas"
            {{ old('role', isset($user) && $user->roles->first() ? $user->roles->first()->name : '') == 'petugas' ? 'selected' : '' }}>
            Petugas
        </option>

    </select>

    @error('role')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">
        Password
    </label>

    <small class="text-muted d-block mb-2">
        <i class="bi bi-shield-lock-fill text-warning me-1"></i>
        Minimal <strong>8 karakter</strong>, mengandung
        <strong>huruf</strong>, <strong>angka</strong>, dan
        <strong>karakter khusus</strong>.
        <span class="text-secondary">
            Contoh: <code>Admin@123</code>
        </span>
    </small>

    <x-form-input
        name="password"
        type="password" />
</div>

<div class="mb-3">
    <x-form-input
        label="Konfirmasi Password"
        name="password_confirmation"
        type="password" />
</div>

<div class="mt-4 d-flex gap-2">

    <x-primary-button>
        {{ isset($update) ? __('Update') : __('Simpan') }}
    </x-primary-button>

    <x-tombol-kembali :href="route('user.index')" />

</div>




@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    if(document.querySelector('#kategori_id')){
        new TomSelect('#kategori_id',{
            create:false,
            placeholder:'Cari kategori...',
            searchField:['text'],
            maxOptions:100,
        });
    }

    if(document.querySelector('#lokasi_id')){
        new TomSelect('#lokasi_id',{
            create:false,
            placeholder:'Cari lokasi...',
            searchField:['text'],
            maxOptions:100,
        });
    }

});
</script>
@endpush