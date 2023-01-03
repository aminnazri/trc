<?php
require_once 'php/utils.php'; 
require 'folder_sum.php';
require_once 'template/header.php'; 

$year = "2023";

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


    <div class="middle ">
    
        <div class="container mt-5 ml-6  p-3  " >
            <div class="d-flex justify-content-center a"> 
                
                <div class="filter">
                    
                    <form action="" method="post">
                    <select class="select" name="selectYear"id="selectYear" onchange='window.document.location.href=this.options[this.selectedIndex].value;'value="GO">                    
                        <!-- <label class="form-label select-label" >a</label> -->
                        <!-- <option value="" selected>year</option> -->
                        <option <?php if($_GET['year'] == "2023") echo "selected=selected"; ?> value="folder.php?year=2023">2023</option>
                        <option <?php if($_GET['year'] == "2022") echo "selected=selected"; ?> value="folder.php?year=2022">2022</option>
                        <option <?php if($_GET['year'] == "2021") echo "selected=selected"; ?> value="folder.php?year=2021">2021</option>
                        <option <?php if($_GET['year'] == "2020") echo "selected=selected"; ?> value="folder.php?year=2020">2020</option>
                        <option <?php if($_GET['year'] == "2019") echo "selected=selected"; ?> value="folder.php?year=2019">2019</option>
                        <option <?php if($_GET['year'] == "2018") echo "selected=selected"; ?> value="folder.php?year=2018">2018</option>
                        <option <?php if($_GET['year'] == "2017") echo "selected=selected"; ?> value="folder.php?year=2017">2017</option>
                        <option <?php if($_GET['year'] == "2016") echo "selected=selected"; ?> value="folder.php?year=2016">2016</option>

                    
                    </select>
                    </form> 
                </div>
                <div class="search"> 

                    <input type="text" class="search-input" placeholder="Search..." name=""> 
                    <a href="#" class="search-icon"> 
                        <i class="fa fa-search"></i>
                    </a>
                </div>


                <div class="pdf_gen ">
                    <form method="get" action="pdf_gen.php" >
                        <input type="text" id="year"  name="year" style="display:none;" value="<?= $year?>">
                        <button type="submit" class="btn btn-primary">PDF</button>

                    </form>
                </div>
            </div>
            <div class="row gy-3 my-3" id="content">
 
                <!-- <div class="col-sm-6 col-md-4 col-lg-3" >
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
                </div> -->
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

    var color_list = ['d5f3f9', 'caf0f8', 'ade8f4', '90e0ef', '48cae4', '00b4d8', '0096c7', '0077b6', '023e8a'];
    var color_list = ['d5a37b', 'e9a87c', 'f1aa7b', 'fcb373', 'fcbf6e', 'fbca6d', 'fbd076', 'fbd58b', 'f9cd8d','f8c78b'];
    // const dc_parent_medical = "Include expenses to care for parents, i.e. through carer, for parents who suffer from diseases, physical or mental disabilities and need regular treatment certified by qualified medical practitioner. Include treatment and care at home, day care centres or home care centres.";

console.log(color_list[1]);
    // console.log(lifestyle);
    const container = document.getElementById('content');
    const valuesCards = [{
        
        image: ' xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12.71 2.29a1 1 0 0 0-1.42 0l-9 9a1 1 0 0 0 0 1.42A1 1 0 0 0 3 13h1v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7h1a1 1 0 0 0 1-1 1 1 0 0 0-.29-.71zM6 20v-9.59l6-6 6 6V20z"></path>',
        title: 'All',
        info: '',
        text1: '',
        text2: '',
        alt: 'image',
        link: 'all',
        bg_color: (color_list[0]),
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Parent Medical',
        info: parent_medical,
        text1: 'Claimed : RM <?php echo $parent_medical?>',
        text2: 'Balance : RM <?php echo 8000 - $parent_medical?>',
        alt: 'image',
        link: 'parent_medical',
        bg_color: color_list[1],
        year : '<?php echo $year?>'
    },
    {
        image: '<svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2 7v1l11 4 9-4V7L11 4z"></path><path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z</path></svg>',
        title: 'Education Fees<small>(self)</small>',
        info: education_fees,
        text1: 'Claimed : RM <?php echo $edu_fees?>',
        text2: 'Balance : RM <?php echo 7000-$edu_fees?>',
        alt: 'image',
        link: 'education_fees',
        bg_color: color_list[2],
        year : '<?php echo $year?>'
    },

    {
        image: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M8.434 20.566c1.335 0 2.591-.52 3.535-1.464l7.134-7.133a5.008 5.008 0 0 0-.001-7.072 4.969 4.969 0 0 0-3.536-1.463c-1.335 0-2.59.52-3.534 1.464l-7.134 7.133a5.01 5.01 0 0 0-.001 7.072 4.971 4.971 0 0 0 3.537 1.463zm5.011-14.254a2.979 2.979 0 0 1 2.12-.878c.802 0 1.556.312 2.122.878a3.004 3.004 0 0 1 .001 4.243l-2.893 2.892-4.242-4.244 2.892-2.891z</path></svg>',
        title: 'Medical Expenses',
        info: medical_expenses,
        text1: 'Claimed : RM <?php echo $med_expenses?>',
        text2: 'Balance : RM <?php echo 8000-$med_expenses?>',
        alt: 'image',
        link: 'medical_expenses',
        bg_color: color_list[3],
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Lifestyle',
        info: lifestyle,
        text1: 'Claimed : RM <?php echo $lifestyle?>',
        text2: 'Balance : RM <?php echo 2500-$lifestyle?>',
        alt: 'image',
        link: 'lifestyle',
        bg_color: color_list[4],
        year : '<?php echo $year?>'
    },

    {
        image: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><circle cx="17" cy="4" r="2"></circle><path d="M15.777 10.969a2.007 2.007 0 0 0 2.148.83l3.316-.829-.483-1.94-3.316.829-1.379-2.067a2.01 2.01 0 0 0-1.272-.854l-3.846-.77a1.998 1.998 0 0 0-2.181 1.067l-1.658 3.316 1.789.895 1.658-3.317 1.967.394L7.434 17H3v2h4.434c.698 0 1.355-.372 1.715-.971l1.918-3.196 5.169 1.034 1.816 5.449 1.896-.633-1.815-5.448a2.007 2.007 0 0 0-1.506-1.33l-3.039-.607 1.772-2.954.417.625z</path></svg>',
        title: 'Lifestyle (Sports)',
        info: lifestyle_sport,
        text1: 'Claimed : RM <?php echo $lifestyle_sport?>',
        text2: 'Balance : RM <?php echo 500-$lifestyle_sport?>',
        alt: 'image',
        link: 'lifestyle_sport',
        bg_color: color_list[5],
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Lifestyle (Additional)',
        info: lifestyle_addition,
        text1: 'Claimed : RM <?php echo $lifestyle_addition?>',
        text2: 'Balance : RM <?php echo 2500-$lifestyle_addition?>',
        alt: 'image',
        link: 'lifestyle_addition',
        bg_color: color_list[6],
        year : '<?php echo $year?>'
    },
    {
        image: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M3.414 13.778 2 15.192l4.949 2.121 2.122 4.95 1.414-1.414-.707-3.536L13.091 14l3.61 7.704 1.339-1.339-1.19-10.123 2.828-2.829a2 2 0 1 0-2.828-2.828l-2.903 2.903L3.824 6.297 2.559 7.563l7.644 3.67-3.253 3.253-3.536-.708z</path></svg>',
        title: 'Domestic Travel Expenses',
        info: lifestyle_travel,
        text1: 'Claimed : RM <?php echo $lifestyle_travel?>',
        text2: 'Balance : RM <?php echo 1000-$lifestyle_travel?>',
        alt: 'image',
        link: 'lifestyle_travel',
        bg_color: color_list[7],
        year : '<?php echo $year?>'
    },
    {
        image: '<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><circle cx="12" cy="6" r="2"></circle><path d="M14 9h-4a1 1 0 0 0-.8.4l-3 4 1.6 1.2L9 13v7h2v-4h2v4h2v-7l1.2 1.6 1.6-1.2-3-4A1 1 0 0 0 14 9z</path></svg>',
        title: 'Breast Feeding',
        info: breast_feeding,
        text1: 'Claimed : RM <?php echo $breast_feeding?>',
        text2: 'Balance : RM <?php echo 1000-$breast_feeding?>',
        alt: 'image',
        link: 'breast_feeding',
        bg_color: color_list[8],
        year : '<?php echo $year?>'
    },
    {
        image: '<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z</path></svg>',
        title: 'Childcare fees',
        info: childcare_fees,
        text1: 'Claimed : RM <?php echo $childcare_fees?>',
        text2: 'Balance : RM <?php echo 3000-$childcare_fees?>',
        alt: 'image',
        link: 'childcare_fees',
        bg_color: color_list[7],
        year : '<?php echo $year?>'
    },
    {
        image: '<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 15c-1.84 0-2-.86-2-1H8c0 .92.66 2.55 3 2.92V18h2v-1.08c2-.34 3-1.63 3-2.92 0-1.12-.52-3-4-3-2 0-2-.63-2-1s.7-1 2-1 1.39.64 1.4 1h2A3 3 0 0 0 13 7.12V6h-2v1.09C9 7.42 8 8.71 8 10c0 1.12.52 3 4 3 2 0 2 .68 2 1s-.62 1-2 1z"></path><path d="M5 2H2v2h2v17a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4h2V2H5zm13 18H6V4h12z</path></svg>'
 ,
        title: 'Net deposit in SSPN',
        info: sspn,
        text1: 'Claimed : RM <?php echo $sspn?>',
        text2: 'Balance : RM <?php echo 8000-$sspn?>',
        alt: 'image',
        link: 'sspn',
        bg_color: color_list[6],
        year : '<?php echo $year?>'
    },
    {
        image: '<svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M15 2.013H9V9H2v6h7v6.987h6V15h7V9h-7z</path></svg>',
        title: 'Life insurance and EPF',
        info: life_insurance,
        text1: 'Claimed : RM <?php echo $life_insurance_epf?>',
        text2: 'Balance : RM <?php echo 7000-$life_insurance_epf?>',
        alt: 'image',
        link: 'life_insurance_epf',
        bg_color: color_list[5],
        year : '<?php echo $year?>'
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Education and medical insurance',
        info: life_insurance,
        text1: 'Claimed : RM <?php echo $edu_med_ins?>',
        text2: 'Balance : RM <?php echo 3000-$edu_med_ins?>',
        alt: 'image',
        link: 'edu_med_ins',
        bg_color: color_list[4],
        year : '<?php echo $year?>'
    },
    {
        image: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><circle cx="9" cy="4" r="2"></circle><path d="M16.98 14.804A1 1 0 0 0 16 14h-4.133l-.429-3H16V9h-4.847l-.163-1.142A1 1 0 0 0 10 7H9a1.003 1.003 0 0 0-.99 1.142l.877 6.142A2.009 2.009 0 0 0 10.867 16h4.313l.839 4.196c.094.467.504.804.981.804h3v-2h-2.181l-.839-4.196z"></path><path d="M12.51 17.5c-.739 1.476-2.25 2.5-4.01 2.5A4.505 4.505 0 0 1 4 15.5a4.503 4.503 0 0 1 2.817-4.167l-.289-2.025C3.905 10.145 2 12.604 2 15.5 2 19.084 4.916 22 8.5 22a6.497 6.497 0 0 0 5.545-3.126l-.274-1.374H12.51z</path></svg>',
        title: 'Equipment for disabled self, spouse, child, and parent',
        info: life_insurance,
        text1: 'Claimed : RM <?php echo $equipment_disable?>',
        text2: 'Balance : RM <?php echo 6000-$equipment_disable?>',
        alt: 'image',
        link: 'equipment_disable',
        bg_color: color_list[3],
        year : '<?php echo $year?>'
    }
]   


    function returnCards(valuesCards) {
        return  valuesCards.map(valuesCard => `
        
        <div class="col-sm-6 col-md-3 col-lg-3" >
        

            <div class="card" data-html="true " data-string="${valuesCard.title}" width="20px"rel="tooltip">
                <a href = 'images.php?f=${valuesCard.link}&year=${valuesCard.year}' >
                    <div class="image text-center rounded m-2" style="background-color:#${valuesCard.bg_color};">
                        <svg style="width: 40%; height: auto;" class="card-image-top rounded m-4" ${valuesCard.image}"></svg>
                    </div>
                    <div class="card-body budi">
                        <div class = "d-flex justify-content-between align-content-center">
                            <h5 class="card-title" >${valuesCard.title}</h5>
                            <i href="#" data-bs-toggle="tooltip" data-bs-placement="top"  title="${valuesCard.info}"><span><iconify-icon icon="material-symbols:info-outline-rounded"></span></iconify-icon></i>

                        </div>
                        <div class = "text">
                        
                            <small class="">${valuesCard.text1}</small>
                            <br>
                            <small class="value2" id="value2">${valuesCard.text2}</small>    
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