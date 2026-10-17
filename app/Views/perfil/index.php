<div class="py-3" style="max-width: 600px;">
    <h2 class="mb-4"><?= lang('Textos.perfil') ?></h2>

    <!-- Sección de Imagen Cuadrada a la izquierda -->
    <div class="mb-3" style="width: 180px;">
        <?php if (!empty($usuario['imagen'])): ?>
            <img src="<?= base_url('uploads/perfil/' . $usuario['imagen']) ?>" alt="Foto" class="img-thumbnail d-block mb-2" style="width: 180px; height: 180px; object-fit: cover; border-radius: 4px;">
            <a href="<?= site_url('perfil/eliminar-imagen') ?>" class="btn btn-outline-danger btn-sm w-100"><?= lang('Textos.delete_profile_image') ?></a>
        <?php else: ?>
            <div class="border rounded d-flex align-items-center justify-content-center bg-light mb-2" style="width: 180px; height: 180px;">
                <span class="text-muted"><?= lang('Textos.sin_foto') ?></span>
            </div>
        <?php endif; ?>
    </div>

    <!-- Sección de Datos Personales (Nombre y Correo) -->
    <div class="mb-2">
        <label class="fw-bold d-block text-muted mb-0"><?= lang('Textos.nombre') ?></label>
        <span class="fs-5"><?= esc($usuario['nombre']) ?></span>
    </div>

    <div class="mb-4">
        <label class="fw-bold d-block text-muted mb-0"><?= lang('Textos.correo') ?></label>
        <span class="fs-5"><?= esc($usuario['correo']) ?></span>
    </div>

    <!-- Botones de Acción -->
    <div class="d-flex flex-wrap gap-2">
        <a href="<?= site_url('perfil/confirmar-password') ?>" class="btn btn-outline-primary"><?= lang('Textos.edit') ?></a>
        <a href="<?= site_url('perfil/cambiar-password') ?>" class="btn btn-outline-primary"><?= lang('Textos.change_password') ?></a>
        <a href="<?= site_url('perfil/cambiar-imagen') ?>" class="btn btn-outline-primary"><?= lang('Textos.change_profile_image') ?></a>
    </div>
</div>
