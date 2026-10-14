<div class="py-3" style="max-width: 500px;">
    <h2 class="mb-4">Edit password</h2>

    <form action="<?= site_url('perfil/actualizar-password') ?>" method="post">
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New password</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="repeat_password" class="form-label">Repeat new password</label>
            <input type="password" name="repeat_password" id="repeat_password" class="form-control" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="<?= site_url('perfil') ?>" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
