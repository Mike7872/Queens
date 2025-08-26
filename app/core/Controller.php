<?php
namespace App\Core;

class Controller {
  protected function view(string $view, array $data = []) {
    extract($data);
    $viewFile = __DIR__ . '/../views/' . $view . '.php';
    $layout = __DIR__ . '/../views/layouts/main.php';
    if (!file_exists($viewFile)) die('Vista no encontrada');
    include $layout;
  }
}


