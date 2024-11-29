<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM flowers WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "UPDATE flowers SET name='$name', description='$description', image='$image' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Flower updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<form method="post">
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <textarea name="description" required><?php echo $row['description']; ?></textarea>
    <input type="text" name="image" value="<?php echo $row['image']; ?>" required>
    <button type="submit">Update Flower</button>
</form>
