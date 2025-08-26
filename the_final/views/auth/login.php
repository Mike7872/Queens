
<?php $cfg = include __DIR__ . '/../../../config/config.php'; $base = $cfg['app']['base_url']; ?>

<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
  <div class="card shadow-lg rounded-4" style="max-width: 460px; width:100%">
    <div class="card-header text-center rounded-top-4 bg-gradient-primary">
      <h1 class="h4 m-0 text-white">Queen's — Acceso</h1>
      <small class="text-white-50">Panel Administrativo</small>
    </div>
    <div class="card-body p-4">
      <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <form method="post" action="<?= $base ?>/index.php?c=auth&a=login" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">Usuario</label>
          <input type="text" name="username" class="form-control form-control-lg" required>
          <div class="invalid-feedback">Ingresa tu usuario</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Contraseña</label>
          <input type="password" name="password" class="form-control form-control-lg" required>
          <div class="invalid-feedback">Ingresa tu contraseña</div>
        </div>
        <button class="btn btn-primary btn-lg w-100 shadow-sm">Ingresar</button>
      </form>
    </div>
    <div class="card-footer text-center bg-soft-pink">
      <small class="text-dark">© <?= date('Y') ?> Queen's</small>
    </div>
  </div>
</div>
<script>
(() => { 'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) { event.preventDefault(); event.stopPropagation(); }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>
