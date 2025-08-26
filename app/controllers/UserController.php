<?php
// app/controllers/UserController.php
require_once __DIR__ . "/../models/User.php";

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAll();
        include __DIR__ . "/../views/users/index.php";
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->userModel->create($_POST["username"], $_POST["email"], $_POST["password"], $_POST["role_id"]);
            header("Location: index.php?controller=user&action=index");
        } else {
            include __DIR__ . "/../views/users/create.php";
        }
    }

    public function edit($id) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->userModel->update($id, $_POST["username"], $_POST["email"], $_POST["role_id"], $_POST["status"]);
            header("Location: index.php?controller=user&action=index");
        } else {
            $user = $this->userModel->getById($id);
            include __DIR__ . "/../views/users/edit.php";
        }
    }

    public function delete($id) {
        $this->userModel->delete($id);
        header("Location: index.php?controller=user&action=index");
    }
}
