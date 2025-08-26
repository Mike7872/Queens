<?php
namespace App\Models;
use App\Core\Model; use PDO;

class User extends Model {
  public function findByUsername(string $username): ?array {
    $stmt = self::$db->prepare('SELECT u.*, r.name AS role FROM users u JOIN roles r ON r.id=u.role_id WHERE u.username = :u AND u.is_active=1');
    $stmt->execute([':u' => $username]);
    $row = $stmt->fetch();
    return $row ?: null;
  }
}

