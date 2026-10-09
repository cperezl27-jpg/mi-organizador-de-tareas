<div class="row justify-content-center py-4">
    <div class="col-md-5">
        <h2 class="mb-4 text-center">Registrarse</h2>
        
        <form action="<?= site_url('registro') ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">Crear cuenta</button>
        </form>
    </div>
</div>
