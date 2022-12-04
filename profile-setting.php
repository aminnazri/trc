<?php
	require_once 'php/utils.php'; 
	require_once 'template/header.php';
    session_start();
    $user_id = $_SESSION['userID'];
   
    $C = connect();






?>


<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Snippet - BBBootstrap</title>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
        <link href='#' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link rel="stylesheet"  href ='css/profile-setting.css'/>
</head>
    <body className='snippet-bodys '>
    
        <?php 
            $query1 = "SELECT * FROM users where id='$user_id'";
            $sql1 = mysqli_query($C, $query1);
            while ($row = mysqli_fetch_array($sql1)) {
        ?>
        
        <form method="post" id="upload_receipt" class="content" enctype="multipart/form-data" >
            <div class="container">
                <div class="wrapper1 bg-white mt-sm-5">
                    <h4 class="pb-4 border-bottom">Account settings</h4>
                    <div class="d-flex align-items-start py-3 border-bottom ">
                        <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                            class="img" alt="" id="profile_image">
                        <div class="pl-sm-4 pl-2 ms-3" id="img-section">
                            <b>Profile Photo</b>
                            <p>Accepted file type .png. Less than 1MB</p>
                            <!-- <input type="file" name="file" class="btn button border"> -->
                            <input type="file" id="myFileInput" style="display:none;"  accept="image/png, image/gif, image/jpeg"/>
                            <input type="button" class="btn button border"
                                onclick="document.getElementById('myFileInput').click()" 
                                value="Choose Photo" />
                            <!-- <input type="file" class="btn button border"><b>Upload</b></input> -->
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="firstname">First Name</label>
                                
                                <input type="text" class="bg-light form-control" placeholder="" value="<?= $row['name'];?>">
                                
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="bg-light form-control" placeholder="" value="<?= $row['last_name'];?>">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="email">Email Address</label>
                                <input type="text" class="bg-light form-control" placeholder="" value="<?= $row['email'];?>">
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="bg-light form-control" placeholder="">
                            </div>
                        </div>

                        <!-- <div class="py-3 pb-4 border-bottom">
                            <button class="btn btn-primary mr-3">Save Changes</button>
                            <button class="btn border button">Cancel</button>
                        </div> -->
                        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                            <div>
                                <b>Deactivate your account</b>
                                <p>Details about your company account and password</p>
                            </div>
                            <div class="ml-auto">
                                <button class="btn danger">Deactivate</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper2 bg-white mt-sm-5">
                    <h4 class="pb-4 border-bottom">Current Tax</h4>

                    <div class="py-2">
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="monthly-salary">Monthly Salary</label>
                                
                                <input type="text" class="bg-light form-control" placeholder="">
                                
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="annually">Annual Salary</label>
                                <input type="text" class="bg-light form-control" placeholder="">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="employee-epf">employee epf</label>
                                <input type="text" class="bg-light form-control" placeholder="">
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="socso">Socso</label>
                                <input type="tel" class="bg-light form-control" placeholder="">
                            </div>
                        </div>

                        <div class="py-3 pb-4 border-bottom">
                            <button class="btn btn-primary mr-3">Save Changes</button>
                            <button class="btn border button">Cancel</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        
        <?php };?>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script >
            // var myLink = document.querySelector('a[href="#"]');
            // myLink.addEventListener('click', function(e) {
            //     e.preventDefault();
            // });
            const imgInput = document.querySelector('input')
            const imgEl = document.getElementById("profile_image")
            imgInput.addEventListener('change', () => {
                if (imgInput.files && imgInput.files[0]) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                    imgEl.src = e.target.result;
                    }
                    reader.readAsDataURL(imgInput.files[0]);
                }
            })
            document.title = 'Profile Setting';
        </script>
                            
    </body>
</html>