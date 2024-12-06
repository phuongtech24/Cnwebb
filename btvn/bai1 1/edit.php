<?php
session_start();

$id = $_GET['id'];
$product = null;

// Tìm sản phẩm cần sửa
foreach ($_SESSION['products'] as $key => $item) {
    if ($item['id'] == $id) {
        $product = $item;
        $index = $key;
        break;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Cập nhật thông tin sản phẩm
    $_SESSION['products'][$index]['name'] = $name;
    $_SESSION['products'][$index]['price'] = $price;

    // Quay lại trang danh sách
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Sửa sản phẩm</h2>
    <form method="POST">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Giá thành</label>
            <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html>
