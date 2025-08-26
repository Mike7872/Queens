<!-- app/views/users/edit.php -->
<div class="container mt-4">
    <h2>Editar Usuario</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Usuario</label>
            <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Rol</label>
            <select name="role_id" class="form-select">
                <option value="1" <?= $user['role_id']==1?'selected':'' ?>>Administrador</option>
                <option value="2" <?= $user['role_id']==2?'selected':'' ?>>Empleado</option>
                <option value="3" <?= $user['role_id']==3?'selected':'' ?>>Cliente</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-select">
                <option value="1" <?= $user['status']==1?'selected':'' ?>>Activo</option>
                <option value="0" <?= $user['status']==0?'selected':'' ?>>Bloqueado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="index.php?controller=user&action=index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
