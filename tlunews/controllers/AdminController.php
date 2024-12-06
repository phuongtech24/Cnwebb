<?php
class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::login($username, $password); // Kiểm tra thông tin đăng nhập

            if ($user && $user['role'] === 1) { // Kiểm tra quyền quản trị
                $_SESSION['admin'] = $user;
                header("Location: index.php?controller=admin&action=dashboard");
                exit;
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
            }
        }
        include "views/admin/login.php"; // Hiển thị giao diện đăng nhập
    }
}
