<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('manager')) {
	
	if(!Input::get('txtId4yr') ==""){
	$idpk = Input::get('txtId4yr');
	$name = Input::get('txtId4name');

	//if(isset($_SESSION['b_id']) && $_SESSION['b_id'] != "" ){


		//echo $_SESSION['id'];

//}

?>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>SREC</title>
	<link rel="stylesheet" href="includes/1/bootstrap.min.css">
	<script src="includes/1/jquery.min.js"></script>
	<script src="includes/1/bootstrap.min.js"></script>

 

    	<!-- Font awesome -->
	<link rel="stylesheet" href="includes/style/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="includes/style/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="includes/style/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="includes/style/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="includes/style/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="includes/style/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="includes/style/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="includes/style/css/style.css">
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="brand clearfix">
		<a href="index.html" class="logo"><img src="includes/style/img/logo.gif" class="img-responsive" alt=""></a> 
	<div class="top_topic"> SILVEREEN REAL ESTATE COMPANY (PVT) LTD </div>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
			<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
			<li class="ts-account">
				<a href="#"><?php
			 	$id = escape($user->data()->id);  

									$database = DB:: getinstance()->query("SELECT * FROM users WHERE id='$id'");

									if(!$database->count()){
											echo "No Record";
										}else{
											
											foreach($database->results() as $database){

											echo	'<img src="'.$database->Image.'" class="ts-avatar hidden-side" alt="">';	

											}}
							?>
				 Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="Manager_change_PW.php"> Edit My Account</a></li>
					<li><a href="logout.php">Logout </a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label">Search</li>
				<li>
					<input type="text" class="ts-sidebar-search" placeholder="Search here...">
				</li>
				<li class="ts-label">Main</li>
				
			
				<li><a href="Exe_viwe_fcash.php"><i class="fa fa-dashboard"></i> Full Cash Projects</a></li>
				<li ><a href="report_Bank_loan.php"><i class="fa fa-dashboard"></i> Bank Loan report</a></li>
				<li class="open"><a href="report_6months.php"><i class="fa fa-dashboard"></i> Report Six Months report</a></li>
				<li><a href="home_manager.php"><i class="fa fa-dashboard"></i> Current Projects</a></li>
				
					<li><a href="viwe_est_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View  Estimated Project Cost</a></li>
				<li><a href="viwe_act_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View Actual Project Cost</a></li>	
				<li><a href="viwe_cost_com_manaer.php"><i class="fa fa-dashboard"></i> View  project Cost Compare</a></li>
				<li><a href="viwe_fial_cost_manager.php"><i class="fa fa-dashboard"></i> View  project Cost Diffrence</a></li>					
									
							
				
		
				
				
				

				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li><a href="#">Help</a></li>
					
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="#"> Edit My Account</a></li>
					<li><a href="logout.php">Logout </a></li>

						</ul>
					</li>
				</ul>

			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				
						<div class="row">
							
						</div>
		<div id="printS" class="container">
		
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Manager] :  4 Year  Summery Per Month<a/> </p>

			<div class="">
				<div class="panel panel-default">
					<div class="panel-heading">4 Year Report  &nbsp; Customer name - <?php echo $name; ?> <button  class=" pull-right" onclick='printContent("printS")'><span class="glyphicon glyphicon-print"></span> Print </button> </div>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
								  <script>
									function printContent(el){
										var restoragepage = document.body.innerHTML;
										var printcontent = document.getElementById(el).innerHTML;
										document.body.innerHTML = printcontent;
										window.print();
										document.body.innerHTML = restoragepage;
									}
								</script>

									 <thead>
								<tr class="info">
								<th>Installments No</th>
								<th>Due Date</th>
								<th>Monthly Pay Date</th>
								<th>Monthly Interest</th>
								<th>Late Pay Interest</th>
								<th>Installments Fee</th>
								<th>Payment</th>
								<th>Already Recovered</th>
								<th>To Recover</th>
								<th>Resale Date</th>
								
								
								
								
							
							
									<?php
								
												
												$id = Input::get('txtid');

													
																	//$database = DB:: getinstance()->get('tbl_property' , array(

																	//		'project_id' ,'=' , $id
													$database = DB:: getinstance()->query("SELECT *  FROM 4_year_plan_progress WHERE c_id ='$idpk'"																	
																			);
																			if(!$database->count()){
																				echo "no userss";
																			}else{
																				foreach($database->results() as $database){
																					echo "<form name='frmLogin' method='POST' action=''>";

																				echo	"<tbody>";
																				echo		"<tr>";
																				echo	"<td> $database->ins_no </td>";
																				echo	"<td> $database->due_date </td>";
																				echo	"<td> $database->pay_date </td>";
																				echo	"<td> $database->monthly_interest </td>";
																				echo	"<td> $database->late_pay_interest </td>";
																				echo	"<td> $database->ins_fee </td>";
																				echo	"<td> $database->payment </td>";
																				echo	"<td> $database->already_recovered </td>";
																				echo	"<td> $database->to_recover </td>";
																				echo	"<td> $database->resale_date </td>";

																			//	echo	"<input class='form-control' type='hidden' name='txtBtype' value= ' $database->status' /> ";
																				
																		
																

																			

																				echo 	"</tr>";
																				echo "</tbody>";
																				echo "</form>";

																				}										}

									
																		?>
																	</tr>
																	</thead>	

								</ul>	



							</table>
							</div>
						</div>				
					</div>														

															 													 	
											

		</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>

<?php
	}else{
	Redirect::to('report_4year.php');	
	}
	
	}else{
	Redirect::to('index.php');
}
