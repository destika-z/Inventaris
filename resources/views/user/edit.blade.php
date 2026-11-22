<x-main-layout :title-page="__('Edit User')">

    <div class="content-card">

        {{-- Header --}}
        <div class="content-header text-center mb-5">

            <h3 class="fw-bold mb-2">
                <i class="bi bi-pencil-square text-warning me-2"></i>
                Edit User
            </h3>

            <p class="text-muted mb-0">
                Perbarui informasi akun administrator atau petugas.
            </p>

        </div>

        {{-- Form --}}
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-8">

                <div class="card shadow-sm border-0 rounded-4">

                    <form
                        action="{{ route('user.update', $user->id) }}"
                        method="POST"
                        autocomplete="off">

                        @csrf
                        @method('PUT')

                        <div class="card-body p-4">

                            @include('user.partials._form', ['update' => true])

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-main-layout>

<style>
/* ==========================
   CONTENT
========================== */

.content-card{
    background:#fff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

/* ==========================
   HEADER
========================== */

.content-header{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.content-header h3{
    font-size:34px;
    font-weight:700;
    color:#1f2937;
}

.content-header i{
    color:#f59e0b;
}

.content-header p{
    font-size:15px;
    color:#6b7280;
    max-width:600px;
}

/* ==========================
   CARD FORM
========================== */

.card{
    border:none !important;
    border-radius:18px !important;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.card-body{
    padding:30px;
}

/* ==========================
   FORM
========================== */

.form-label{
    font-weight:600;
    color:#374151;
}

.form-control,
.form-select{
    min-height:46px;
    border-radius:10px;
}

.form-control:focus,
.form-select:focus{
    border-color:#f59e0b;
    box-shadow:0 0 0 .2rem rgba(245,158,11,.15);
}

/* ==========================
   BUTTON
========================== */

.btn-primary{
    border-radius:10px;
    padding:10px 22px;
}

.btn-secondary{
    border-radius:10px;
    padding:10px 22px;
}

/* ==========================
   RESPONSIVE
========================== */

@media (max-width:768px){

    .content-card{
        padding:20px;
    }

    .content-header h3{
        font-size:28px;
    }

    .card-body{
        padding:20px;
    }

}
</style>