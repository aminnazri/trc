<?php
$year = "2023";

if ($_GET['year'] != null) {
    $year = $_GET['year'];
}

$parent_medical = get_sum('parent_medical',$year); //8000

$edu_fees = get_sum('education_fees',$year); //7000;

$med_expenses = get_sum('medical_expenses',$year); //8000;
// 
$lifestyle = get_sum('lifestyle',$year); //2500;
$lifestyle_addition = get_sum('lifestyle_addition',$year); //2500;
$lifestyle_sport = get_sum('lifestyle_sport',$year); //500;
$lifestyle_travel = get_sum('lifestyle_travel',$year); //1000;

$breast_feeding = get_sum('breast_feeding',$year); //1000
$childcare_fees = get_sum('childcare_fees',$year); //3000
$sspn = get_sum('sspn',$year); //8000;

$life_insurance_epf = get_sum('life_insurance_epf',$year); //7000;
$edu_med_ins = get_sum('edu_med_ins',$year); //3000;

$equipment_disable = get_sum('equipment_disable',$year); //3000;

// $support_equipment = get_sum('s_e',$year); //6000;
// $socso = get_sum('socso',$year); //250;
// $pcb = get_sum('pcb',$year); //1000;
// $zakat = get_sum('zakat',$year); //1000;


function get_sum($category, $year){

    global $user_id,$C;

    $query = "SELECT * FROM images where category='$category' AND user_id='$user_id' AND YEAR = '$year'";
    $sql1 = mysqli_query($C, $query);
    $result1 = mysqli_fetch_assoc($sql1);
    // $checker = ;
    if($result1['category'] == null) {
        
        // echo 0;
        return 0; 
    } else {
        $sql = "SELECT (SUM(amount)) AS total 
        FROM images 
        WHERE category='$category' AND user_id='$user_id' AND YEAR ='$year'";

        $conn = $C->query($sql);
        $get_array = $conn->fetch_array();
        $result = $get_array['total'];
        return $result;    
    }
    
}
// ci = chargeable income
$ci = [5000, 15000, 15000, 15000, 20000, 30000, 150000, 150000, 200000, 400000, 1000000, 2000000];
$ci_sum = [5000, 20000, 35000, 50000, 70000, 100000, 250000, 400000, 600000, 1000000, 2000000, 4000000, 600000.0];

$rate = [0, 0.01, 0.03, 0.08, 0.13, 0.21, 0.24, 0.245, 0.25, 0.26, 0.28, 0.30];
$ci_rate = [0, 150.0, 450.0, 1200.0, 2600.0, 6300.0, 36000.0, 36750.0, 50000.0, 104000.0, 280000.0, 600000.0];

function tax_amount($taxable_income) {
    global $ci, $ci_sum, $rate, $ci_rate;
    $current_taxable_income = 0;
    $index = 0;

    for ($i = 0; $i < count($ci_sum); $i++) {
        if ($ci_sum[$i]<=$taxable_income) {
            $index +=1;
            $current_taxable_income = $ci_sum[$i];
            // console.log("current tax amount = ",current_taxable_income);
        }
    }

    $last_ci_rate = ($taxable_income - $current_taxable_income) * $rate[$index];
    $taxamount = sum_of_list($ci_rate, $index);
    $newtaxamount = $last_ci_rate + $taxamount;
    return $newtaxamount;
}
function sum_of_list($l, $n) {
    $sum = 0;
    
    for ($i = 0; $i < count($l); $i++) {
        if ($i < $n){
            $sum += $l[$i];
        }
    }
    return $sum;
}