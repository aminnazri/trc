<?php
require_once 'php/utils.php';
$folder = $_GET['folder'];

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
        sqlDisplay($C,"select img_name,img_path from image_table")
       
    ?>
    


</body>
</html>