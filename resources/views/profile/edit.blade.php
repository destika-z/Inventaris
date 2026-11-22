<x-main-layout :title-page="__('Profil Saya')">

    <style>
        .profile-container{
            max-width:900px;
            margin:30px auto;
        }

        .profile-card{
            border:none;
            border-radius:22px;
            overflow:hidden;
            box-shadow:0 15px 40px rgba(0,0,0,.08);
            margin-bottom:28px;
        }

        .profile-header{
            background:linear-gradient(135deg,#ff9800,#ef6c00);
            color:#fff;
            padding:22px 30px;
        }

        .profile-header h3{
            margin:0;
            font-size:28px;
            font-weight:700;
        }

        .profile-header p{
            margin:6px 0 0;
            color:rgba(255,255,255,.9);
        }

        .profile-body{
            background:#fff;
            padding:32px;
        }

        .profile-body label{
            font-weight:600;
            color:#374151;
        }

        .profile-body .form-control,
        .profile-body .form-select{
            height:50px;
            border-radius:12px;
            border:1px solid #dee2e6;
        }

        .profile-body .form-control:focus,
        .profile-body .form-select:focus{
            border-color:#ff9800;
            box-shadow:0 0 0 .2rem rgba(255,152,0,.15);
        }

        .profile-body textarea.form-control{
            height:auto;
            min-height:120px;
        }

        @media(max-width:768px){

            .profile-container{
                margin:20px 15px;
            }

            .profile-body{
                padding:24px;
            }

            .profile-header h3{
                font-size:24px;
            }

        }
    </style>

    <div class="profile-container">

        {{-- Informasi Profil --}}
        <div class="card profile-card">

            <div class="profile-header">
                <h3>
                    <i class="bi bi-person-circle me-2"></i>
                    Profil Saya
                </h3>

                <p>
                    Kelola informasi akun Anda.
                </p>
            </div>

            <div class="profile-body">
                @include('profile.partials.update-profile-information-form')
            </div>

        </div>

        {{-- Password --}}
        <div class="card profile-card">

            <div class="profile-header">
                <h3>
                    <i class="bi bi-shield-lock-fill me-2"></i>
                    Ubah Password
                </h3>

                <p>
                    Gunakan password yang kuat agar akun tetap aman.
                </p>
            </div>

            <div class="profile-body">
                @include('profile.partials.update-password-form')
            </div>

        </div>

        {{-- Hapus Akun --}}
        @if (Route::has('profile.destroy'))

            <div class="card profile-card">

                <div class="profile-header">
                    <h3>
                        <i class="bi bi-trash-fill me-2"></i>
                        Hapus Akun
                    </h3>

                    <p>
                        Tindakan ini bersifat permanen dan tidak dapat dibatalkan.
                    </p>
                </div>

                <div class="profile-body">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>

        @endif

    </div>

</x-main-layout>