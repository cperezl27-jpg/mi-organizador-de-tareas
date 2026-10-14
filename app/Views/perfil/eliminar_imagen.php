<div class="py-3" style="max-width: 500px;">
    <h2 class="mb-3">Delete profile image</h2>
    <p class="fs-5 text-muted mb-4">Are you sure?</p>

    <form action="<?= site_url('perfil/eliminar-imagen') ?>" method="post">
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="<?= site_url('perfil') ?>" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>

