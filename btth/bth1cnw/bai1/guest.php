<?php
include 'db.php'; // File chứa kết nối CSDL

$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>List of Flowers</h1>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='flower-card'>
                <img src='".$row['image']."' alt='".$row['name']."' width='200'/>
                <h2>".$row['name']."</h2>
                <p>".$row['description']."</p>
              </div>";
    }
} else {
    echo "No flowers found.";
}

$conn->close();
?>
