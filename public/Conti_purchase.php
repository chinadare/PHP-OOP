<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {


	if(Input::exists()){
		if(Input::get('btnAdd')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'cmbPROJECT2' => array(
				'name' => 'Project Name',	
				'required'=>true
				),
				
				'cmbCUSTOMER2' => array(
				'name' => 'Customer Name',	
				'required'=>true
				)
				
				));

				 if($validation->passed()){

			

			
							

			echo $_SESSION['FBSFname']	=	Input::get('cmbCUSTOMER2');
			echo $_SESSION['FBSFproject'] =	Input::get('cmbPROJECT2');

			Redirect::to("payment_plan_start.php");

			
		}
		
		}
	}
	

?>
<html lang="en" class="no-js">

<head>


	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="wid+-th=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>SREC</title>

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

			

				<li><a href="addProperty.php"><i class="fa fa-dashboard"></i> Add New Project</a></li>

				

				<li><a href="Add_block_details.php"><i class="fa fa-dashboard"></i> Add Block Price</a></li>

				<li><a href="Exe_create_discount.php"><i class="fa fa-dashboard"></i> Add Discount</a></li>

				<li><a href="application.php"><i class="fa fa-dashboard"></i> Add Customer</a></li>

				<li><a href="Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

		

				<li class="open"><a href="Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

				<li><a href="Conti_payment.php"><i class="fa fa-dashboard"></i> Customer Payment</a></li>

				

			
				<li><a href="Exe_resell.php"><i class="fa fa-dashboard"></i> Land Resell</a></li>	
				

				

				<li><a href="cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

				

								
																
				
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



	<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk]  : Continue Purchase  <a/> </p>

		<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading"> Continue Purchase</div>
						<?php
	if(Session::exists('prosession')){
		
					echo Session::flash("prosession");
					
}
	if(Session::exists('Cussession')){
		
					echo Session::flash("Cussession");
					
}

		if(Session::exists('succfull')){
		
					echo Session::flash("succfull");
					
}

	if(Session::exists('succbank')){
		
					echo Session::flash("succbank");
					
}

	if(Session::exists('succ6months')){
		
					echo Session::flash("succ6months");
					
}

	if(Session::exists('succ4year')){
		
					echo Session::flash("succ4year");
					
}
	?>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
									
									<tr>
										<td> Project Name</td>
										<td> 
											<select class="form-control" name="cmbPROJECT2" required>
													<option value="" selected="selected"> - Select Project - </option>											<?php	
												

												$database = DB:: getinstance()->query("SELECT * FROM tbl_project  ");
															if(!$database->count()){
																	die ("no Project");
																}else{
																	
																foreach($database->results() as $database){
												
												
													
																	echo "<option value='".$database->id."'>".$database->pj_name."</option>";

																	}

																}

											?>
											</select>
											
										</td>
									</tr>

										<tr>
										<td> Customer Name</td>
										<td> 
											<select class="form-control" name="cmbCUSTOMER2" required>
													<option value="" selected="selected"> - Select Customer Name - </option>											<?php	
												

												$database = DB:: getinstance()->query("SELECT * FROM tbl_customer");
															if(!$database->count()){
																	die ("no Customer");
																}else{
																	
																foreach($database->results() as $database){
												
												
													
																	echo "<option value='".$database->c_id."'>".$database->full_name."</option>";

																	}

																}

											?>
											</select>
											
										</td>
									</tr>

							
									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										

																		
										<input class="btn btn-info" type="submit" name="btnAdd" value="Continue" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


				<div class="container">


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


<?php }else{
	Redirect::to('index.php');
} ?>