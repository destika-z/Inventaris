<style>
/* ===========================
   ACTION BUTTON
=========================== */

.action-buttons{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
}

.action-btn{
    width:38px;
    height:38px;
    padding:0;
    border-radius:50% !important;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:.25s;
    box-shadow:none !important;
}


/* ========= SHOW / LIHAT ========= */

.btn-show{
    background:#fff !important;
    border:2px solid #0d6efd !important;
}

.btn-show i{
    color:#0d6efd;
    font-size:15px;
    transition:.25s;
}

.btn-show:hover{
    background:#0d6efd !important;
    border-color:#0d6efd !important;
}

.btn-show:hover i{
    color:#fff;
}



/* ========= EDIT ========= */

.btn-edit{
    background:#fff !important;
    border:2px solid #FFC107 !important;
}

.btn-edit i{
    color:#FFC107;
    font-size:15px;
    transition:.25s;
}

.btn-edit:hover{
    background:#FFC107 !important;
    border-color:#FFC107 !important;
}

.btn-edit:hover i{
    color:#000;
}



/* ========= DELETE ========= */

.btn-delete{
    background:#fff !important;
    border:2px solid #EF4444 !important;
}

.btn-delete i{
    color:#EF4444;
    font-size:15px;
    transition:.25s;
}

.btn-delete:hover{
    background:#EF4444 !important;
    border-color:#EF4444 !important;
}

.btn-delete:hover i{
    color:#fff;
}

</style>


@props(['href', 'type'])


@switch($type)


    @case('show')

        <a href="{{ $href }}" 
           class="btn action-btn btn-show"
           title="Lihat Barang">

            <i class="bi bi-eye"></i>

        </a>

    @break



    @case('edit')

        <a href="{{ $href }}" 
           class="btn action-btn btn-edit"
           title="Edit">

            <i class="bi bi-pencil-square"></i>

        </a>

    @break



    @case('delete')

        <button
            type="button"
            class="btn action-btn btn-delete"
            data-url="{{ $href }}"
            data-bs-toggle="modal"
            data-bs-target="#deleteModal"
            title="Hapus">

            <i class="bi bi-trash"></i>

        </button>

    @break


@endswitch