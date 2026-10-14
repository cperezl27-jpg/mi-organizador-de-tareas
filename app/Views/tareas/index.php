<div class="py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><?= lang('Textos.mis_tareas') ?></h2>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalTarea">
            <?= lang('Textos.nueva_tarea') ?>
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th><?= lang('Textos.titulo') ?></th>
                    <th><?= lang('Textos.descripcion') ?></th>
                    <th><?= lang('Textos.fecha_limite') ?></th>
                    <th><?= lang('Textos.estado') ?></th>
                    <th><?= lang('Textos.acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tareas)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <?= lang('Textos.no_tareas') ?>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($tareas as $t): ?>
                        <tr>
                            <td class="<?= $t['estado'] === 'completada' ? 'text-decoration-line-through text-muted' : 'fw-bold' ?>">
                                <?= esc($t['titulo']) ?>
                            </td>
                            <td><?= esc($t['descripcion']) ?></td>
                            <td><?= $t['fecha_limite'] ? esc($t['fecha_limite']) : '-' ?></td>
                            <td>
                                <span class="badge <?= $t['estado'] === 'completada' ? 'bg-success' : 'bg-warning text-dark' ?>">
                                    <?= $t['estado'] === 'completada' ? lang('Textos.completada') : lang('Textos.pendiente') ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= site_url('tareas/estado/' . $t['id']) ?>" class="btn btn-sm btn-outline-secondary">
                                    <?= $t['estado'] === 'completada' ? lang('Textos.marcar_pendiente') : lang('Textos.completar') ?>
                                </a>
                                <a href="<?= site_url('tareas/eliminar/' . $t['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('<?= lang('Textos.are_you_sure') ?>');">
                                    <?= lang('Textos.eliminar') ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalTarea" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('Textos.agregar_tarea') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('tareas/guardar') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label"><?= lang('Textos.titulo') ?></label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label"><?= lang('Textos.descripcion') ?></label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_limite" class="form-label"><?= lang('Textos.fecha_limite') ?></label>
                        <input type="date" name="fecha_limite" id="fecha_limite" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('Textos.cancel') ?></button>
                    <button type="submit" class="btn btn-dark"><?= lang('Textos.save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
