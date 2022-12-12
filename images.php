<?php
require_once 'php/utils.php';
require_once 'template/header.php'; 
$folder = $_GET['f'];
// echo $folder;
session_start();
$user_id = $_SESSION['userID'];
$C = connect();
// echo $C;
if ($_GET['f'] != 'all') {
    $condition = sprintf('AND category = "%s"', $folder);
    // echo 'hai';
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
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet"  href ='css/images.scss'/>
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

    <!-- <div class="middle mt-6">
        <div class="row row-cols-1 row-cols-md-4" >

            <//?php $count = 0; while ($row = mysqli_fetch_array($result)) { $count++; ?>
                <div class="col mb-4 gallery" id="content">
                    <div class="h-100 card h-50 rounded " >
                        <a href="">
                    
                            <div class="image text-center ">
                                <img  class=" img-fluid w-100 card-img-top card-img h-50 rounded" src="image_uploads/<?= $row['file_name'];?>" alt="" style='' id="myImg">
                                The Modal
                                <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content gallery-item" id="img0<?php echo $count?>" src="image_uploads/<?= $row['file_name'];?>">
                                <div id="caption"></div>
                            </div>
                            </div>
                            
                        </a>
                
                    </div>
                    </div>
            <//?php }?>
        </div>
        
    </div> -->

    <section class="gallery min-vh-100">
		<div class="container-lg">
			<div class="row gy-4  row-cols-1 row-cols-sm-2 row-cols-md-4">
      <?php $count = 0; while ($row = mysqli_fetch_array($result)) { $count++; ?>
				<div class="col">
            <div class="h-100 card">
                <div class="img ">
                  <img class="modal-content gallery-item img-fluid  card-img-top card-img h-50 w-10 rounded" alt="Gallery1" id="img0<?php echo $count?>" src="image_uploads/<?= $row['file_name'];?>">

                </div>
                <div class="card-body">
                    <div class = "d-flex justify-content-between align-content-center">
                      <h5 class="card-title"><?= $row['tittle'];?></h5>
                      <div class="menu-nav">
                        
                        <div class="dropdown-container" tabindex="-1">
                          <div class="three-dots"></div>
                          <div class="dropdown">
                            <a href="#"><div><i class='bx bx-pencil' ></i>Edit</div></a>
                            <a href="#"><div><i class='bx bx-trash' ></i>Delete</div></a>
                            
                          </div>
                        </div>
                      </div>
                      <!-- <small class="">RM<//?= $row['amount'];?>.00</small> -->
                      
                    </div>
                    <!-- <div class = "text"> -->
                        
                        <small class="">RM<?= $row['amount'];?>.00</small>
                        
                    <!-- </div> -->
                </div>
            </div>
				</div>

        <?php
            }?>

			</div>
		</div>
	</section>

<!-- Modal -->
<div class="modal fade" id="gallery-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <!-- <div class="modal-header"> -->
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      <!-- </div> -->
      <div class="modal-body ">
        <img src="images/1.jpg" class="modal-img " alt="Modal Image">
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
  document.addEventListener("click",function (e){
    if(e.target.classList.contains("gallery-item")){
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-img").src = src;
        const myModal = new bootstrap.Modal(document.getElementById('gallery-popup'));
        myModal.show();
    }
  })

  function showModal(){
  $('#modal').modal('show');
  $(".modal-backdrop.in").hide();
  }
  $(window).load(function(){
         showModal();
    });



    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("dropdown-menu").classList.toggle("");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

const on = document.getElementById('.dropdown');


function toggle(){
  if(on.style.display === 'none'){
    on.style.display = 'none';

  }
  else{
    
    on.style.display = 'block';
    on.style.position = 'relative';
  }
}

on.addEventListener('click', function(){
  toggle();
});


</script>


</body>
</html>