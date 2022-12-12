<?php
require_once 'template/header.php'; 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
    rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

    <!-- jQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>
    
    <section class="section middle d-flex justify-content-center">
    <main class="main">
        <header>File Uploader JavaScript</header>
        <form  method="post" id="upload_receipt" enctype="multipart/form-data" action = "php/upload_receipt.php">
            <div class="content">
                <div class="wrapper">
                    <!-- <input class="file-input" type="file" name="file" hidden>
                    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                    <p>Browse File to Upload</p> -->
                    <!-- <div id="errs" class="errcontainer"></div> -->

                    <div class="drag-area input_field">
                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>

                        <div class="text">
                            <p>Drop  file here</p>

                            <button>Browse File</button>
                        </div>
                        <input class="file-input" type="file" name="file" hidden>
                    </div>
                    

                    <div class="form-area input_field">
                        <!-- Text input -->
                        <div class="form-outline mb-3">
                            <input type="text" id="tittle" class="form-control" name="tittle" required />
                            <label class="form-label" for="tittle">Tittle</label>
                        </div>

                        <!-- Text input -->
                        <div class="select-form" >
                            <select class="form-select  mb-3" id='selUser' name="tax_type" required>
                                <option disabled selected>Type</option>
                                <option value="Annuity">Annuity</option>
                                <option value="Parent_Medical">Parent Medical</option>
                                <option value="Education_Fees">Education Fees</option>
                                <option value="Medical_Expenses">Medical Expenses</option>
                                <option value="Lifestyle">Lifestyle</option>
                                <option value="Lifestyle_Sports">Lifestyle (Sports)</option>
                                <option value="Lifestyle_Additional">Lifestyle (Additional)</option>
                                <option value="Domestic_Travel_Expenses">Domestic Travel Expenses</option>
                                <option value="Education_Medical_Insurance">Education & Medical Insurance</option>
                                <option value="Supporting_Equipment">Medical treatment, special needs, and carer expenses for parents <i><span tittle="amin"><iconify-icon icon="material-symbols:info-outline-rounded"></span></iconify-icon></i></option>
                                <!-- <option value=""></option> -->
                            </select>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="date" id="receipt_date" class="form-control" name="receipt_date" required />
                            <label class="form-label" for="receipt_date">Date</label>
                        </div>

                        <!-- Number input -->
                        <div class="form-outline mb-4">
                            <input type="number" id="amount" class="form-control" name="amount" required />
                            <label class="form-label" for="amount">Price</label>
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4" >
                            <textarea class="form-control" id="description" rows="4" name="description" required ></textarea>
                            <label class="form-label" for="description">Description</label>
                        </div>

                    </div>
                </div>
                <button>upload</button>
                
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
    $(document).ready(function(){
 
    // Initialize select2
    $("#selUser").select2();

 // Read selected option
    $('#but_read').click(function(){
        var username = $('#selUser option:selected').text();
        var userid = $('#selUser').val();

        $('#result').html("id : " + userid + ", name : " + username);

    });
    // $("#selboxChild").select2({ width: '10px', dropdownCssClass: "bigdrop" });

    var $sel = $('#sel'); 
        $sel.find('option').hover(
            function(){
                $sel.attr('title',$(this).attr('title'));
                console.log($(this).attr('title'))
            }, 
            function(){
                $sel.attr('title','');
            });

});
</script>
</body>
</html>
