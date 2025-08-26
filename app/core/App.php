<?php
namespace App\Core;

class App {
  public static function run() {
    $c = strtolower($_GET['c'] ?? 'auth');
    $a = strtolower($_GET['a'] ?? 'login');
    $controller = 'App\\Controllers\\' . ucfirst($c) . 'Controller';
    $action = $a;
    if (!class_exists($controller)) die('Controlador no encontrado');
    $obj = new $controller();
    if (!method_exists($obj, $action)) die('Acción no encontrada');
    $obj->$action();
  }
}
