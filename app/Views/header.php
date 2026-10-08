<!DOCTYPE html>
<html lang="es">
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
            <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('/') ?>">Inicio</a>
            <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('lang/en') ?>">English</a>
            <a class="nav-link fs-5 text-dark" href="<?= site_url('lang/es') ?>">Español</a>
        </div>
        <div class="navbar-nav ms-auto">
            <a class="nav-link fs-5 text-dark pe-3" href="<?= site_url('registro') ?>">Registrarse</a>
            <a class="nav-link fs-5 text-dark" href="<?= site_url('login') ?>">Iniciar sesión</a>
        </div>
    </div>
</nav>

<div class="container">
