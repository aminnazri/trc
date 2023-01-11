<?php 
	require_once 'php/utils.php'; 
	require_once 'folder_sum.php';  
	require_once 'template/header.php';

	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
		header("Location: login");
		exit;
	}

	$user = [];	
	$C = connect();
	if($C) {
		$res = sqlSelect($C, 'SELECT * FROM users WHERE id=?', 'i', $_SESSION['userID']);
	
		if($res && $res->num_rows === 1) {
			
			$user = $res->fetch_assoc();
		}
		else {
			exit;
		}
	}
	else {
		exit;
	}

	function get_year_sum($year){

		global $user_id,$C;

		$sql = "SELECT (SUM(amount)) AS total 
		FROM receipts 
		WHERE user_id='$user_id' AND YEAR ='$year'";

		$conn = $C->query($sql);
		$get_array = $conn->fetch_array();
		$result = $get_array['total'];
		return $result;    
	}

	$y_2023 =  get_year_sum("2023");
	$y_2022 =  get_year_sum("2022");
	$y_2021 =  get_year_sum("2021");
	$y_2020 =  get_year_sum("2020");
	$y_2019 =  get_year_sum("2019");
	$y_2018 =  get_year_sum("2018");
	$y_2017 =  get_year_sum("2017");
	echo $y_2023;
	echo $y_2022;

	// tax need to be paid after tax deduction
	$query = "SELECT * FROM tax_calculator where user_id='$user_id' ";
    $sql1 = mysqli_query($C, $query);
    $t_tax_calculator = mysqli_fetch_assoc($sql1);
	// $monthly_salary = $t_tax_calculator['month_income'];

	$reliefs = array($parent_medical, $edu_fees, $med_expenses, $edu_med_ins, $lifestyle, $lifestyle_add, $lifestyle_sport, $travel, $breast_feeding, $childcare_fees, $life_insurance_epf, $sspn);
	// $r = $parent_medical+ $edu_fees+ $med_expenses+ $edu_med_ins+ $lifestyle+ $lifestyle_add+ $lifestyle_sport+ $travel+ $breast_feeding+ $childcare_fees+ $life_insurance_epf+$sspn;
	$relief = (array_sum($reliefs))  + $t_tax_calculator['epf'] + $t_tax_calculator['socso'] ;
	
	$monthly_salary = $t_tax_calculator['month_income'];
	$taxable_income = $monthly_salary*12-$relief -9000;
	$tax_amount =  tax_amount($taxable_income)-$t_tax_calculator['zakat']-$t_tax_calculator['pcb'];
	// echo $edu_fees;
	// echo "relief : ", $relief;
	// echo "monthly_salary : ", $monthly_salary;
	// echo "taxable_income : ", $taxable_income;
	// echo "tax_amount : ", $tax_amount;


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf_token" content="<?php echo createToken(); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Secure Site</title>
	<!-- <link rel="stylesheet"  href ='css/index.css'/> -->
	<link rel="stylesheet"  href ='css/index.css'/>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
	<!-- <link rel="stylesheet" href="<?//php echo dirname($_SERVER['PHP_SELF']) . '/style.css' ?>" /> -->
</head>
<body>
	<!-- <div style="text-align: center;">
		<h1>Secure Site</h1>
		<div id="errs" class="errorcontainer"></div>
		<br><br>
		<h2>Hello <?php //echo htmlspecialchars($user['name'], ENT_QUOTES); ?></h2>
		<br><br>
		<div class="btn" onclick="logout();">Log Out</div>
		<br><br>
		<div class="btn" onclick="deleteAccount();">Delete Account</div>
	</div>
	
	<svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 32 1440 320"><defs><linearGradient id="a" x1="50%" x2="50%" y1="-10.959%" y2="100%"><stop stop-color="#ffffff" stop-opacity=".10" offset="0%"/><stop stop-color="#FFFFFF" stop-opacity=".05" offset="100%"/></linearGradient></defs><path fill="url(#a)" fill-opacity="1" d="M 0 320 L 48 288 C 96 256 192 192 288 160 C 384 128 480 128 576 112 C 672 96 768 64 864 48 C 960 32 1056 32 1152 32 C 1248 32 1344 32 1392 32 L 1440 32 L 1440 2000 L 1392 2000 C 1344 2000 1248 2000 1152 2000 C 1056 2000 960 2000 864 2000 C 768 2000 672 2000 576 2000 C 480 2000 384 2000 288 2000 C 192 2000 96 2000 48 2000 L 0 2000 Z"></path></svg>
	<svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 32 1440 320"><defs><linearGradient id="a" x1="50%" x2="50%" y1="-10.959%" y2="100%"><stop stop-color="#ffffff" stop-opacity=".10" offset="0%"/><stop stop-color="#FFFFFF" stop-opacity=".05" offset="100%"/></linearGradient></defs><path fill="url(#a)" fill-opacity="1" d="M 0 320 L 48 288 C 96 256 192 192 288 160 C 384 128 480 128 576 112 C 672 96 768 64 864 48 C 960 32 1056 32 1152 32 C 1248 32 1344 32 1392 32 L 1440 32 L 1440 2000 L 1392 2000 C 1344 2000 1248 2000 1152 2000 C 1056 2000 960 2000 864 2000 C 768 2000 672 2000 576 2000 C 480 2000 384 2000 288 2000 C 192 2000 96 2000 48 2000 L 0 2000 Z"></path></svg>
	<script src="<?php //echo dirname($_SERVER['PHP_SELF']) . '/script.js' ?>"></script>
	<div class="hidden" id="data">
		<?php //echo htmlspecialchars(json_encode($user), ENT_QUOTES); ?>
	</div> -->

	<div class="middle ">
	<div class="filter">
                    
                    <form action="" method="post">
						<select class="select" name="selectYear"id="selectYear" onchange='window.document.location.href=this.options[this.selectedIndex].value;'value="GO">                    
							
							<option <?php if($_GET['year'] == "2023") echo "selected=selected"; ?> value="index.php?year=2023">2023</option>
							<option <?php if($_GET['year'] == "2022") echo "selected=selected"; ?> value="index.php?year=2022">2022</option>
							<option <?php if($_GET['year'] == "2021") echo "selected=selected"; ?> value="index.php?year=2021">2021</option>
							<option <?php if($_GET['year'] == "2020") echo "selected=selected"; ?> value="index.php?year=2020">2020</option>
							<option <?php if($_GET['year'] == "2019") echo "selected=selected"; ?> value="index.php?year=2019">2019</option>
							<option <?php if($_GET['year'] == "2018") echo "selected=selected"; ?> value="index.php?year=2018">2018</option>
							<option <?php if($_GET['year'] == "2017") echo "selected=selected"; ?> value="index.php?year=2017">2017</option>
							<option <?php if($_GET['year'] == "2016") echo "selected=selected"; ?> value="index.php?year=2016">2016</option>

						
						</select>
                    </form> 
                </div>
		<div class="content d-flex justify-content-evenly w-100">
			<div class="top">
				
				<a href="profile-setting2.php" style="color:black">
					<div class="tax_amount ">
						<div class="center">
							<div class="tittle">
								<h3>Tax Amount </h3>
								<small>after tax relief deduction</small>
							</div>
						<div class="value">
							<h1><b>RM </b><b  class="statistic" data-val=""><?= $tax_amount?> </b></h1>
							<!-- <div class="num" data-val="340">000</div> -->
						</div>
						</div>
					</div>
				</a>
				<div class="upload_receipts ">
					<a href="upload_receipt">
						<div class="center">
							<div class="icon">
							<!-- <box-icon type='solid' name='file-plus'></box-icon> -->
								<i class='bx bx-image-add icon_button'></i> 
							</div>
							<div class="texts">
								<h4>Add New Receipt</h4>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="bottom mb-5">
				<div class="current_progress_bar">
					<div class="progress">
						<div class="progress-content">
							<div class="progres-text"><p>Parent Medical</p> <p>RM 8000</p></div>
							<div data-progress="<?= $parent_medical/8000*100?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Education Fees(self)</p> <p> RM 7000 </p></div>
							<div data-progress="<?= ceil($edu_fees/7000*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Medical Expenses</p> <p> RM 8000 </p></div>
							<div data-progress="<?= ceil($med_expenses/8000*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Lifestyle</p> <p> RM 2500 </p></div>
							<div data-progress="<?= ceil($lifestyle/2500*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Lifestyle (Sports)</p> <p> RM 500 </p></div>
							<div data-progress="<?=ceil($lifestyle_sport/500*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Lifestyle (Additional)</p> <p> RM 2500 </p></div>
							<div data-progress="<?=ceil($lifestyle_addition/2500*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Domestic Travel Expenses</p> <p> RM 1000 </p></div>
							<div data-progress="<?=ceil($travel/1000*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Childcare fees</p> <p> RM  3000</p></div>
							<div data-progress="<?=ceil($childcare_fees/3000*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Net deposit in SSPN</p> <p> RM 7000</p></div>
							<div data-progress="<?=ceil($sspn/7000*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Breast Feeding</p> <p> RM  7000</p></div>
							<div data-progress="<?=ceil($breast_feeding/1000*100)?>" class="progress-bar"></div>
						</div>
						<div class="progress-content">
							<div class="progres-text"><p>Life insurance and EPF</p> <p> RM  7000</p></div>
							<div data-progress="<?=ceil($life_insurance_epf/7000*100)?>" class="progress-bar"></div>
						</div>

						<!-- <p>Example 2 - <strong>20%</strong></p>
						<div data-progress="20"></div>
						<p>Example 3 - <strong>33%</strong></p>
						<div data-progress="33"></div>
						<p>Example 4 - <strong>100%</strong></p>
						<div data-progress="100"></div>
						<p>Example 5 - <strong>1%</strong></p>
						<div data-progress="1"></div>
						<p>Example 6 - <strong>25.75%</strong></p>
						<div data-progress="25.75"></div> -->
					</div>
				</div>
				<div class="year_chart">
					<div class="chartMenu">

					</div>
					<div class="chartCard">
						<div class="chartBox">
							<canvas id="myChart"></canvas>
						</div>
					</div>
		

				</div>
			</div>
		</div>

		</div>
	</div>

	<script src="js/CountUp.min.js"></script>
	<script>
		$(document).ready(function () {
    		$(".index").addClass("active");
		});


		
	</script>
	<script src="script.js"></script>
	<!-- progress bar -->
	<script>
		window.onload = function () {
			if (
				document.querySelectorAll(".progress").length > 0 &&
				document.querySelectorAll(".progress [data-progress]").length > 0
			) {
				// Get all elements with 'data-progress' attribute and run the 'AnimateProgress' funcion with each one
				document
				.querySelectorAll(".progress [data-progress]")
				.forEach((x) => AnimateProgress(x));
			}
			};

			function AnimateProgress(el) {
			// Get the element that came as parameter and add the class 'animated-progress' on it
			el.className = "animate-progress";
			// Set the attribute 'style' of this element with the custom attribute '--animate-progress' and the value of 'data-progress' as the width value
			el.setAttribute(
				"style",
				`--animate-progress:${el.getAttribute("data-progress")}%;`
			);
			// After this the CSS make its magic
		}

	</script>

	<!-- graph -->
	<script>
    // setup 
		const data = {
			labels: ['2023', '2022', '2021', '2020', '2019', '2018', '2017'],
			datasets: [{
				label: 'Yearly claimed tax',
				data: [<?=$y_2023;?>, <?=$y_2022;?>, <?=$y_2021;?>, <?=$y_2020;?>, <?=$y_2019;?>, <?=$y_2018;?>, <?=$y_2017;?>],
				backgroundColor: [
				'rgb(173, 205, 226)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)',
				'rgba(0, 0, 0, 0.2)'
				],
				borderColor: [
				'rgb(60, 176, 252)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)',
				'rgba(0, 0, 0, 1)'
				],
				borderWidth: 1
			}]
		};

		// config 
		const config = {
			type: 'bar',
			data,
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		};

		// render init block
		const myChart = new Chart(
			document.getElementById('myChart'),
			config
		);


// These are the options that I'm going to be using on each statistic
var options = {
	useEasing: true,
	useGrouping: true,
	separator: ",",
	decimal: "."
};

// Find all Statistics on page, put them inside a variable
var statistics = $(".statistic");

// For each Statistic we find, animate it
statistics.each(function(index) {
	// Find the value we want to animate (what lives inside the p tags)
	var value = $(statistics[index]).html();
	// Start animating
	var statisticAnimation = new CountUp(statistics[index], 8000, value, 0, 5, options);
	statisticAnimation.start();
}); 


	</script>	
</body>
</html>
