<div class="py-3" style="max-width: 600px;">
    <h2 class="mb-3"><?= lang('Textos.users') ?></h2>
    <p><a href="<?= site_url('usuarios') ?>" class="text-decoration-none"><?= lang('Textos.back_to_index') ?></a></p>

    <div class="mb-3">
        <label class="fw-bold d-block text-muted"><?= lang('Textos.name') ?></label>
        <span class="fs-5"><?= esc($usuario['nombre']) ?></span>
    </div>
    <div class="mb-3">
        <label class="fw-bold d-block text-muted"><?= lang('Textos.email') ?></label>
        <span class="fs-5"><?= esc($usuario['correo']) ?></span>
    </div>
    <div class="mb-3">
        <label class="fw-bold d-block text-muted"><?= lang('Textos.active') ?></label>
        <span class="fs-5"><?= $usuario['activo'] ? lang('Textos.yes') : lang('Textos.no') ?></span>
    </div>
    <div class="mb-3">
        <label class="fw-bold d-block text-muted"><?= lang('Textos.administrator') ?></label>
        <span class="fs-5"><?= $usuario['es_admin'] ? lang('Textos.yes') : lang('Textos.no') ?></span>
    </div>
    <div class="mb-3">
        <label class="fw-bold d-block text-muted"><?= lang('Textos.created_at') ?></label>
        <span><?= esc($usuario['creado_en']) ?></span>
    </div>
    <div class="mb-4">
        <label class="fw-bold d-block text-muted"><?= lang('Textos.updated_at') ?></label>
        <span><?= esc($usuario['actualizado_en']) ?></span>
    </div>

    <div class="d-flex gap-2">
        <a href="<?= site_url('usuarios/editar/' . $usuario['id']) ?>" class="btn btn-primary"><?= lang('Textos.edit') ?></a>
        <a href="<?= site_url('usuarios/eliminar/' . $usuario['id']) ?>" class="btn btn-danger" onclick="return confirm('<?= lang('Textos.delete_confirm') ?>');"><?= lang('Textos.eliminar') ?></a>
    </div>
</div>
