<?php
$servername = "localhost";
$username = "root"; // Tên người dùng MySQL của bạn
$password = ""; // Mật khẩu của MySQL
$database = "flower_store";

$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
