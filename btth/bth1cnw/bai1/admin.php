
<?php
// hiển thị danh sách hoa (Người dùng quản trị)
include 'db.php'; // File kết nối CSDL

$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Manage Flowers</h1>";
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['name']."</td>
                <td>".$row['description']."</td>
                <td><img src='".$row['image']."' width='100'></td>
                <td>
                    <a href='edit.php?id=".$row['id']."'>Edit</a> |
                    <a href='delete.php?id=".$row['id']."'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No flowers found.";
}

$conn->close();
?>
