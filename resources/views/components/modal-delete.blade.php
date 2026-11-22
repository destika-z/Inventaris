<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST" class="modal-content">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                    Konfirmasi Hapus
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <button type="submit"
                        class="btn btn-danger">
                    Ya, Hapus
                </button>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');

    if (!modal || !form) return;

    modal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        console.log(button.dataset.url);

        form.setAttribute('action', button.dataset.url);

    });

});
</script>