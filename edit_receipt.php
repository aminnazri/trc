<?php
require_once 'template/header.php'; 
require_once 'php/utils.php'; 
$C = connect();
$img_id = $_GET['id'];
echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
$sql = "SELECT * FROM images where image_id = '$img_id'";
$result = mysqli_fetch_array(mysqli_query($C, $sql));
$option = $result['category'];



if(isset($_POST["submit"])){
    $tittle = $_POST['tittle'];
    $tax_type = $_POST['tax_type'];
    $description = $_POST['description'];
    $receipt_date = $_POST['receipt_date'];
    $parts = explode('-', $_POST['receipt_date']);
    $year = $parts[0];
    $amount = $_POST['amount'];

    $insert = $C->query("UPDATE images SET tittle = '$tittle', category = '$tax_type',  receipt_date = '$receipt_date', YEAR = '$year', amount = '$amount',  description='$description'  where image_id='$img_id'");
    // header("Location: profile-setting");
    // echo "<script> location.href='edit_receipt?id=".$img_id."&result=success'; </script>";
    
    if ($insert) {
    //     // header("Location: edit_receipt?id=$img_id");
    // }
    // $sql = sqlInsert($C, $query);
    ?>
    <script type="text/javascript">

            var url_string =location.href; 
            var url = new URL(url_string);
            var c = url.searchParams.get("id");
            swal("Receipt details updated", "success").then((value) => 
            {
                window.location.replace("edit_receipt?id=<?= $img_id?>");
            });
        </script>
    
    <?php
    }
  }
?>



<!DOCTYPE  html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag & Drop or Browse: File Upload | CodingNepal</title>
    <link rel="stylesheet" href="css/upload_receipt.css">

     <!-- bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->

        <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
    rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

    <!-- jQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    
    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
    <section class="section middle d-flex justify-content-center">
    <main class="main">
        <header>Receipt Uploader</header>
        <form  method="post" id="upload_receipt" >
            <div class="content rounded-7 border border-2">
                <div class="wrapper">
                    <!-- <input class="file-input" type="file" name="file" hidden>
                    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                    <p>Browse File to Upload</p> -->
                    <!-- <div id="errs" class="errcontainer"></div> -->

                    <div class="image">
                        
                        <div class="drag-area input_field col-sm-11 "  >
                            <!-- <img src="" class="img " alt="" id="profile_image"> -->
                            <div id="display_here">
                                <img src="receipt_image/<?= $result['file_name'];?>" class="img" alt="" id="profile_image">
                            </div>
                            <!-- <div class="icon" id="icon">
                                <i class="fas fa-cloud-upload-alt" ></i>
                            </div> -->

                            
                        </div>
                        <!-- <div class="custom-file">
                        <input class="file-input mt-2 custom-file-input" type="file" name="file"  id="customFileLangHTML">
                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Bestand kiezen"></label>
                        </div> -->
                        <!-- 
                        <div class="mb-3 col-sm-11">
                            <label for="formFile" class="form-label" type="file" ></label>
                            <input class="form-control" type="file" id="formFile" name="file" required>
                        </div> -->
                    </div>
                    

                    <div class="form-area input_field">
                        <!-- Text input -->

                        <div class="row py-2">
                            <div class="col-md-12">
                                <label for="firstname">Title</label>
                                
                                <input type="text"  class="bg-light form-control" placeholder=""  id="tittle" name="tittle" value="<?= $result['tittle'];?>">
                                
                            </div>
                            <div class="col-md-12 pt-md-0 pt-3">
                                <label for="lastname">Type</label>
                                <!-- <input type="text" name="lastname" class="bg-light form-control" placeholder="" value=""> -->
                                <div class="select-form" >
                                    <select class="form-select h-auto  mb-3" id='selUser' name="tax_type" required>
                                        <option disabled selected>Type</option>
                                        <option value="parent_medical" <?php if($option == "parent_medical") echo 'selected = "selected"'; ?>>Medical treatment, special needs, and carer expenses for parents</option>
                                        <!-- education -->
                                        <option value="education_fees" <?php if($option == "education_fees") echo 'selected = "selected"'; ?>>Education fees (self)</option>
                                        <!-- medical 8000-->
                                        <option value="medical_expenses" <?php if($option == "medical_expenses") echo 'selected = "selected"'; ?>>Medical Expenses</option> 
                                        <!-- lifestyle -->
                                        <option value="lifestyle" <?php if($option == "lifestyle") echo 'selected = "selected"'; ?>>Lifestyle self</option><!-- 2500 -->
                                        <option value="lifestyle_addition" <?php if($option == "lifestyle_addition") echo 'selected = "selected"'; ?>>Purchase of personal computer, smartphones, or tablet for self, spouse, or child</option><!-- 2500 -->
                                        <option value="lifestyle_sport" <?php if($option == "lifestyle_sport") echo 'selected = "selected"'; ?>>Expenses related to sports activity for self</option><!-- 500 -->
                                        <option value="lifestyle_travel" <?php if($option == "lifestyle_travel") echo 'selected = "selected"'; ?>>Tourist accommodation or attractions</option><!-- 1000 -->
                                        <!-- parenthood -->
                                        <option value="breast_feeding" <?php if($option == "breast_feeding") echo 'selected = "selected"'; ?>>Breast Feeding</option>
                                        <option value="childcare_fees" <?php if($option == "childcare_fees") echo 'selected = "selected"'; ?>>Childcare fees</option>
                                        <option value="sspn" <?php if($option == "sspn") echo 'selected = "selected"'; ?>>Net deposit in SSPN</option>
                                        <!-- <option value="">Ordinary child relief (under age of 18)</option>
                                        <option value="">Child (18+) in full-time education</option> -->
                                        <!-- insurance and investment -->
                                        <option value="life_insurance" <?php if($option == "life_insurance") echo 'selected = "selected"'; ?>>Life insurance and EPF</option><!-- 7000 -->
                                        <option value="edu_med_ins" <?php if($option == "edu_med_ins") echo 'selected = "selected"'; ?>>Education and medical insurance</option><!-- 3000 -->
                                        <!-- disable persons -->
                                        <option value="equipment_disable" <?php if($option == "equipment_disable") echo 'selected = "selected"'; ?>>Equipment for disabled self, spouse, child, and parent</option>
                                        <!-- <option value="">Disabled individual</option>
                                        <option value="">Disabled husband/wife</option>
                                        <option value="">Additional relief for disabled child (18+) in higher education</option> -->

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="firstname">Date</label>
                                
                                <input type="date" class="bg-light form-control" placeholder=""  id="receipt_date" name="receipt_date" value="<?= $result['receipt_date'];?>">
                                
                            </div>
                            <div class="col-md-12 pt-md-0 pt-3">
                                <label for="amount">Price</label>
                                <input type="text" class="bg-light form-control" placeholder="" id="amount" name="amount" value="<?= $result['amount'];?>">
                            </div>
                            <div class="col-md-12 pt-md-0 pt-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" class="bg-light form-control" placeholder=""  value=""><?= $result['description'];?></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="py-3 pb-4 ">
                    <button class="btn btn-primary " type="submit" name="submit" onsubmit="return submitForm(this);">UPDATE</button>
                </div>
            </div>
            
        </form>
        <section class="progress-area"></section>
        <section class="uploaded-area"></section>
    </main>
    </section>
                        
    <!-- <div class="drag-area">
        
        <header>Drag & Drop to Upload File</header>
        <span>OR</span>
        <button>Browse File</button>
        <input type="file" hidden>
    </div> -->


  <script src="js/upload_receipt.js"></script>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script>
    // $(document).ready(function(){
 
    // Initialize select2
    // $("#selUser").select2();

//  // Read selected option
//     $('#but_read').click(function(){
//         var username = $('#selUser option:selected').text();
//         var userid = $('#selUser').val();

//         $('#result').html("id : " + userid + ", name : " + username);

//     });
//     // $("#selboxChild").select2({ width: '10px', dropdownCssClass: "bigdrop" });

//     var $sel = $('#sel'); 
//         $sel.find('option').hover(
//             function(){
//                 $sel.attr('title',$(this).attr('title'));
//                 console.log($(this).attr('title'))
//             }, 
//             function(){
//                 $sel.attr('title','');
//         });

//     });
//     var output = document.getElementById("display_here");
//     output.innerHTML = "";
    
//     const imgInput = document.querySelector('input')
//     const imgEl = document.getElementById("profile_image")
//     imgInput.addEventListener('change', () => {
//         if (imgInput.files && imgInput.files[0]) {
//             const reader = new FileReader();
//             reader.onload = (e) => {
//             // imgEl.src = e.target.result;
//             var img = '<img src="' + e.target.result + '">';
    
//     output.innerHTML = img;
//             }
//             reader.readAsDataURL(imgInput.files[0]);
//             document.getElementById("text").style.display = "none";
//             document.getElementById("icon").style.display = "none";
//             // var img = '<img src="' + links[userChoice] + '">';
    
//             output.innerHTML = img;
//         }
//     })
function submitForm (form) {
    swal({
        title: "Are you sure?",
        text: "This form will be submitted",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((isokay) => {
        if (isokay) {
            form.submit();
        }
    
});return false;}

</script>

<script type="text/javascript">

        receipt_date.max = new Date().toISOString().split("T")[0];

        var today = new Date();
        // this returns the first day of the previous month
        yourMinDate = new Date(today.getFullYear(), today.getMonth()-1, 1);
        console.log(yourMinDate);

        $(document).ready(function(){
            $("#txtDate").datepicker({ minDate: 0, maxDate: '+1M', numberOfMonths:2 });
        });
        
        DateTime now = DateTime.Now;
        DateTime minDate = now.AddYears(-1)
        // DateTime maxDate = now.AddYears(1)

        dateTimePicker.MinDate = minDate 
        // dateTimePicker.MaxDate = maxDate
        document.title = 'upload receipt';
    </script>
        <script type="text/javascript">
		// var user = JSON.parse(document.getElementById('data').textContent);
		$(document).ready(function () {
    		$(".upload_receipt").addClass("active");
		});
        document.title = 'Upload Receipt';
	</script>
    <script src="script.js"></script>
</body>
</html>
