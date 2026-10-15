<div class="py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><?= lang('Textos.users') ?></h2>
        <div>
            <a href="<?= site_url('usuarios?orden=newer') ?>" class="btn btn-sm btn-outline-secondary">Newer</a>
            <a href="<?= site_url('usuarios?orden=older') ?>" class="btn btn-sm btn-outline-secondary">Older</a>
            <a href="<?= site_url('usuarios/nuevo') ?>" class="btn btn-dark ms-2"><?= lang('Textos.new_user') ?></a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th><?= lang('Textos.name') ?></th>
                    <th><?= lang('Textos.email') ?></th>
                    <th><?= lang('Textos.active') ?></th>
                    <th><?= lang('Textos.administrator') ?></th>
                    <th><?= lang('Textos.created_at') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($usuarios)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4"><?= lang('Textos.no_users') ?></td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td>
                                <a href="<?= site_url('usuarios/' . $u['id']) ?>" class="text-decoration-none fw-bold">
                                    <?= esc($u['nombre']) ?>
                                </a>
                            </td>
                            <td><?= esc($u['correo']) ?></td>
                            <td><?= $u['activo'] ? lang('Textos.yes') : lang('Textos.no') ?></td>
                            <td><?= $u['es_admin'] ? lang('Textos.yes') : lang('Textos.no') ?></td>
                            <td><?= esc($u['creado_en']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
