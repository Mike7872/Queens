<!-- app/views/users/index.php -->
<div class="container mt-4">
    <h2 class="mb-4">Gestión de Usuarios</h2>
    <a href="index.php?controller=user&action=create" class="btn btn-primary mb-3">➕ Nuevo Usuario</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th><th>Usuario</th><th>Email</th><th>Rol</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <?= $u["status"] == 1 ? "<span class='badge bg-success'>Activo</span>" : "<span class='badge bg-danger'>Bloqueado</span>" ?>
                </td>
                <td>
                    <a href="index.php?controller=user&action=edit&id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                    <a href="index.php?controller=user&action=delete&id=<?= $u['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">🗑️ Eliminar</a>
                </td>
            </tr>
           
        </tbody>
    </table>
</div>
