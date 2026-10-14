<div class="py-3" style="max-width: 450px; margin: 0 auto;">
    <h2 class="mb-4"><?= lang('Textos.registro') ?></h2>

    <form action="<?= site_url('registro') ?>" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label"><?= lang('Textos.nombre') ?></label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label"><?= lang('Textos.correo') ?></label>
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
            <button type="submit" class="btn btn-success px-4"><?= lang('Textos.registro') ?></button>
            <a href="<?= site_url('/') ?>" class="btn btn-danger px-4"><?= lang('Textos.cancel') ?></a>
        </div>
    </form>
</div>
