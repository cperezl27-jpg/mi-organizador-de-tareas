<div class="py-3" style="max-width: 500px;">
    <h2 class="mb-4">Edit profile</h2>

    <form action="<?= site_url('perfil/actualizar') ?>" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">name</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= esc($usuario['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">email</label>
            <input type="email" name="correo" id="correo" class="form-control" value="<?= esc($usuario['correo']) ?>" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="<?= site_url('perfil') ?>" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
