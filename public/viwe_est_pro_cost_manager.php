<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('manager')) {
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
											echo "No Project";
										}else{
											
											foreach($database->results() as $database){

											echo	'<img src="'.$database->Image.'" class="ts-avatar hidden-side" alt="">';	

											}}
							?> Account <i class="fa fa-angle-down hidden-side"></i></a>
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
				
				
			<li ><a href="Exe_viwe_fcash.php"><i class="fa fa-dashboard"></i> Full Cash Projects</a></li>

				<li ><a href="report_Bank_loan.php"><i class="fa fa-dashboard"></i> Bank Loan report</a></li>
				<li  ><a href="report_6months.php"><i class="fa fa-dashboard"></i> Report Six Months report</a></li>
				<li><a href="report_4year.php"><i class="fa fa-dashboard"></i> 4 Year report</a></li>
				<li ><a href="home_manager.php"><i class="fa fa-dashboard"></i> Current Projects</a></li>
				
					<li class='open'><a href="viwe_est_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View  Estimated Project Cost</a></li>
				<li><a href="viwe_act_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View Actual Project Cost</a></li>	
				<li><a href="viwe_cost_com_manaer.php"><i class="fa fa-dashboard"></i> View  project Cost Compare</a></li>
				<li><a href="viwe_fial_cost_manager.php"><i class="fa fa-dashboard"></i> View  project Cost Diffrence</a></li>			
						
	
		

				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li><a href="#">Help</a></li>
					
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="Manager_change_PW.php"> Edit My Account</a></li>
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
		
			<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Manager] : Estimated Cost Summery <a/> </p>

			<form name="frmAddC1" method="POST" action="">
										<td> <h2>Select Project Name </h2> </td>
										<td> 
											<select class="form-control" name="cmbDis00">
												<option value=''>-- Select Project --</option>
											<?php	
												

												$database = DB:: getinstance()->query("SELECT * FROM tbl_project");
															if(!$database->count()){
																	die ("no Project");
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
					<?php
					$id = Input::get('cmbDis00');
					if(isset($id)){

										$database = DB:: getinstance()->query("SELECT pj_name FROM tbl_project   WHERE  id='$id'");
										
										foreach($database->results() as $database){
										
											$project = $database->pj_name;

										}
					}					
					?>
					
					<h3>Project Name - <?php if(isset($project)){ echo $project; }?> </h3>
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
									echo '	<td><p class="text-info"> Purchase Price </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->Purchase_P' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Title Insurance </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Title_Insurance' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Stamps </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Stamps' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Valuation Report </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Valuation_Report' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Tital Report </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Tital_Report' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Introducrs Commission </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->C_Introducrs_Commission' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success" > <p class="text-warning"> Sub Total  </p></td>';
									echo '	<td class="success" >'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->COPsum' disabled /> ";
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
									echo '	<td><p class="text-info">  Perimeter </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Perimeter' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Blocking out of plan </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Blocking_out_of_plan' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Demarcation boundaries </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Demarcation_boundaries' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Labour chargers </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Labour_chargers' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Traveling </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SC_Traveling' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning">  Sub Toatal </p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info"> parapet walls</p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FE_parapet_walls' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Fencing </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FE_Fencing' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td  class="success"> <p class="text-warning">Sub Total</p> </td>';
									echo '	<td  class="success">'; 
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
									echo '	<td><p class="text-info"> Shed </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_PH_Shed' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Structure Building </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_PH_Structure_Building' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Reno Of Existing Building </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_PH_Reno_Of_Existing_Building' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning"> Sub Toatal </p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td class="success"><p class="text-warning"> Sub Toatal </td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info">  Clearing Of Trees & Roots </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_CL_Clearing_Of_Trees_Roots' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">   Clearing Of Shrubs </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_CL_Clearing_Of_Shrubs' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning"> Sub Toatal </td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info"> Earth cutting </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Earth_cutting' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Tarring </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Tarring' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Filling ABC </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Filling_ABC' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Grading </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Grading' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Retaining Walls </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_RC_Retaining_Walls' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning">  Sub Total </td>';
									echo '	<td class="success">'; 
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
									echo '	<td> <p class="text-info"> Purchasing B/Stones </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Purchasing_B_Stones' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Purchasing Pegs </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Purchasing_Pegs' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Purchasing & installing </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Purchasing_installing' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Fixing Of No Boards </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Fixing_Of_No_Boards' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Zone Doards </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_BAN_Zone_Doards' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning">  Sub Total </p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info"> Earth </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Earth' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Cement Brickworks </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Cement_Brickworks' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Cement Concreate </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Cement_Concreate' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Rubble </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_DRA_Rubble' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning">  Sub Total </p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info"> Balance Brought Down </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Balance_Brought_Down' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Culverts </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Culverts' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';
									
							
									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Hume pipes- dia. 1.00 </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_1' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Hume pipes- dia. 1.50 </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_2' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									
										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Hume pipes- dia. 2.00</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_3' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Hume pipes- dia. 2.50</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_4' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Hume pipes- dia. 3.00</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_5' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Hume pipes- dia. 4.00</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Hume_6' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Boc</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_Boc' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning">  Sub Total</p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td class="success"><p class="text-warning">  Sub Total </p></td>';
									echo '	<td  class="success">'; 
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
									echo '	<td> <p class="text-info"> Earth Cutting And Filling</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_FAL_Earth_Cutting' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Earth Transport And Filling</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_IT_FAL_Earth_Transport' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

										echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning">  Sub Total </p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td class="success"><p class="text-warning">  Sub Total</p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info"> Well Water </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_WAS_Well_Water' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Pipe Born Water (Mainline)</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_WAS_Pipe_Born' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Special Water Service Scheme</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_WAS_Special_Water' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning">  Sub Total</p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info"> Providing From Existing Lines </p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SE_Pro_lines' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> Providing Augment Of Existing Transformer </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SE_Pro_Trans' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> New Transformer</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SE_New_Trans' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning">  Sub Total </p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info"> SM,AM </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_SM_AM' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> ise </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_ise' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td> <p class="text-info"> LSE </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_LSE' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> A/TM </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_ATM' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> P/O</p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_FUEL_PO' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning"> Sub Total </p></td>';
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
									echo '	<td><p class="text-info"> Sundry</p> </td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Day' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Meals/Refreshments </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Meals' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Transport </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Transport' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Accommodation </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_SaAD_Accommodation' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning"> Sub Total </p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info"> Bammers </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Bammers' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Hordings </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Hordings' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">  Hand Bills </p></td>';
									echo '	<td>'; 
									if(isset($database->D_AD_Hand_Bills))echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Hand_Bills' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Redio </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Redio' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> T/V </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_TV' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Press </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Press' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Gift And Presents </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Presents' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info"> Propaganda Van </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_AD_Propaganda_Van' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning"> Sub Total </p></td>';
									echo '	<td class="success">'; 
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
									echo '	<td><p class="text-info">  1% Tax </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_LAE_Tax' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">   Plan Approvel </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_LAE_PA' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td><p class="text-info">   Transport </p></td>';
									echo '	<td>'; 
									echo " <input class='form-control' type='text' name='txtCnic' value= '$database->D_LAE_Transport' disabled /> ";
									echo '	</td>';
									echo '</tr>';
									echo '</div>';

									echo '<div class="form-group">';
									echo '<tr>';
									echo '	<td class="success"><p class="text-warning"> Sub Total </p></td>';
									echo '	<td class="success">'; 
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