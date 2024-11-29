<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM flowers WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Flower deleted successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
