<?php
session_start();

// Khởi tạo danh sách sản phẩm trong session (nếu chưa có)
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ["id" => 1, "name" => "Sản phẩm 1", "price" => 1000],
        ["id" => 2, "name" => "Sản phẩm 2", "price" => 2000],
        ["id" => 3, "name" => "Sản phẩm 3", "price" => 3000],
    ];
}

// Lấy danh sách sản phẩm
$products = $_SESSION['products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main content -->
    <main class="container mt-4">
        <a href="add.php" class="btn btn-success mb-3">Thêm mới</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?> VND</td>
                        <td><a href="edit.php?id=<?php echo $product['id']; ?>"><i class="text-primary">✏️</i></a></td>
                        <td><a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="text-danger">🗑️</i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
