<?php
namespace App\Core;

class Auth {
  public static function check(): bool { return isset($_SESSION['user']); }
  public static function user(): ?array { return $_SESSION['user'] ?? null; }
  public static function requireRole(string $role) {
    if (!self::check() || ($_SESSION['user']['role'] ?? '') !== $role) {
      header('Location: index.php?c=auth&a=login'); exit;
    }
  }
}
