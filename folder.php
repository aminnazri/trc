<?php
require_once 'php/utils.php'; 
require_once 'folder_sum.php'; 
require_once 'template/header.php'; 
$year = "2022";

if ($_GET['year'] != null) {
    $year = $_GET['year'];
}





?>
<!DOCTYPE html>
<html lang="en">
<style>

</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <!-- boxicons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <!-- jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    
    <link rel="stylesheet"  href ='css/folder.css'/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Folder</title>
</head>
<body class="">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


    <div class="middle d-flex justify-content-center">
    
        <div class="container mt-5 ml-6  p-3 place " >
            <div class="d-flex justify-content-center a"> 
                
                <div class="filter">
                    
                    <form action="" method="post">
                    <select class="select" name="selectYear"id="selectYear" onchange='window.document.location.href=this.options[this.selectedIndex].value;'value="GO">                    
                        <!-- <label class="form-label select-label" >a</label> -->
                        <!-- <option value="" selected>year</option> -->
                        <option <?php if($_GET['year'] == "2022") echo "selected=selected"; ?> value="folders.php?year=2022">2022</option>
                        <option <?php if($_GET['year'] == "2021") echo "selected=selected"; ?> value="folders.php?year=2021">2021</option>
                        <option <?php if($_GET['year'] == "2020") echo "selected=selected"; ?> value="folders.php?year=2020">2020</option>
                        <option <?php if($_GET['year'] == "2019") echo "selected=selected"; ?> value="folders.php?year=2019">2019</option>
                        <option <?php if($_GET['year'] == "2018") echo "selected=selected"; ?> value="folders.php?year=2018">2018</option>
                        <option <?php if($_GET['year'] == "2017") echo "selected=selected"; ?> value="folders.php?year=2017">2017</option>
                        <option <?php if($_GET['year'] == "2016") echo "selected=selected"; ?> value="folders.php?year=2016">2016</option>

                    
                    </select>
                    </form> 
                </div>
                <div class="search"> 

                    <input type="text" class="search-input" placeholder="Search..." name=""> 
                    <a href="#" class="search-icon"> 
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </div>
            <div class="row gy-3 my-3" id="content">
 
                <div class="col-sm-6 col-md-4 col-lg-3" >
                    <div class="card " style="width: 12rem;" data-string="amin">
                        <div class="image text-center text-bg-info rounded m-2">
                            <svg style="width: 50%; height: auto;" class="card-image-top rounded " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"/></svg>
                        </div>
                        <div class="card-body m-6">
                            <h5 class="title">
                                Medical
                            </h5>
                            <i></i>
                            <div class="text" >
                                <small class="card-text1">Claimed : RM 800</small><br>
                                <small class="card-text2">Balance : RM 70</small>
                            </div>
                        </div>
                    </div>
    
                    <div class="card " style="width: 12rem;"data-string="Jana B">
                        <div class="image text-center text-bg-info rounded m-2">
                            <svg style="width: 50%; height: auto;" class="card-image-top rounded " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"/></svg>
                        </div>
                        <div class="card-body m-6">
                            <h5 class="title">
                                Medical
                            </h5>
                            <i></i>
                            <div class="text" >
                                <small class="card-text1">Claimed : RM 800</small><br>
                                <small class="card-text2">Balance : RM 70</small>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>


    

    
<script src="js/tax_deduction_info.js"></script>
<script type="">
    let years = "2023";
    function selectYear(){
        var select = document.getElementById('selectYear');
	    var y = select.options[select.selectedIndex];
        // var selectYear = document.getElementById("selectYear").value;
        years = y;
    // selectYear()
        console.log(years.value);


    return years.value;
}
console.log(selectYear());
// selectYear();


    // const dc_parent_medical = "Include expenses to care for parents, i.e. through carer, for parents who suffer from diseases, physical or mental disabilities and need regular treatment certified by qualified medical practitioner. Include treatment and care at home, day care centres or home care centres.";


    // console.log(lifestyle);
    const container = document.getElementById('content');
    const valuesCards = [{
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'All',
        info: '',
        text1: '',
        text2: '',
        alt: 'image',
        link: 'all',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Parent Medical',
        info: parent_medical,
        text1: '<?php echo $parent_medical?>',
        text2: '<?php echo 8000 - $parent_medical?>',
        alt: 'image',
        link: 'parent_medical',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Education Fees<small>(self)</small>',
        info: education_fees,
        text1: '<?php echo $edu_fees?>',
        text2: '<?php echo 7000-$edu_fees?>',
        alt: 'image',
        link: 'education_fees',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },

    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Medical Expenses',
        info: medical_expenses,
        text1: '<?php echo $med_expenses?>',
        text2: '<?php echo 8000-$med_expenses?>',
        alt: 'image',
        link: 'medical_expenses',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Lifestyle',
        info: lifestyle,
        text1: '<?php echo $lifestyle?>',
        text2: '<?php echo 2500-$lifestyle?>',
        alt: 'image',
        link: 'lifestyle',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },

    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Lifestyle (Sports)',
        info: lifestyle_sport,
        text1: '<?php echo $lifestyle_sport?>',
        text2: '<?php echo 500-$lifestyle_sport?>',
        alt: 'image',
        link: 'lifestyle_sport',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Lifestyle (Additional)',
        info: lifestyle_addition,
        text1: '<?php echo $lifestyle_add?>',
        text2: '<?php echo 2500-$lifestyle_add?>',
        alt: 'image',
        link: 'lifestyle_addition',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Domestic Travel Expenses',
        info: lifestyle_travel,
        text1: '<?php echo $travel?>',
        text2: '<?php echo 1000-$travel?>',
        alt: 'image',
        link: 'lifestyle_travel',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Breast Feeding',
        info: breast_feeding,
        text1: '<?php echo $travel?>',
        text2: '<?php echo 1000-$travel?>',
        alt: 'image',
        link: 'breast_feeding',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Childcare fees',
        info: childcare_fees,
        text1: '<?php echo $travel?>',
        text2: '<?php echo 1000-$travel?>',
        alt: 'image',
        link: 'childcare_fees',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Net deposit in SSPN',
        info: sspn,
        text1: '<?php echo $travel?>',
        text2: '<?php echo 1000-$travel?>',
        alt: 'image',
        link: 'sspn',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Life insurance and EPF',
        info: life_insurance,
        text1: '<?php echo $travel?>',
        text2: '<?php echo 1000-$travel?>',
        alt: 'image',
        link: 'life_insurance',
        bg_color: 'text-bg-info',
        year : '<?php echo $year?>'
    }
]

    function returnCards(valuesCards) {
        return  valuesCards.map(valuesCard => `
        
        <div class="col-sm-6 col-md-3 col-lg-3" >
        

            <div class="card" data-html="true " data-string="${valuesCard.title}" width="20px"rel="tooltip">
                <a href = 'images.php?f=${valuesCard.link}&year=${valuesCard.year}' >
                    <div class="image text-center ${valuesCard.bg_color} rounded m-2">
                        <svg style="width: 50%; height: auto;" class="card-image-top rounded " ${valuesCard.image}"></svg>
                    </div>
                    <div class="card-body budi">
                        <div class = "d-flex justify-content-between align-content-center">
                            <h5 class="card-title">${valuesCard.title}</h5>
                            <i href="#" data-bs-toggle="tooltip" data-bs-placement="top"  title="${valuesCard.info}"><span><iconify-icon icon="material-symbols:info-outline-rounded"></span></iconify-icon></i>

                        </div>
                        <div class = "text">
                        
                            <small class="">Claimed : RM ${valuesCard.text1}</small>
                            <br>
                            <small class="value2" id="value2">Balance : RM ${valuesCard.text2}</small>    
                        </div>
                    </div>
                </a>
            </div>
        </div>

        `).join('') + "</div>";
    }
    container .innerHTML = returnCards(valuesCards);

    $(document).ready(function () {
    		$(".folders").addClass("active");
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    const useStyles = makeStyles(theme =>
        createStyles({
            tooltip: {
                maxWidth: '200px',
            },
            tooltipPlacementTop: {
                margin: '0px 0',
            },
            tooltipPlacementBottom: {
                margin: '0px 0',
            },
        })
    )


    document.title = 'Folder';
    


</script>
<script>


    $(".search-input").on("keyup", function() {
    var input = $(this).val().toUpperCase();

        $(".card").each(function() {
            if ($(this).data("string").toUpperCase().indexOf(input) < 0) {
            $(this).hide();
            } else {
            $(this).show();
            }
        })
    });


</script>



<select id="selectYear" onchange="selectYear()">
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
</select>
</body>
</html>