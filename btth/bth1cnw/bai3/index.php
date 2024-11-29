<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay bằng username thực tế nếu khác
$password = ""; // Thay bằng mật khẩu thực tế nếu có
$dbname = "student_db";

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Đường dẫn tới file CSV
$filename = "KTPM3_Danh_sach_diem_danh.csv";

// Mảng chứa dữ liệu sinh viên (nếu cần xử lý thêm)
$sinhvien = [];

// Kiểm tra nếu file tồn tại
if (file_exists($filename)) {
    // Mở file CSV
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc dòng đầu tiên (tiêu đề)
        $headers = fgetcsv($handle, 1000, ",");

        // Kiểm tra nếu tiêu đề không đầy đủ
        if (!$headers || count($headers) < 7) {
            die("Tiêu đề tệp CSV không hợp lệ! Đảm bảo các cột: username, password, lastname, firstname, city, email, course1");
        }

        // Đọc từng dòng dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Chỉ xử lý khi số cột khớp
            if (count($data) === count($headers)) {
                $sinhvien[] = array_combine($headers, $data);

                // Thêm vào cơ sở dữ liệu
                $stmt = $conn->prepare("INSERT INTO students (username, password, lastname, firstname, city, email, course1) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                $stmt->execute();
            }
        }

        fclose($handle);
    }
} else {
    die("File $filename không tồn tại!");
}

// Lấy danh sách sinh viên từ cơ sở dữ liệu
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['username'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['password'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['lastname'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['firstname'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['city'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['email'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['course1'] ?? 'N/A'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
