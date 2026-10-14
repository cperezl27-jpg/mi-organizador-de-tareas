<div class="py-3" style="max-width: 500px;">
    <h3 class="mb-4"><?= lang('Textos.enter_password') ?></h3>

    <form action="<?= site_url('perfil/confirmar-password') ?>" method="post">
        <div class="mb-3">
            <label for="password" class="form-label"><?= strtoupper(lang('Textos.password')) ?></label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success"><?= lang('Textos.send') ?></button>
            <a href="<?= site_url('perfil') ?>" class="btn btn-danger"><?= lang('Textos.cancel') ?></a>
        </div>
    </form>
</div>
