<?php
namespace App\Controllers;
use App\Core\Controller; use App\Models\User;

class AuthController extends Controller {
  public function login() {
    if (isset($_SESSION['user'])) { header('Location: index.php?c=dashboard&a=index'); exit; }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = trim($_POST['username'] ?? '');
      $password = $_POST['password'] ?? '';
      $userModel = new User();
      $user = $userModel->findByUsername($username);
      if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user'] = [
          'id' => $user['id'], 'username' => $user['username'],
          'full_name' => $user['full_name'], 'role' => $user['role']
        ];
        header('Location: index.php?c=dashboard&a=index'); exit;
      }
      $error = 'Usuario o contraseña incorrectos';
      return $this->view('auth/login', compact('error'));
    }
    $this->view('auth/login');
  }

  public function logout() {
    session_destroy();
    header('Location: index.php?c=auth&a=login');
  }
}
