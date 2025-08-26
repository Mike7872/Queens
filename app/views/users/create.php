<!-- app/views/users/create.php -->
<div class="container mt-4">
    <h2>Nuevo Usuario</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Usuario</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Rol</label>
            <select name="role_id" class="form-select" required>
                <option value="1">Administrador</option>
                <option value="2">Empleado</option>
                <option value="3">Cliente</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="index.php?controller=user&action=index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
