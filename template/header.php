<!-- https://boxicons.com/ - website utk amik icon --> 

<?php

    require_once './php/utils.php'; 
    session_start();
    $user_id = $_SESSION['userID'];
    $C = connect();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
		header("Location: login");
		exit;
	}

?>

<html>
<head>
    <meta name="csrf_token" content="<?php echo createToken(); ?>" />
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <!-- boxicons -->
    <!-- <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'> -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet"  href ='../css/header.css'/>
    
    <style></style>
</head>
<body className='snippet-body'>
<body id="body-pd" class="">
    <header class="header " id="header">
        <a href="#" class="nav_logo" style="display:flex;align-item:center;"> 
                <i class=''><img src="./image/folder4.png" style="width:50px"alt=""></i> 
                <span class="nav_logo-name"><h5><b>simpan.com</b></h5></span> 
        </a>
        <div class="profile">
            <?php 
                $query1 = "SELECT * FROM users where id='$user_id'";
                $sql1 = mysqli_query($C, $query1);
                while ($row = mysqli_fetch_array($sql1)) {
                    $profile_pic ="";
                    if ($row['picture_link'] == "") {
                        $profile_pic = "https://img.icons8.com/ios-filled/50/null/user-male-circle.png";
                    }
                    else {
                        $profile_pic = $row['picture_link'];
                    }
            ?>

            <div class="text">
                <small><b><?=$row['name'] ?> <?=$row['last_name']?></b></small><br>
                <small><?=$row['id']?></small>
            </div>
            <div class="header_img"> 
                
                <!-- <span class="tooltiptext">Profile setting</span> -->
                <i href="#" data-bs-toggle="tooltip" data-bs-placement="top"  title="Profile Setting"><span><a href="profile-setting2.php"><img src="../image/profile_image/<?=$profile_pic?>" alt=""> </a></i>
            </div>
            <?php };?>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <div class="nav_list"> 
                    <div class="nav_link header_toggle"> 
                        <i class='bx bx-menu' id="header-toggle"></i> 
                    </div>
                    <a href="../index.php" class="nav_link index"> 
                        <i class='bx bxs-dashboard nav_icon'></i>
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="../upload_receipt.php" class="nav_link upload_receipt"> 
                        <i class='bx bx-image-add nav_icon'></i> 
                        <span class="nav_name">Upload Receipt</span> 
                    </a> 
                    <a href="../info.php" class="nav_link info"> 
                        <i class='bx bx-notification nav_icon'></i> 
                        <span class="nav_name">Info</span> 
                    </a> 
                    <a href="../folder.php" class="nav_link folders"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Folders</span> 
                    </a> 
                    <a href="../calculator" class="nav_link calculator"> 
                    <i class="bx bx-calculator nav_icon"></i>
                        <span class="nav_name">Tax Calculator</span>
                    </a> 
                    <!-- <a href="../folders.php" class="nav_link"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Stats</span> 
                    </a>  -->
                </div>
            </div> 
            <a  onclick="logout();" class="nav_link logout" class="btn" href="./php/logout.php"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">SignOut</span>
             </a>
        </nav>
    </div>
    <!--Container Main start-->
    <!-- <div class="height-100 bg-light">
        <h4>Main Components</h4>
    </div> -->
    <!--Container Main end-->
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>
    document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) =>{
            const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if(toggle && nav && bodypd && headerpd){
                toggle.addEventListener('click', ()=>{
                    // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    // bodypd.classList.toggle('body-pd')
                    // add padding to header
                    // headerpd.classList.toggle('body-pd')
                })
            }
        }

        

        showNavbar('header-toggle','nav-bar','body-pd','header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        // function colorLink(){
        //     if(linkColor){
        //         linkColor.forEach(l=> l.classList.remove('active'))
        //         this.classList.add('active')
        //     }
        // }
        // linkColor.forEach(l=> l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
    });
    </script>
    <script type='text/javascript'>
        var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
            e.preventDefault();
        });

        function logout() {
            request('./php/logout.php', false, function(data) {
                if(data === '0') {
                    window.location = 'login';
                }
        });
}       

// <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js">

      </script>

</body>
</html>