<div class="py-3" style="max-width: 500px;">
    <h2 class="mb-4">Edit profile image</h2>

    <form action="<?= site_url('perfil/actualizar-imagen') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="<?= site_url('perfil') ?>" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
