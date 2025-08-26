<?php $cfg = include __DIR__ . '/../../../config/config.php'; $base = $cfg['app']['base_url']; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Queen's</a>
    <div class="d-flex align-items-center gap-3">
      <span class="badge bg-light text-dark"><?= htmlspecialchars($user['full_name']) ?> (<?= htmlspecialchars($user['role']) ?>)</span>
      <a class="btn btn-outline-light btn-sm" href="<?= $base ?>/index.php?c=auth&a=logout">Salir</a>
    </div>
  </div>
</nav>
<div class="container py-4">
  <div class="row g-3">
    <div class="col-md-3">
      <div class="card shortcut">
        <div class="card-body">
          <h5 class="card-title">Usuarios</h5>
          <p class="card-text">Administrar usuarios del sistema.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shortcut">
        <div class="card-body">
          <h5 class="card-title">Inventario</h5>
          <p class="card-text">Productos, stock y movimientos.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shortcut">
        <div class="card-body">
          <h5 class="card-title">Ventas</h5>
          <p class="card-text">Facturación y reportes.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shortcut">
        <div class="card-body">
          <h5 class="card-title">Reportes</h5>
          <p class="card-text">Kardex, top ventas, etc.</p>
        </div>
      </div>
    </div>
  </div>
</div>
