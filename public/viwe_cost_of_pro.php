<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {
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
					<li><a href="#"> Edit My Account</a></li>
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

				<li><a href="viwe_cost_of_pro.php"><i class="fa fa-dashboard"></i> Viwe Project Cost</a></li>

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

				
						<div class="row">
							
						</div>
		<div class="container">
		
			<p>  Hello <a href="#" ><?php echo escape($user->data()->Emp_name);   ?> <a/> </p>

			<form name="frmAddC1" method="POST" action="">
										<td> <h2>Select The Project Name </h2> </td>
										<td> 
											<select class="form-control" name="cmbDis00">

											<?php	
												

												$database = DB:: getinstance()->query("SELECT * FROM tbl_project");
															if(!$database->count()){
																	echo "No Project";
																}else{
																	
																foreach($database->results() as $database){
												
												
													
																	echo "<option value='".$database->id."'>".$database->pj_name."</option>";
																	}

																	
																	
																}


															
													
													//if(isset($_SESSION['pj_id'])){
													//	echo $_SESSION['pj_id'];
													//}	else{
													//	echo "fk";
													//}				
											?>
											</select>
											<td >
											<input id="myBtn" class="btn btn-info" type="submit" name="btnsessionW" value="ADD" />
											 <a type="button"  class="btn btn-success" href="session_des.php" data-target='Signin'>GO back</a>
										</td>
										</td>
									</form>

					
				<div class="container">	

					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> COST OF PURCHASE  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

											<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Purchase Price </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->Purchase_P' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Title Insurance </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Title_Insurance' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Stamps </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Stamps' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Valuation Report </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Valuation_Report' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Tital Report </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Tital_Report' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Introducrs Commission </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Introducrs_Commission' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

								
											


											}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> SURVEY COST  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Perimeter </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Perimeter' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Blocking out of plan </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Blocking_out_of_plan' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Demarcation boundaries </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Demarcation_boundaries' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Labour chargers </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Labour_chargers' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Traveling </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Traveling' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Toatal </td>';
									echo '	<td>'; 
									if(isset($database->D_SC_Sub_Toatal)) echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Sub_Toatal' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

								

											}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>


					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> FENCING  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> parapet walls </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FE_parapet_walls' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Fencing </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FE_Fencing' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Total </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FE_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

								


								

											}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

						</div>	

				<div class="container">		
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> PEMPORARY HUT  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Shed </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_PH_Shed' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Structure Building </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_PH_Structure_Building' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Reno Of Existing Building </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_PH_Reno_Of_Existing_Building' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Toatal </td>';
									echo '	<td>'; 
								if(isset($database->D_PH_Sub_Toatal))	echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_PH_Sub_Toatal' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
								


								

											}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>



							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> WATCHER WAGES </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Toatal </td>';
									echo '	<td>'; 
								echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_WW_Sub_Toatal' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
								


								

											}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>



							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> CLEARING  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Clearing Of Trees & Roots </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_CL_Clearing_Of_Trees_Roots' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Clearing Of Shrubs </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_CL_Clearing_Of_Shrubs' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Toatal </td>';
									echo '	<td>'; 
								if(isset($database->D_CL_Sub_Toatal))	echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_CL_Sub_Toatal' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

								

											}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

						</div>	

						<div class="container">

								<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> ROAD CONSTRUCTION  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Earth cutting </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Earth_cutting' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Tarring </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Tarring' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Filling ABC </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Filling_ABC' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Grading </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Grading' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Retaining Walls </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Retaining_Walls' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

										<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> BOUNDARIES  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Purchasing B/Stones </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Purchasing_B_Stones' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Purchasing Pegs </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Purchasing_Pegs' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Purchasing & installing </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Purchasing_installing' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Fixing Of No Boards </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Fixing_Of_No_Boards' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Zone Doards </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Zone_Doards' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Sub_Toatal' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>


					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> DRAINAGE  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Earth </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Earth' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Cement Brickworks </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Cement_Brickworks' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Cement Concreate </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Cement_Concreate' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Rubble </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Rubble' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

					</div>		

					<div class="container">

						<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> ITEM  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Balance Brought Down </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Balance_Brought_Down' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Culverts </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Culverts' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Hume pipes- dia. 1.00 </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_1' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Hume pipes- dia. 1.50 </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_2' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Hume pipes- dia. 2.00</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_3' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Hume pipes- dia. 2.50</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_4' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Hume pipes- dia. 3.00</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_5' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Hume pipes- dia. 4.00</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_6' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Boc</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Boc' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>


							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> ROCK BLASTING  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_ROB' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> FILLING AND LEVLING  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Earth Cutting And Filling</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_FAL_Earth_Cutting' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Earth Transport And Filling</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_FAL_Earth_Transport' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_FAL_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

								


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>
					</div>	
					
					<div class="container">

							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> TURFING  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_TUR' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> WATER SUPPLY  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Well Water  </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_WAS_Well_Water' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Pipe Born Water (Mainline)</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_WAS_Pipe_Born' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Special Water Service Scheme</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_WAS_Special_Water' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_WAS_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> ELECRTRICITY SUPPLY  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Providing From Existing Lines  </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SE_Pro_lines' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Providing Augment Of Existing Transformer </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SE_Pro_Trans' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  New Transformer</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SE_New_Trans' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Sub Total</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SE_SUB_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>
					</div>	
					
					<div class="container">	

						<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> FUEL EXPENSES  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> SM,AM </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_SM_AM' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  ise </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_ise' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  LSE </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_LSE' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> A/TM </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_ATM' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> P/O</td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_PO' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Total </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> SALES DAY EXPENSES  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sundry </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Day' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Meals/Refreshments </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Meals' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Transport </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Transport' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Accommodation </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Accommodation' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Total </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';


									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> ADVERTISING  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Bammers </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Bammers' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Hordings </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Hordings' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Hand Bills </td>';
									echo '	<td>'; 
									if(isset($database->D_AD_Hand_Bills))echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Hand_Bills' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Redio </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Redio' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> T/V </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_TV' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Press </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Press' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Gift And Presents </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Presents' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Propaganda Van </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Propaganda_Van' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Total </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';




									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

					</div>	
					
					<div class="container">

						<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> LOCAL AUTHORITY EXPENSES  </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> 1% Tax </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_LAE_Tax' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Plan Approvel </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_LAE_PA' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Transport </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_LAE_Transport' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Sub Total </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_LAE_Sub_Total' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';



									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

							<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> Summery </div>
								<div class="panel-body">
									<table class="table table-striped table-hover ">

							<?php
							if(Input::exists()){
							if (Input::get('btnsessionW')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){
										
									

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> Cost Of Purchase </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_Summery_COPU' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Cost Of Development </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_Summery_COD' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td>  Cost Of Project </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_Summery_COP' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

								



									}

										}
									}}
										?>

										</table>
									</div>
								</div>
							</div>

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

<?php
		
}else{
	Redirect::to('index.php');
}