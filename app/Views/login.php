<div class="py-3" style="max-width: 450px; margin: 0 auto;">
    <h2 class="mb-4"><?= lang('Textos.login') ?></h2>

    <form action="<?= site_url('login') ?>" method="post">
        <div class="mb-3">
            <label for="correo" class="form-label"><?= lang('Textos.correo') ?></label>
            <input type="email" name="correo" id="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><?= lang('Textos.password') ?></label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label"><?= lang('Textos.remember_me') ?></label>
        </div>
        <div class="mb-3">
            <a href="<?= site_url('forgot-password') ?>" class="text-decoration-none"><?= lang('Textos.forgot_password') ?></a>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success px-4"><?= lang('Textos.login') ?></button>
        </div>
    </form>
</div>
