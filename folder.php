<?php
require_once 'php/utils.php'; 
require_once 'template/header.php'; 
$parent_medical = get_sum('parent_medical'); //8000
$annuity = get_sum('annuity'); //3000;
$edu_med_ins = get_sum('edu_med_ins'); //3000;
$edu_fees = get_sum('edu_fees'); //7000;
$support_equipment = get_sum('s_e'); //6000;
$med_expenses = get_sum('med_expenses'); //8000;
$epf_kwsp = get_sum('epf_kwsp'); //4000;
$insurance = get_sum('insurance'); //3000;
$lifestyle = get_sum('lifestyle'); //2500;
$lifestyle_add = get_sum('lifestyle_add'); //2500;
$lifestyle_sport = get_sum('lifestyle_sport'); //500;
$socso = get_sum('socso'); //250;
$travel = get_sum('travel'); //1000;
$pcb = get_sum('pcb'); //1000;
$zakat = get_sum('zakat'); //1000;
// echo $lifestyle;
function get_sum($category){

    global $user_id,$C;

    $query = "SELECT * FROM images where category='$category' AND user_id='$user_id'";
    $sql1 = mysqli_query($C, $query);
    $result1 = mysqli_fetch_assoc($sql1);
    // $checker = ;
    if($result1['category'] == null) {
        
        // echo 0;
        return 0; 
    } else {
        $sql = "SELECT (SUM(amount)) AS total 
        FROM images 
        WHERE category='$category' AND user_id='$user_id'";

        $conn = $C->query($sql);
        $get_array = $conn->fetch_array();
        $result = $get_array['total'];
        return $result;    
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<style>
    *{
        text-decoration: none;
    }
    a:link { 
        text-decoration: none; 
        color: black;
    }
    .card:hover{
        /* transform: scale(1.04); */
        transition: all ease-in 0.20s;
        transition: all ease-out 0.20s;
        animation-duration: 1s;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.1);
    }
    body{
        padding:   0;
    }
    .middle{
        display:flex;
        margin-left:20px;
        margin-right:20px;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body class="">

    <!-- <div id="products-cards-container"></div> -->
    <div class="middle">
        <div class="container mt-5 ml-6  p-3 place " >
            <div class="row gy-3 my-3" id="content">
                <div class="col-sm-6 col-md-4 col-lg-3" >
                    <a href="">
                        <div class="card " style="width: 12rem;">
                            <div class="image text-center text-bg-info rounded m-2">
                                <svg style="width: 50%; height: auto;" class="card-image-top rounded " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"/></svg>
                            </div>
                            <div class="card-body m-6">
                                <h5 class="card-title">
                                    Medical
                                </h5>
                                <div class="text" >
                                    <small class="card-text1">Claimed : RM 800</small><br>
                                    <small class="card-text2">Balance : RM 70</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>


    

    

<script type="text/javascript">

    var lifestyle = "<?php echo $lifestyle?>";//8000


    console.log(lifestyle);
    const container = document.getElementById('content');
    const valuesCards = [{
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'All',
        text1: '00.00',
        text2: '00.00',
        alt: 'image',
        link: 'all',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Annuity',
        text1: '<?php echo $annuity?>',
        text2: '30.00',
        alt: 'image',
        link: '#',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Parent Medical',
        text1: '<?php echo $parent_medical?>',
        text2: '30.00',
        alt: 'image',
        link: 'parentmedical',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Education Fees<small>(self)</small>',
        text1: '<?php echo $edu_fees?>',
        text2: '30.00',
        alt: 'image',
        link: '#',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Supporting Equipment',
        text1: '<?php echo $support_equipment?>',
        text2: '30.00',
        alt: 'image',
        link: 's_e',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Medical Expenses',
        text1: '<?php echo $med_expenses?>',
        text2: '30.00',
        alt: 'image',
        link: '#',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Lifestyle',
        text1: '<?php echo $lifestyle?>',
        text2: '30.00',
        alt: 'image',
        link: 'lifestyle',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Lifestyle (Additional)',
        text1: '<?php echo $lifestyle_add?>',
        text2: '30.00',
        alt: 'image',
        link: 'lifestyle_addition',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Lifestyle (Sports)',
        text1: '<?php echo $lifestyle_sport?>',
        text2: '30.00',
        alt: 'image',
        link: '#',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Domestic Travel Expenses',
        text1: '<?php echo $travel?>',
        text2: '30.00',
        alt: 'image',
        link: '#',
        bg_color: 'text-bg-info',
    },
    {
        image: 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"',
        title: 'Education & Medical Insurance',
        text1: '<?php echo $edu_med_ins?>',
        text2: '30.00',
        alt: 'image',
        link: '#',
        bg_color: 'text-bg-info',
    }
]

    function returnCards(valuesCards) {
        return  valuesCards.map(valuesCard => `
        
        <div class="col-sm-6 col-md-3 col-lg-3" >

            <div class="card">
                <a href = "images.php?f=${valuesCard.link}" >
                    <div class="image text-center ${valuesCard.bg_color} rounded m-2">
                            <svg style="width: 50%; height: auto;" class="card-image-top rounded " ${valuesCard.image}"></svg>
                        </div>
                <div class="card-body budi">
                    <h5 class="card-title">${valuesCard.title}</h5>
                    <div class = "text">
                    
                        <small class="">Claimed : RM ${valuesCard.text1}</small>
                        <br>
                        <small class="">Balance : RM ${valuesCard.text2}</small>    
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
    document.title = 'Folder';

</script>
</body>
</html>