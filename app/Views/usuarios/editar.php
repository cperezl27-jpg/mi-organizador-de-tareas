<div class="py-3" style="max-width: 500px;">
    <h2 class="mb-3"><?= lang('Textos.edit_user') ?></h2>
    <p><a href="<?= site_url('usuarios/' . $usuario['id']) ?>" class="text-decoration-none"><?= lang('Textos.back_to_detail') ?></a></p>

    <form action="<?= site_url('usuarios/actualizar/' . $usuario['id']) ?>" method="post" class="mt-3">
        <div class="mb-3">
            <label for="nombre" class="form-label"><?= lang('Textos.name') ?></label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= esc($usuario['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label"><?= lang('Textos.email') ?></label>
            <input type="email" name="correo" id="correo" class="form-control" value="<?= esc($usuario['correo']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><?= lang('Textos.new_password') ?> (Opcional)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="repeat_password" class="form-label"><?= lang('Textos.repeat_password') ?></label>
            <input type="password" name="repeat_password" id="repeat_password" class="form-control">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="activo" id="activo" class="form-check-input" <?= $usuario['activo'] ? 'checked' : '' ?>>
            <label for="activo" class="form-check-label"><?= lang('Textos.active') ?></label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="es_admin" id="es_admin" class="form-check-input" <?= $usuario['es_admin'] ? 'checked' : '' ?>>
            <label for="es_admin" class="form-check-label"><?= lang('Textos.administrator') ?></label>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success"><?= lang('Textos.save') ?></button>
            <a href="<?= site_url('usuarios/' . $usuario['id']) ?>" class="btn btn-danger"><?= lang('Textos.cancel') ?></a>
        </div>
    </form>
</div>
