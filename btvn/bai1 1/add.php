<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $newProduct = [
        "id" => end($_SESSION['products'])['id'] + 1, // Tự động tăng ID
        "name" => $name,
        "price" => $price
    ];

    // Thêm sản phẩm vào mảng
    $_SESSION['products'][] = $newProduct;

    // Quay lại trang danh sách
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <title>Thêm sản phẩm</title>
</head>
<body>
<div class="container">
    <h2>Thêm sản phẩm mới</h2>
    <form method="POST">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Giá thành</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
</div>
</body>
</html>
