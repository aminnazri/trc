<?php
    require_once 'php/utils.php';
    require_once 'template/header.php'; 
    $image_id = $_GET['image_id'];
    // echo $folder;
    session_start();
    $user_id = $_SESSION['userID'];
    $C = connect();
    $sql = "SELECT * FROM images where user_id  =  $user_id  AND image_id = $image_id";
    $result = mysqli_query($C, $sql);
    $row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $row['tittle'];
    
    ?>
</body>
</html>