<?php
session_start();
require_once __DIR__ . '/../app/core/App.php';
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Model.php';
require_once __DIR__ . '/../app/core/Auth.php';

spl_autoload_register(function ($class) {
  $prefix = 'App\\';
  if (str_starts_with($class, $prefix)) {
    $path = __DIR__ . '/../' . str_replace('App\\', 'app/', $class) . '.php';
    $path = str_replace('\\', '/', $path);
    if (file_exists($path)) require_once $path;
  }
});

use App\core\App;
App::run();
