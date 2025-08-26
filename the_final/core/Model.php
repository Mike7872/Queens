<?php
namespace App\Core;
use PDO; use PDOException;

class Model {
  protected static ?PDO $db = null;

  public function __construct() {
    if (!self::$db) {
      $cfg = include __DIR__ . '/../../config/config.php';
      $dsn = "mysql:host={$cfg['db']['host']};dbname={$cfg['db']['name']};charset={$cfg['db']['charset']}";
      try {
        self::$db = new PDO($dsn, $cfg['db']['user'], $cfg['db']['pass'], [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
      } catch (PDOException $e) {
        die('DB error: ' . $e->getMessage());
      }
    }
  }
}
