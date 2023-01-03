<?php
	require_once 'php/utils.php'; 
	require_once 'template/header.php';
    session_start();
    $user_id = $_SESSION['userID'];
   
    $C = connect();
    $statusMsg = '';
    // if (isset($_POST['upload'])) {
    //     // Get image name
    //     $image = $_FILES['image']['name'];
    //     // Get text
    //     $image_text = mysqli_real_escape_string(`$db`, $_POST['image_text']);
  
    //     // image file directory
    //     $targetDir = "image/profile_image".basename($image);
  
        // $sql = "UPDATE  USERS (picture_link) VALUES ('$image_text') WHERE id=$user_id";
    //     // execute query
    //     mysqli_query($C, $sql);
  
    //     if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir)) {
    //         $msg = "Image uploaded successfully";
    //     }else{
    //         $msg = "Failed to upload image";
    //     }
    // } 


    // File upload path
    
    $targetDir = "image/profile_image/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"])){
        $monthly_salary = $_POST['monthly-salary'];
        $yearly_tax = $_POST['chargeable_income_tax'];

        if(!empty($_FILES["file"]["name"])){
            
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $C->query("UPDATE users SET picture_link = '$fileName', monthly_income='$monthly_salary'  where id='$user_id'");
                    
                    // $query = "profile_image (id,picture_name) VALUES ('1','$fileName') ";
                    // $sql = sqlInsert($C, $query);
                    if($insert){
                        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        }

        else {
            // Insert image file name into database
            $insert = $C->query("UPDATE users SET monthly_income='$monthly_salary', yearly_tax='$yearly_tax'  where id='$user_id'");
                    
            // $query = "profile_image (id,picture_name) VALUES ('1','$fileName') ";
            // $sql = sqlInsert($C, $query);
            if($insert){
                $statusMsg = "The file has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }

    }else{
        $statusMsg = 'Please select a file to upload.';
    }



    // if (isset($_POST['submit'])) {
    //     $monthly_salary = $_POST['monthly-salary'];
    //     $query = "INSERT into profile_image (id,picture_name) VALUES ('12','$monthly_salary')";
    //     $sql = sqlInsert($C, $query);
    //     if($sql){
    //         $statusMsg = "The file has been uploaded successfully.";

    //     }else{
    //         $statusMsg = "File upload failed, please try again.";
    //     } 
    // }

?>


<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Snippet - BBBootstrap</title>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
        <link href='#' rel='stylesheet'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link rel="stylesheet"  href ='css/profile-setting.css'/>
        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
    <body className='snippet-bodys '>
    
        <?php 
            $query1 = "SELECT * FROM users where id='$user_id'";
            $sql1 = mysqli_query($C, $query1);
            while ($row = mysqli_fetch_array($sql1)) {
                $monthly_income=$row['monthly_income']*12;
        ?>
        
        <form method="post" id="upload_receipt" class="content" enctype="multipart/form-data" >
            <div class="container">
                <div class="wrapper1 bg-white mt-sm-5">
                    <h4 class="pb-4 border-bottom">Account settings</h4>
                    <div class="d-flex align-items-start py-3 border-bottom ">
                        <img src="image/profile_image/<?= $row['picture_link'];?>"
                            class="img" alt="" id="profile_image">
                        <div class="pl-sm-4 pl-2 ms-3" id="img-section">
                            <b>Profile Photo</b>
                            <p>Accepted file type .png. Less than 1MB</p>
                            <!-- <input type="file" name="file" class="btn button border"> -->
                            <input type="file" id="myFileInput" name='file' style="display:none;" accept="image/png, image/gif, image/jpeg"/>
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
                                
                                <input type="text" name="firstname" class="bg-light form-control" placeholder="" value="<?= $row['name'];?>">
                                
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" class="bg-light form-control" placeholder="" value="<?= $row['last_name'];?>">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="email">Email Address</label>
                                <input type="text" class="bg-light form-control" placeholder="" value="<?= $row['email'];?>" readonly>
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
                                <label for="monthly-salary">Monthly Salary (RM)</label>
                                
                                <input type="number" class="bg-light form-control" placeholder="<?= $row['monthly_income'];?>" name="monthly-salary" id="monthly-salary" value="" onchange="annuallies(this.value);" min="0" >
                                
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="annually">Annual Salary (RM)</label>
                                <input type="number" class="bg-light form-control" placeholder="<?= $row['monthly_income']*12;?>" name="annually" id="annualli"   readonly>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="employee-epf">employee epf (RM)</label>
                                <input type="number" class="bg-light form-control" placeholder="<?= $row['monthly_income']*0.09;?>" id="epfs" name="epfs" value="" readonly>
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="socso">Socso (RM)</label>
                                <input type="tel" class="bg-light form-control" placeholder="<?= $row['monthly_income']*0.22/100;?>" id="socso" readonly>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="employee-epf">eis(-) (RM)</label>
                                <input type="text" class="bg-light form-control" placeholder="<?= $row['monthly_income']*0.000878;?>" id="eis" readonly>
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="socso">Zakat</label>
                                <input type="tel" class="bg-light form-control" placeholder="<?= $row['monthly_income']*0.014667;?>">
                            </div>
                        </div>

                        <div class="row py-2 border-bottom">
                            <div class="col-md-6">
                                <label for="employee-epf">Total Yearly Tax: (RM)</label>
                                <input type="text" class="bg-light form-control" placeholder="<?= $row['yearly_tax'];?>"  id="chargeable_income_tax" name="chargeable_income_tax">
                            </div>
                            <!-- <div class="col-md-6 pt-md-0 pt-3">
                                <label for="socso">Zakat</label>
                                <input type="tel" class="bg-light form-control" placeholder="<?= $row['monthly_income']*0.014667;?>" >
                            </div> -->
                        </div>

                        <div class="py-3 pb-4">
                            <button class="btn btn-primary mr-3" type="submit" id="submit" name="submit" value="Upload">Save Changes</button>
                            <!-- <button class="btn border button">Cancel</button> -->
                        </div>

                    </div>
                </div>
            </div>
        </form>
        
        <?php };?>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
        <script src="js/calculator.js"></script>
        <script >
            
            var monthly_salary = document.querySelector("#monthly_salary");
            function annuallies(value){
                document.getElementById('annualli').value = value*12;
                document.getElementById('epfs').value = value*0.09;
                document.getElementById('socso').value = value*0.22/100;
                document.getElementById('eis').value = value*0.000878;
                console.log(value);
                let current_tax_amount = tax_amount(value*12-9000);
                document.getElementById('chargeable_income_tax').value = current_tax_amount;

            }
            function epf(value){}

            let current_tax_amount = tax_amount(<?=$monthly_income-9000?>);
            console.log(current_tax_amount);
            document.getElementById("annualli").innerHTML = monthly_salary*12;
            document.getElementById("total_y_tax").value = current_tax_amount;
            


            // var myLink = document.querySelector('a[href="#"]');
            // myLink.addEventListener('click', function(e) {
            //     e.preventDefault();
            // });
            const imgInput = document.querySelector('input');
            const imgEl = document.getElementById("profile_image");
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


            $("#submit").click(function () {
  
                    swal ({
                    title: "Fields Empty!!",
                    text: "Please check the missing field!!",
                    icon: "warning",
                    button: "Ok",
                    });
                    alert("amin");
            });
        </script>
                            
    </body>
</html>