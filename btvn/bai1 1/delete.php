<?php
session_start();

$id = $_GET['id'];

// Xóa sản phẩm
foreach ($_SESSION['products'] as $key => $item) {
    if ($item['id'] == $id) {
        unset($_SESSION['products'][$key]);
        break;
    }
}

// Quay lại trang danh sách
header("Location: index.php");
?>
