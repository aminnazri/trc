<?php
	require_once 'php/utils.php'; 
    require_once 'folder_sum.php'; 
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

        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $monthly_salary = $_POST['monthly_income'];
        $epf = $_POST['epf'];
        $socso = $_POST['socso'];
        $pcb = $_POST['pcb'];
        $zakat = $_POST['zakat'];
        $current_tax = $_POST['current_tax'];
        $yearly_tax = $_POST['chargeable_income_tax'];

        $taxable_income = $monthly_salary*12 - $epf - $socso - 9000;
        $tax_amount =  tax_amount($taxable_income)-$zakat-$pcb;

        if(!empty($_FILES["file"]["name"])){
            
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf','JPG');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $C->query("UPDATE users SET picture_link = '$fileName', name='$first_name', last_name='$last_name'  where id='$user_id'");
                    
                    // $query = "profile_image (id,picture_name) VALUES ('1','$fileName') ";
                    // $sql = sqlInsert($C, $query);
                    if($insert){
                        header("Location: profile-setting");
                        echo "<script> location.href='profile-setting2?result=success'; </script>";

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
        elseif (empty($_FILES["file"]["name"])){
            $insert = $C->query("UPDATE users SET name='$first_name', last_name='$last_name'  where id='$user_id'");
            $insert2 = $C->query("UPDATE tax_calculator SET month_income='$monthly_salary', epf='$epf', socso='$socso',  pcb='$pcb',  zakat='$zakat', current_tax='$tax_amount'  where user_id='$user_id'");
            if($insert2){

                echo "<script> location.href='profile-setting2?result=success'; </script>";
                $statusMsg = "The file has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }

        else {
            // Insert image file name into database
            // $insert = $C->query("UPDATE users SET monthly_income='$monthly_salary', yearly_tax='$yearly_tax'  where id='$user_id'");
            $insert = $C->query("UPDATE tax_calculator SET month_income='$monthly_salary', epf='$epf', socso='$socso',  pcb='$pcb',  zakat='$zakat'  where user_id='$user_id'");

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
        <!-- <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'> -->
        <link href='#' rel='stylesheet'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
        <!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
        <link rel="stylesheet"  href ='css/profile-setting.css'/>
</head>
    <body className='snippet-bodys '>
    
        <?php 
            $query = "SELECT * FROM users where id='$user_id'";
            $user_profile_sql = mysqli_query($C, $query1);
            while ($row = mysqli_fetch_array($user_profile_sql)) {
                // $monthly_income=$row['monthly_income']*12;
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
                                <b>Delete your account</b>
                                <p></p>
                            </div>
                            <div class="ml-auto">
                                
                                <button class="btn danger" onclick="deleteAccount();">Delete</button>
                            </div>
                        </div>
                    </div>
                    <?php };?>
                </div>
                <div class="wrapper2 bg-white mt-sm-5">
                    <h4 class="pb-4 border-bottom">Current Tax Based on payslip</h4>

                    <?php 
                        $query = "SELECT * FROM tax_calculator where user_id='$user_id'";
                        $tax = mysqli_query($C, $query);
                        while ($row_tax = mysqli_fetch_array($tax)) {
                            // $monthly_income=$row['monthly_income']*12;
                    ?>
                    <div class="py-2">
                    <div class="row py-2">
                            <div class="col-md-6">
                                <label for="monthly-salary">Monthly Salary (RM)</label>
                                
                                <input type="number" class="bg-light form-control" placeholder="" name="monthly_income" id="monthly_income" value="<?= $row_tax['month_income'];?>" onchange="annuallie(this.value);" min="0" >
                                
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="annually">Annual Salary (RM)</label>
                                <input type="number" class="bg-light form-control" placeholder="" name="annually" id="annualli" value="<?= $row_tax['month_income']*12;?>"  readonly>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="employee-epf">employee epf (RM)</label>
                                <input type="number" class="bg-light form-control" placeholder="<?= $row_tax['epf'];?>" id="epf" name="epf" value="<?= $row_tax['epf'];?>"  >
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="socso">Socso (RM)</label>
                                <input type="tel" class="bg-light form-control" placeholder="<?= $row_tax['socso'];?>" id="socso" name="socso" value="<?= $row_tax['socso'];?>">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for="employee-epf">PCB</label>
                                <input type="text" class="bg-light form-control" placeholder="<?= $row_tax['pcb'];?>" id="pcb"  name="pcb" value="<?= $row_tax['pcb'];?>">
                            </div>
                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="socso">Zakat</label>
                                <input type="tel" class="bg-light form-control" placeholder="<?= $row_tax['zakat'];?>" id="zakat" name="zakat" value="<?= $row_tax['zakat'];?>">
                            </div>
                        </div>

                        <div class="row py-2 border-bottom">

                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="pcb">Total Yearly Tax: (RM)</label>
                                <input type="tel" class="bg-light form-control" placeholder="<?= $row['current_tax'];?>"  id="" name="" value="<?= $row_tax['current_tax'];?>" readonly>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="employee-epf">Total Yearly Tax: (RM)</label>
                                <input type="text" class="bg-light form-control" placeholder=""  id="chargeable_income_tax" name="chargeable_income_tax">
                            </div> -->

                        </div>
                        <?php };?>
                        <div class="py-3 pb-4">
                            <button class="btn btn-primary mr-3" id="submit" type="submit" name="submit" value="Upload">Save Changes</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
        


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
           

            let current_tax_amount = tax_amount(<?=$monthly_income-9000?>);
            console.log(current_tax_amount);
            document.getElementById("annualli").innerHTML = monthly_salary*12;
            // document.getElementById("total_y_tax").value = current_tax_amount;
            


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
            var url_string =location.href; 
            var url = new URL(url_string);
            var c = url.searchParams.get("result");
            console.log(c);
                    if (c == "success") {
                        swal({
                    title: "Profile Updated",
                    // text: "This form will be submitted",
                    icon: "success",


                })
            }


        </script>
                            
    </body>
</html>