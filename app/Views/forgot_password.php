<div class="py-3" style="max-width: 450px; margin: 0 auto;">
    <h2 class="mb-3"><?= lang('Textos.forgot_password_title') ?></h2>
    <p class="text-muted"><?= lang('Textos.forgot_password_msg') ?></p>

    <form action="<?= site_url('forgot-password') ?>" method="post">
        <div class="mb-3">
            <label for="correo" class="form-label"><?= lang('Textos.correo') ?></label>
            <input type="email" name="correo" id="correo" class="form-control" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success"><?= lang('Textos.send_instructions') ?></button>
            <a href="<?= site_url('login') ?>" class="btn btn-danger"><?= lang('Textos.cancel') ?></a>
        </div>
    </form>
</div>
