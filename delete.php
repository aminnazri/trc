<?php
require_once 'php/utils.php'; 
$C = connect();
$f=$_GET["f"];
$year=$_GET["year"];
if(isset($_GET['image_id'])){
    $image_id = $_GET['image_id'];
    echo $image_id;
    $sql_delete = "DELETE FROM receipts WHERE image_id = '$image_id'";     
    $sql_delete2 = "SELECT * FROM receipts WHERE image_id = '$image_id'";
    $sql1 = mysqli_query($C, $query);   
    $row = mysqli_num_rows($sql1);
    $result = mysqli_query($C,$sql_delete);

    unlink('receipt_image/'.$row['file_name']);
    // echo $result;
    if($result) {
        // echo "done";

        echo "<script> location.href='receipts.php?f=".$f."&year=".$year."'; </script>";
    } else {
        echo $row;
        echo $sql_delete;
        // echo "<script> location.href='receipts.php?f=".$f."&year=2023'; </script>";
    //    header('location:list.php?result=fail');
    echo"fail";
    }
   }

?>
