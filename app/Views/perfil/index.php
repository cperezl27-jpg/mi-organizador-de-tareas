<div class="py-3">
    <h2 class="mb-4"><?= lang('Textos.perfil') ?></h2>

    <div class="mb-3">
        <?php if (!empty($usuario['foto']) && file_exists(FCPATH . 'uploads/perfil/' . $usuario['foto'])): ?>
            <img src="<?= base_url('uploads/perfil/' . $usuario['foto']) ?>" alt="Foto de Perfil" class="img-thumbnail" style="width: 180px; height: 180px; object-fit: cover;">
        <?php else: ?>
            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 180px; height: 180px;">
                <span><?= lang('Textos.sin_foto') ?></span>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($usuario['foto'])): ?>
        <div class="mb-4">
            <a href="<?= site_url('perfil/eliminar-imagen') ?>" class="btn btn-outline-danger"><?= lang('Textos.delete_profile_image') ?></a>
        </div>
    <?php endif; ?>

    <div class="mb-2">
        <label class="fw-bold d-block"><?= lang('Textos.nombre') ?></label>
        <span><?= esc($usuario['nombre']) ?></span>
    </div>

    <div class="mb-4">
        <label class="fw-bold d-block"><?= lang('Textos.correo') ?></label>
        <span><?= esc($usuario['correo']) ?></span>
    </div>

    <div class="d-flex gap-2">
        <a href="<?= site_url('perfil/confirmar-password') ?>" class="btn btn-outline-primary"><?= lang('Textos.edit') ?></a>
        <a href="<?= site_url('perfil/cambiar-password') ?>" class="btn btn-outline-primary"><?= lang('Textos.change_password') ?></a>
        <a href="<?= site_url('perfil/cambiar-imagen') ?>" class="btn btn-outline-primary"><?= lang('Textos.change_profile_image') ?></a>
    </div>
</div>
