<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizador de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">

<nav class="navbar navbar-expand bg-white border-bottom py-3 mb-4">
    <div class="container">
        <div class="navbar-nav me-auto">
            <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('/') ?>"><?= lang('Textos.inicio') ?></a>
            <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('lang/en') ?>">English</a>
            <a class="nav-link fs-5 text-dark" href="<?= site_url('lang/es') ?>">Español</a>
        </div>
        <div class="navbar-nav ms-auto">
            <?php if (session()->get('isLoggedIn')): ?>
                <span class="nav-link fs-5 text-muted pe-3"><?= lang('Textos.hola') ?>, <?= session()->get('nombre') ?></span>
                <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('perfil') ?>"><?= lang('Textos.perfil') ?></a>
                <?php if (session()->get('es_admin')): ?>
                    <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('usuarios') ?>"><?= lang('Textos.usuarios') ?></a>
                <?php endif; ?>
                <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('tareas') ?>"><?= lang('Textos.tareas') ?></a>
                <a class="nav-link fs-5 text-dark" href="<?= site_url('logout') ?>"><?= lang('Textos.logout') ?></a>
            <?php else: ?>
                <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('registro') ?>"><?= lang('Textos.registro') ?></a>
                <a class="nav-link fs-5 text-dark" href="<?= site_url('login') ?>"><?= lang('Textos.login') ?></a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container">
    <?php if (session()->getFlashdata('success')): ?>
        <div id="alerta-exito" class="alert alert-success fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
        <script>
            setTimeout(function() {
                var alerta = document.getElementById('alerta-exito');
                if (alerta) {
                    alerta.style.transition = 'opacity 0.5s ease';
                    alerta.style.opacity = '0';
                    setTimeout(function() { alerta.remove(); }, 500);
                }
            }, 3000);
        </script>
    <?php endif; ?>
