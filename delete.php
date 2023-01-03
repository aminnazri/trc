<?php
require_once 'php/utils.php'; 
$C = connect();
$f=$_GET["f"];
if(isset($_GET['image_id'])){
    $image_id = $_GET['image_id'];
    echo $image_id;
    $sql_delete = "DELETE FROM images WHERE image_id = '$image_id';";        
    $result = mysqli_query($C,$sql_delete);
    // echo $result;
    if($result) {
        echo "done";

        echo "<script> location.href='images.php?deleted&f=".$f."&year=2022'; </script>";
    } else {
       header('location:list.php?result=fail');
    echo"fail";
    }
   }

?>
