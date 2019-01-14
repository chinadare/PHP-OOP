<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {
?>
<html lang="en" class="no-js">

<head>


	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="wid+-th=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Harmony - Free responsive Bootstrap admin template by Themestruck.com</title>

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
							?> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="Exe_changePW.php"> Edit My Account</a></li>
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
				
<li><a href="Exe_home.php"><i class="fa fa-dashboard"></i> Home</a></li>

				<li><a href="Exe_viwe_Sec.php"><i class="fa fa-dashboard"></i> Activity Log</a></li>

				<li><a href="addProperty.php"><i class="fa fa-dashboard"></i> Add New Project</a></li>

				

				<li><a href="Add_block_details.php"><i class="fa fa-dashboard"></i> Add Block Price</a></li>

				<li><a href="Exe_create_discount.php"><i class="fa fa-dashboard"></i> Add Discount</a></li>

				<li><a href="application.php"><i class="fa fa-dashboard"></i> Add Customer</a></li>

				<li><a href="Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

				<li><a href="Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

				<li><a href="Exe_viwe_fcash.php"><i class="fa fa-dashboard"></i> Full Cash List</a></li>

				<li><a href="update_project.php"><i class="fa fa-dashboard"></i> Update project Details</a></li>

			<!--	<li><a href="Exe_fullPayment.php"><i class="fa fa-dashboard"></i> Customer purchase</a></li> -->

				

				

				<li><a href="cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

				<li><a href="viwe_cost_of_pro.php"><i class="fa fa-dashboard"></i> View Project Cost</a></li>

				<li><a href="check.php"><i class="fa fa-dashboard"></i> Check Recipt</a></li>
				
				<li><a href="exe.php"><i class="fa fa-dashboard"></i> Summery</a></li>											
				

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
	<div class="container">

		<?php
	if(Input::exists()){
		if (Input::get('btnAdd')){

			$ID= Input::get('cmbProjNM');
			$ID2= Input::get('cmbProj');
			$ID3= Input::get('txtCnic');
			$ID4= Input::get('txtBl');		
			
			echo $ID;
			echo $ID2;
			echo $ID3;
			echo $ID4;	

		 /* $plan	= Input::get('cmbProj');
		  if($plan == "Full_cash"){
		  	$cusNm = Input::get('cmbProjNM');
		  	$cusPj = Input::get('cmbProj');
		  	$cusBl = Input::get('cmbProj');

		  	$_SESSION['Fcname'] = $cusNm;
		  	$_SESSION['Fcpro'] = $cusPj;
		  	$_SESSION['FcBl'] = $cusBl;

		  	Redirect::to('Full_cash.php');

		  }elseif($plan == 'Bank_loan'){
		  	$cusNm = Input::get('cmbProjNM');
		  	$cusPj = Input::get('cmbProj');
		  	$cusBl = Input::get('cmbProj');

		  	$_SESSION['Bcname'] = $cusNm;
		  	$_SESSION['Bcpro'] = $cusPj;
		  	$_SESSION['BcBl'] = $cusBl;

		  	Redirect::to('Bank_loan.php');

		  }elseif($plan == '6Months_cash'){
		  	$cusNm = Input::get('cmbProjNM'); 
		  	$cusPj = Input::get('cmbProj');
		  	$cusBl = Input::get('cmbProj');

		  	$_SESSION['6cname'] = $cusNm;
			$_SESSION['6cpro'] = $cusPj;
		  	$_SESSION['6cBl'] = $cusBl;

		  	Redirect::to('Exe_six_months_plan.php');


		  }elseif ($plan == '4_years_cash') {
		  	$cusNm = Input::get('cmbProjNM');
		  	$cusPj = Input::get('cmbProj');
		  	$cusBl = Input::get('cmbProj');

		  	$_SESSION['4ycname'] = $cusNm;
		  	$_SESSION['4ycpro'] = $cusPj;
		  	$_SESSION['4cBl'] = $cusBl;
		  	
		  	Redirect::to('4_year_plan.php');
		  }*/

	}
}
		?>	

	<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Option4 : 4 Years Plan  <a/> </p>
		<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">Six Month Payment</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="">
								

										<tr>
											<td> Select Customer </td>
											<td> 
												<select class="form-control" name="cmbProjNM" onChange="getProjectN('getProjectN.php?cmbProjNM='+this.value)">
													<option value="select" selected="selected"> - Select Customer - </option>
												<?php													
													$database = DB:: getinstance()->query("SELECT * FROM tbl_customer");
													if(!$database->count()){
															echo "No Record";
													}else{
															
														foreach($database->results() as $database){
															echo "<option value='".$database->c_id."'>".$database->full_name."</option>";
														}
													}					
												?>
												</select>
											</td>
										</tr>
										<script type="text/javascript" src="includes/javascript/proProjectN.js"></script> 

											<tr>
												<td> Project Name & Payment Type</td>
												<td> 
													<script type="text/javascript" src="includes/javascript/jquery-3.1.1.min.js"></script>
																										
												<div id="getProj">
												<select class="form-control" name="cmbProj">
													<option value="select" selected="selected"> - Select Project - </option>
													
												</select>
												<input class='form-control' type='text' name='txtCnic' value= ''  />
												<input class='form-control' type='text' name='txtBl' value= ''  />
												</div>

												</td>
											</tr>


																				
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAdd" value="ADD" />
																					
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
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


<?php } ?>