<?php
require_once 'php/utils.php';
require_once 'template/header.php'; 
$folder = $_GET['f'];
echo $folder;
session_start();
$user_id = $_SESSION['userID'];
$C = connect();
// echo $C;
if ($_GET['f'] != 'all') {
    $condition = sprintf('AND category = "%s"', $folder);
    echo 'hai';
}
else {
    // $condition = 'AND category = ';
    $condition ="";
    echo '';
    
}
$sql = "SELECT * FROM images where user_id  =  $user_id  $condition ";
$result = mysqli_query($C, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet"  href ='css/images.css'/>
    <title>Document</title>
</head>
<body>
    <?php 
        // $r = sqlDisplay($C,"SELECT * FROM images where user_id  = $user_id");
        

        // while ($row = mysqli_fetch_array($result)) {
        //     echo "<div id='img_div'>";
        //     echo "<img src='image_uploads/" . $row['file_name']."' style='width:10%;'>";
        //     echo "<p>". $row [ 'tittle']."</p>";
        //     echo "</div>";
        // }
    ?>

    <div class="middle mt-6">
        <div class="row row-cols-1 row-cols-md-4" >
            
            <?php while ($row = mysqli_fetch_array($result)) {?>
                <div class="col mb-4" id="content">
                    <div class="h-100 card h-50 rounded" >
                        <a href="">
                    
                            <div class="image text-center ">
                                <img class="img-fluid w-100 card-img-top card-img h-50 rounded" src="image_uploads/<?= $row['file_name'];?>" alt="" style=''>
                            </div>
                    
                        </a>
                
                    </div>
                    </div>
            <?php
            }?>
        </div>
    </div>


</body>
</html>