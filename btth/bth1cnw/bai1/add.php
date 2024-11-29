<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New flower added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Flower Name" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="text" name="image" placeholder="Image Path" required>
    <button type="submit">Add Flower</button>
</form>
