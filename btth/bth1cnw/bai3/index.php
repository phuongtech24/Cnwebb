<?php
// Đường dẫn tới file CSV
$filename =  "KTPM3_Danh_sach_diem_danh.csv";


// Mảng chứa dữ liệu sinh viên
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
            // Kiểm tra số lượng cột dữ liệu có khớp với tiêu đề không
            if (count($data) === count($headers)) {
                $sinhvien[] = array_combine($headers, $data);
            }
        }

        fclose($handle);
    }
} else {
    die("File $filename không tồn tại!");
}
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
                <?php
                if (!empty($sinhvien)):
                    foreach ($sinhvien as $sv): ?>
                        <tr>
                            <td><?php echo $sv['username'] ?? 'N/A'; ?></td>
                            <td><?php echo $sv['password'] ?? 'N/A'; ?></td>
                            <td><?php echo $sv['lastname'] ?? 'N/A'; ?></td>
                            <td><?php echo $sv['firstname'] ?? 'N/A'; ?></td>
                            <td><?php echo $sv['city'] ?? 'N/A'; ?></td>
                            <td><?php echo $sv['email'] ?? 'N/A'; ?></td>
                            <td><?php echo $sv['course1'] ?? 'N/A'; ?></td>
                        </tr>
                    <?php endforeach;
                else: ?>
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
