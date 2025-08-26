<?php
namespace App\Controllers;
use App\Core\Controller; use App\Core\Auth;

class DashboardController extends Controller {
  public function index() {
    if (!Auth::check()) { header('Location: index.php?c=auth&a=login'); exit; }
    $user = Auth::user();
    $this->view('dashboard/index', compact('user'));
  }
}
