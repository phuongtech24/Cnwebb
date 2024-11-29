<?php
    session_start();
    // xu li input
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["loadIMG"])){
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["loadIMG"]["name"]);
        move_uploaded_file($_FILES["loadIMG"]["tmp_name"], $target_file);
    }

    header('location: index.php');
    if(isset($_GET['index'])){
        $index = $_GET['index'];
        if($_GET['action'] === 'edit'){
            echo 'edit';
            header('location: edit.php?index='.$index);
            return;
        }
        else if ($_GET['action'] === 'delete'){
            unset($_SESSION['products'][$index]);
            header('location: index.php');
        }
        else if($_GET['action'] === 'editsucces'){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $_SESSION['products'][$index] = ["name" => $name, "price" => $price];
            echo 'edit succes';
            header('location: index.php');
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["name"]) && isset($_POST["price"]) && $_POST["name"] != "" && $_POST["price"] != ""){
        $a =  $_POST["name"];
        $b = $_POST["price"];
        $_SESSION['products'][] = ["name" => $a, "price" => $b];
    }
    foreach($_SESSION['products'] as $value){
        echo $value["name"].'<br>';
    }
    // xu li anh
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>