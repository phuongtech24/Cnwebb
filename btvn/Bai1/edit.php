<?php 
    $id = $_GET['index'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Nhap thong tin va an sua</p>
    <form action="submit.php?action=editsucces&index=<?= $id?>" method="post">
        <label for="">Ten san pham</label>
        <input type="text" name="name">
        <label for="">Gia</label>
        <input type="text" name="price">
        <input type="submit" value="Sua">
    </form>
</body>
</html>