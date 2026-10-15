<div class="py-3" style="max-width: 500px;">
    <h2 class="mb-3"><?= lang('Textos.new_user') ?></h2>
    <p><a href="<?= site_url('usuarios') ?>" class="text-decoration-none"><?= lang('Textos.back_to_index') ?></a></p>

    <form action="<?= site_url('usuarios/guardar') ?>" method="post" class="mt-3">
        <div class="mb-3">
            <label for="nombre" class="form-label"><?= lang('Textos.name') ?></label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label"><?= lang('Textos.email') ?></label>
            <input type="email" name="correo" id="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><?= lang('Textos.password') ?></label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="repeat_password" class="form-label"><?= lang('Textos.repeat_password') ?></label>
            <input type="password" name="repeat_password" id="repeat_password" class="form-control" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success"><?= lang('Textos.save') ?></button>
            <a href="<?= site_url('usuarios') ?>" class="btn btn-danger"><?= lang('Textos.cancel') ?></a>
        </div>
    </form>
</div>
