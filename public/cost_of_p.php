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

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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


	<link rel="stylesheet" type="text/css" media="all" href="includes/CAL/jsDatePick_ltr.min.css" />
	
    
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

      <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>

  <script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%d-%M-%Y"
			
		});
	};
</script>

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

		

				<li><a href="Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

				<li><a href="Conti_payment.php"><i class="fa fa-dashboard"></i> Customer Payment</a></li>

				

			
				<li><a href="Exe_resell.php"><i class="fa fa-dashboard"></i> Land Resell</a></li>	
				

				

				<li class="open"><a href="cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

				

							
													
				
				
				
			

				<!-- Account from above -->
					<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
			<li class="ts-account">

				<a href="#"><img src="includes/style/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
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
					<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Estimate Cost Of Project <a/> </p>
				<tr>
								<?php
								if(Input::exists()){
							if (Input::get('btnsession')){
							
								 $p_id = Input::get('cmbDis00');
								$_SESSION['pj_id'] = $p_id;

								if($_SESSION['pj_id'] !== ""){
									 $_SESSION['pj_id'] = $p_id;
								}else{
									//session_start();
									unset($_SESSION["pj_id"]);
									

								}

							

							}}
								?>
									<form name="frmAddC1" method="POST" action="">
										<td> <h2>Select The Project Name </h2> </td>
										<td> 
											<select class="form-control" name="cmbDis00">
												<option value=''>-- Select Project --</option>
											<?php	
												

												$database = DB:: getinstance()->query("SELECT * FROM tbl_project");
															if(!$database->count()){
																	die ("no user");
																}else{
																	
																foreach($database->results() as $database){
												
												
													
																	echo "<option value='".$database->id."'>".$database->pj_name."</option>";
																	}

																	
																		$id = $_SESSION['pj_id'];
																$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project WHERE id='$id'");

																
																}


															
													
													//if(isset($_SESSION['pj_id'])){
													//	echo $_SESSION['pj_id'];
													//}	else{
													//	echo "fk";
													//}				
											?>
											</select>
											<td >
											<input id="myBtn" class="btn btn-info" type="submit" name="btnsession" value="ADD" />
											 <a type="button"  class="btn btn-success" href="session_des.php" data-target='Signin'>GO back</a>
										</td>
										</td>
									</form>
									</tr>

				</div>
		
		<div class="container"> <!-- 1st -->
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
			<?php

			

				

			if(Input::exists()){
			if (Input::get('btnAddC1')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtPcost1' => array(
				'name' => 'Purchase Price',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				
				),
				
				'txtPcost2' => array(
				'name' => 'Title Insurance',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtPcost3' => array(
				'name' => 'Stamps',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtPcost4' => array(
				'name' => 'Valuation Report',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtPcost5' => array(
				'name' => 'Tital Report',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtPcost6' => array(
				'name' => 'Introducrs Commission',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)

				));

				 if($validation->passed()){
							
					try {
						$id = $_SESSION['pj_id'];
						echo $id;

																
					

						$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");

							if(!$database->count()){


										$pcost2 = Input::get('txtPcost1');
										

										
										$copti2 = Input::get('txtPcost2');
										

										
										$copStamps2 = Input::get('txtPcost3');
										

										
										$copValuationR2 = Input::get('txtPcost4');
										

										
										$copTitalReport2 = Input::get('txtPcost5');

										$copIntroducrsC2 = Input::get('txtPcost6');
										

										


										$sumfirst = $pcost2 + $copti2 + $copStamps2 + $copValuationR2 + $copTitalReport2 + $copIntroducrsC2;
										

									$user->create('tbl_cost_of_project',array(
									'p_id' => $id,

									"Purchase_P" => $pcost2,
									"C_Title_Insurance" => $copti2,
				       		 		"C_Stamps" => $copStamps2,
				       		 		"C_Valuation_Report" => $copValuationR2,
				       		 		"C_Tital_Report" => $copTitalReport2,
				       		 		"C_Introducrs_Commission" => $copIntroducrsC2,




				       		 		
				       		 		"COPsum" => $sumfirst

						          
						            ));

						            $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) COST OF PURCHASE",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtPcost1').','.Input::get('txtPcost2').','.Input::get('txtPcost3').','.Input::get('txtPcost4').','.Input::get('txtPcost5').','.Input::get('txtPcost6')
							            
							   


							            ));


									echo '<div class="alert alert-success">';
									echo '    <a href="#" aria-label="close">&times;</a>';
									echo '    <strong>Success!</strong> Data has been insert into Database.';
									echo ' </div>';
								}else{

									 	$pcost1  = Input::get('txtPcost1');
										$pcost2 = Input::get('txtPcost1t');
										$pcostsum  = $pcost1 + $pcost2;

										$copti1 = Input::get('txtPcost2');
										$copti2 = Input::get('txtPcost2t');
										$pcoptisum  = $copti1 + $copti2;

										$copStamps = Input::get('txtPcost3');
										$copStamps2 = Input::get('txtPcost3t');
										$pcopStamps  = $copStamps + $copStamps2;

										$copValuationR = Input::get('txtPcost4');
										$copValuationR2 = Input::get('txtPcost4t');
										$copValuationRsum  = $copValuationR + $copValuationR2;

										$copTitalReport = Input::get('txtPcost5');
										$copTitalReport2 = Input::get('txtPcost5t');
										$pcopTitalReportsum  = $copTitalReport + $copTitalReport2;

										$copIntroducrsC  = Input::get('txtPcost6');
										$copIntroducrsC2 = Input::get('txtPcost6t');
										$copIntroducrsCsum  = $copIntroducrsC + $copIntroducrsC2;


										
																	 		
								 		$Callsum = $pcostsum + $pcoptisum + $pcopStamps + $copValuationRsum + $pcopTitalReportsum + $copIntroducrsCsum;

									$user->update('tbl_cost_of_project',array(
									'p_id' => $_SESSION['pj_id'],

									"Purchase_P" => $pcostsum,
									"C_Title_Insurance" => $pcoptisum,
				       		 		"C_Stamps" => $pcopStamps,
				       		 		"C_Valuation_Report" => $copValuationRsum,
				       		 		"C_Tital_Report" => $pcopTitalReportsum,
				       		 		"C_Introducrs_Commission" => $copIntroducrsCsum,
				       		 		
				       		 		"COPsum" =>  $Callsum 

						          
						            ),$id);

						            $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project 'Update' (startup) COST OF PURCHASE",
							            "COP_Pid" => $id,
							            "Activity" => $pcostsum.','.$pcoptisum.','.$pcopStamps.','.$copValuationRsum.','.$pcopTitalReportsum.','.$copIntroducrsCsum
							            
							   


							            ));


									echo '<div class="alert alert-success">';
									echo '    <a href="#" aria-label="close">&times;</a>';
									echo '    <strong>Success!</strong> Data has been insert into Database.';
									echo ' </div>';
					
								}												
						} catch (Exception $e) {
							 die($e-> getMessage());
					 }


																					

					}else{
																				        
					 
					$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

				 

			}
	}	
																			
	}
	?>
			<div class="col-md-5">
			<h2> Cost of Purchase </h2>
				<div class="panel panel-default">
					<div class="panel-heading">Cost of Purchase</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddC1" method="POST" action="">
									
									<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$CPurchasepr1 = $database->Purchase_P;
												$CTitleI1 = $database->C_Title_Insurance;
												$CStamps1 = $database->C_Stamps;
												$CValuation1 = $database->C_Valuation_Report;
												$CTitalR1 = $database->C_Tital_Report;
												$CIntroducrs1 = $database->C_Introducrs_Commission;
										}

									?>
																		
									<div class="form-group">
									<tr>
										<td> Purchase Price </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtPcost1" placeholder='Rs : 0.00' value=''/>
											<input class="form-control" type="hidden"  name="txtPcost1t" placeholder='Rs : 0.00' value='<?php if(isset($CPurchasepr1)){echo $CPurchasepr1;} ?>'/>
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Title Insurance </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtPcost2" placeholder='Rs : 0.00' value=''/>
											<input class="form-control"  type="hidden" name="txtPcost2t" placeholder='Rs : 0.00'  value='<?php if(isset($CTitleI1)){echo $CTitleI1;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td> Stamps </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtPcost3" placeholder='Rs : 0.00' value=''/>
											<input class="form-control"  type="hidden" name="txtPcost3t" placeholder='Rs : 0.00'  value='<?php if(isset($CStamps1)){echo $CStamps1;} ?>' />
										</td>
									</tr>
									</div>
									<div class="form-group">
									<tr>
										<td> Valuation Report </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtPcost4" placeholder='Rs : 0.00' value=''/>
											<input class="form-control"  type="hidden" name="txtPcost4t" placeholder='Rs : 0.00'  value='<?php if(isset($CValuation1)){echo $CValuation1;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Tital Report </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtPcost5" placeholder='Rs : 0.00' value=''/>
											<input class="form-control"  type="hidden" name="txtPcost5t" placeholder='Rs : 0.00'  value='<?php if(isset($CTitalR1)){echo $CTitalR1;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>
										<td> Introducrs Commission </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtPcost6" placeholder='Rs : 0.00' value=''/>
											<input class="form-control"  type="hidden" name="txtPcost6t" placeholder='Rs : 0.00'  value='<?php if(isset($CIntroducrs1)){echo $CIntroducrs1;} ?>' />
										</td>
									</tr>
									</div>

								


									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddC1" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							
							</table>
						</div>
					</div>
				</div>
</div> <!-- 1st -->


			<div class="container">
				<?php
			if(Input::exists()){
			if (Input::get('btnAddDS')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDS1' => array(
				'name' => 'Perimeter',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDS2' => array(
				'name' => 'Blocking out of plan',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDS3' => array(
				'name' => 'Demarcation boundaries',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDS4' => array(
				'name' => 'Labour chargers',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDS5' => array(
				'name' => 'Traveling',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
						
						try {

									$id = $_SESSION['pj_id'];
										echo $id; 
										$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
											if(!$database->count()){		

									$D_SC_Perimeter =  Input::get('txtDS1');
									$D_SC_Blocking_out_of_plan = Input::get('txtDS2');
									$D_SC_Demarcation_boundaries = Input::get('txtDS3');
									$D_SC_Labour_chargers = Input::get('txtDS4');
									$D_SC_Traveling  = Input::get('txtDS5');
									$D_SC_Sub_Toatal = $D_SC_Perimeter + $D_SC_Blocking_out_of_plan + $D_SC_Demarcation_boundaries + $D_SC_Labour_chargers + $D_SC_Traveling;


									$user->create('tbl_cost_of_project',array(
									"D_SC_Perimeter" => $D_SC_Perimeter,
									'p_id' => $_SESSION['pj_id'],
				       		 		"D_SC_Blocking_out_of_plan" => $D_SC_Blocking_out_of_plan,
				       		 		"D_SC_Demarcation_boundaries" => $D_SC_Demarcation_boundaries,
				       		 		"D_SC_Labour_chargers" => $D_SC_Labour_chargers,
				       		 		"D_SC_Traveling" => $D_SC_Traveling,
				       		 		"D_SC_Sub_Toatal" => $D_SC_Sub_Toatal
				       		 		
				       		 		 ));	
									   $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) SURVEY COST",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtDS1').','.Input::get('txtDS2').','.Input::get('txtDS3').','.Input::get('txtDS4').','.Input::get('txtDS5')
							            
							   


							            ));
									}else{

										$DPerimeter1  = Input::get('txtDS1');
										$DPerimeter2 = Input::get('txtDS1t');
										$DPerimetersum  = $DPerimeter1 + $DPerimeter2;

										$DBlockingout1 = Input::get('txtDS2');
										$DBlockingout2 = Input::get('txtDS2t');
										$DBlockingoutsum  = $DBlockingout1 + $DBlockingout2;

										$DDemarcationB1  = Input::get('txtDS3');
										$DDemarcationB2  = Input::get('txtDS3t');
										$Demarcationsubs   = $DDemarcationB1 + $DDemarcationB2;

										$DLabourchargers1  = Input::get('txtDS4');
										$DLabourchargers2 = Input::get('txtDS4t');
										$DLabourchargerssum  = $DLabourchargers1 + $DLabourchargers2;

										$DTraveling1 = Input::get('txtDS5');
										$DTraveling2 = Input::get('txtDS5t');
										$DTravelingsubs  = $DTraveling1 + $DTraveling2;


										$Callsum3 = $DPerimetersum + $DBlockingoutsum + $Demarcationsubs + $DLabourchargerssum + $DTravelingsubs;

									
								
									$user->update('tbl_cost_of_project',array(
									'p_id' => $_SESSION['pj_id'],

									"D_SC_Perimeter" => $DPerimetersum,
									'p_id' => $_SESSION['pj_id'],
				       		 		"D_SC_Blocking_out_of_plan" => $DBlockingoutsum,
				       		 		"D_SC_Demarcation_boundaries" => $Demarcationsubs,
				       		 		"D_SC_Labour_chargers" => $DLabourchargerssum,
				       		 		"D_SC_Traveling" => $DTravelingsubs,
				       		 		
				       		 		'D_SC_Sub_Toatal' => $Callsum3

						          
						            ),$id);

						            	 $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project 'Update' (startup) SURVEY COST",
							            "COP_Pid" => $id,
							            "Activity" => $DPerimetersum.','.$DBlockingoutsum.','.$Demarcationsubs.','.$DLabourchargerssum.','.$DTravelingsubs
							            
							   


							            ));

									echo '<div class="alert alert-success">';
									echo '    <a href="#" aria-label="close">&times;</a>';
									echo '    <strong>Success!</strong> Data has been insert into Database.';
									echo ' </div>';
					
								}
       		 	
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
				$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";
			}	
																			
	}}
	
	?>
				<h2> Development Cost </h2>	
				<div class="col-md-5">
				
				<div class="panel panel-default">
					<div class="panel-heading">Survey Cost </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

	 								<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$CPerimeter2 = $database->D_SC_Perimeter;
												$D_SC_Blocking_out_of_plan = $database->D_SC_Blocking_out_of_plan;
												$D_SC_Demarcation_boundaries = $database->D_SC_Demarcation_boundaries;
												$D_SC_Labour_chargers = $database->D_SC_Labour_chargers;
												$D_SC_Traveling = $database->D_SC_Traveling;
												$D_SC_Sub_Toatal = $database->D_SC_Sub_Toatal;
										}
									?>

								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Perimeter </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDS1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDS1t" placeholder='Rs : 0.00' value='<?php if(isset($CPerimeter2)){echo $CPerimeter2;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Blocking out of plan </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDS2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDS2t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Blocking_out_of_plan)){echo $D_SC_Blocking_out_of_plan;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td> Demarcation boundaries </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDS3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDS3t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Demarcation_boundaries)){echo $D_SC_Demarcation_boundaries;} ?>' />
										</td>
									</tr>
									</div>
									<div class="form-group">
									<tr>
										<td> Labour chargers </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDS4" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDS4t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Labour_chargers)){echo $D_SC_Labour_chargers;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Traveling </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDS5" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Traveling)){echo $D_SC_Traveling;} ?>' />
										</td>
									</tr>
									</div>

									

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDS" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
				<?php
			if(Input::exists()){
			if (Input::get('btnAddDF')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDF1' => array(
				'name' => 'parapet walls',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDF2' => array(
				'name' => 'Fencing',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
						
				 	try {
				 		$id = $_SESSION['pj_id'];
										echo $id; 
										$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
											if(!$database->count()){

									$D_FE_parapet_walls = Input::get('txtDF1');
									$D_FE_Fencing = Input::get('txtDF2');	

									$Fencingsum = $D_FE_parapet_walls + $D_FE_Fencing;		

					$user->create('tbl_cost_of_project',array(
					"D_FE_parapet_walls" => $D_FE_parapet_walls,
					'p_id' => $_SESSION['pj_id'],
       		 		"D_FE_Fencing" => $D_FE_Fencing,
       		 		"D_FE_Sub_Total" => $Fencingsum
       		 		
       		 		
       		 		
		        
		        		   ));	

						 $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Fencing",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtDF1').','.Input::get('txtDF2')
							            
							   


							            ));

						 echo '<div class="alert alert-success">';
									echo '    <a href="#" aria-label="close">&times;</a>';
									echo '    <strong>Success!</strong> Data has been insert into Database.';
									echo ' </div>';

						}else{

									$DparapetW1   = Input::get('txtDF1'); 
										$DparapetW2 = Input::get('txtDF1t');
										$DparapetWsum  = $DparapetW1 + $DparapetW2;

										$DFencing1 = Input::get('txtDF2');
										$DFencing2 = Input::get('txtDF2t');
										$Fencingsum  = $DFencing1 + $DFencing2;

										
										$D_FE_Sub_Total2 = $DparapetWsum + $Fencingsum  ;

								
									$user->update('tbl_cost_of_project',array(
									"D_FE_parapet_walls" => $DparapetWsum,
									'p_id' => $_SESSION['pj_id'],
				       		 		"D_FE_Fencing" => $Fencingsum,
				       		 		"D_FE_Sub_Total" => $D_FE_Sub_Total2

						          
						            ),$id);

						            	 $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project 'Update' (startup) SURVEY COST",
							            "COP_Pid" => $id,
							            "Activity" => $DparapetWsum.','.$Fencingsum
							            
							   


							            ));

						            	

									echo '<div class="alert alert-success">';
									echo '    <a href="#" aria-label="close">&times;</a>';
									echo '    <strong>Success!</strong> Data has been insert into Database.';
									echo ' </div>';
					
								}
									
																		
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
					
						
					 		$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

										 

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Fencing </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_FE_parapet_walls = $database->D_FE_parapet_walls;
												$D_FE_Fencing = $database->D_FE_Fencing;
												$D_FE_Sub_Total = $database->D_FE_Sub_Total;
												
												
										}
									?>


								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td>  parapet walls  </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDF1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDF1t" placeholder='Rs : 0.00' value='<?php if(isset($D_FE_parapet_walls)){echo $D_FE_parapet_walls;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Fencing </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDF2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDF2t" placeholder='Rs : 0.00' value='<?php if(isset($D_FE_Fencing)){echo $D_FE_Fencing;} ?>' />
										</td>
									</tr>
									</div>
									
									
									

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDF" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>




			</div>	<!-- end 2st  -->

				<div class="container">
				<div class="col-md-5">
				
				<?php
			if(Input::exists()){
			if (Input::get('btnDPH')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDPH1' => array(
				'name' => 'Shed',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDPH2' => array(
				'name' => 'Structure Building',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDPH3' => array(
				'name' => 'Reno Of Existing Building',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){	
					
					$D_PH_Shed = Input::get('txtDPH1');
					$D_PH_Structure_Building = Input::get('txtDPH2');
					$D_PH_Reno_Of_Existing_Building = Input::get('txtDPH3');

					$PEMPORARYsubs =  $D_PH_Shed + $D_PH_Structure_Building + $D_PH_Reno_Of_Existing_Building;

					$user->create('tbl_cost_of_project',array(
					"D_PH_Shed" => $D_PH_Shed,
					'p_id' => $_SESSION['pj_id'],
       		 		"D_PH_Structure_Building" => $D_PH_Structure_Building,
       		 		"D_PH_Reno_Of_Existing_Building" => $D_PH_Reno_Of_Existing_Building,
       		 		"D_PH_Sub_Total" => $PEMPORARYsubs
       		 	       		 		
       		 		
		        
		        		    ));	

					  $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Fencing",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtDPH1').','.Input::get('txtDPH2').','.Input::get('txtDPH3')							            
							   


							            ));

					  echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';

					}else{

										$PEMPORARYShed1    = Input::get('txtDPH1'); 
										$PEMPORARYShed2 = Input::get('txtDPH1t');
										$PEMPORARYShedsum  = $PEMPORARYShed1 + $PEMPORARYShed2;

										$DStructureB1  = Input::get('txtDPH2');
										$DStructureB2  = Input::get('txtDPH2t');
										$DStructureBsum  = $DStructureB1 + $DStructureB2;

										$DExistingBuilding1  = Input::get('txtDPH3');
										$DExistingBuilding2  = Input::get('txtDPH3t');
										$DExistingBuildingsum  = $DExistingBuilding1 + $DExistingBuilding2;

										$D_PH_Sub_Total2 =  $PEMPORARYShedsum + $DStructureBsum + $DExistingBuildingsum;

								
					$user->update('tbl_cost_of_project',array(
					"D_PH_Shed" => $PEMPORARYShedsum,
					'p_id' => $_SESSION['pj_id'],
       		 		"D_PH_Structure_Building" => $DStructureBsum,
       		 		"D_PH_Reno_Of_Existing_Building" => $DExistingBuildingsum,
       		 		"D_PH_Sub_Total" => $D_PH_Sub_Total2
						          
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Pemporary Hut",
							            "COP_Pid" => $id,
							            "Activity" => $PEMPORARYShedsum.','.$DStructureBsum.','.$DExistingBuildingsum							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
																		
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>	

				<div class="panel panel-default">
					<div class="panel-heading">Pemporary Hut </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_PH_Shed = $database->D_PH_Shed;
												$D_PH_Structure_Building = $database->D_PH_Structure_Building;
												$D_PH_Reno_Of_Existing_Building = $database->D_PH_Reno_Of_Existing_Building;
												$D_PH_Sub_Total = $database->D_PH_Sub_Total;
												
												
										}
									?>

								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Shed </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDPH1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDPH1t" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Shed)){echo $D_PH_Shed;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Structure Building </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDPH2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDPH2t" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Structure_Building)){echo $D_PH_Structure_Building;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td> Reno Of Existing Building </td>
										<td> 
											<input class="form-control" type="number"step="any" name="txtDPH3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDPH3t" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Reno_Of_Existing_Building)){echo $D_PH_Reno_Of_Existing_Building;} ?>'/>
										</td>
									</tr>
									</div>
																	
									

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnDPH" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<?php
			if(Input::exists()){
			if (Input::get('btnAddDW')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDW1' => array(
				'name' => 'Sub Total',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {

					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					
				

					if(!$database->count()){	

							$D_WW_Sub_Toatal = Input::get('txtDW1');

					$user->create('tbl_cost_of_project_2',array(
					"D_WW_Sub_Toatal" => $D_WW_Sub_Toatal,
					'p_id' => $_SESSION['pj_id'],
       		 		
       		 	       		 		
       		 		
		        
		        		            ));	

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Watcher Wages ",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtDW1')						            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					}else{

										$DWATCHERsub1    = Input::get('txtDW1'); 
										$DWATCHERsub2 = Input::get('txtDW1t');
										$WATCHERsubsum  = $DWATCHERsub1 + $DWATCHERsub2;
								
					$user->update('tbl_cost_of_project',array(
					"D_WW_Sub_Toatal" => $WATCHERsubsum,
					'p_id' => $_SESSION['pj_id'],
						          
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Watcher Wages ",
							            "COP_Pid" => $id,
							            "Activity" => $WATCHERsubsum						            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}

					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Watcher Wages </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_WW_Sub_Toatal = $database->D_WW_Sub_Toatal;
											
												
												
										}
									?>

								<form name="frmAddProp" method="POST" action="">
																		
																	
									<div class="form-group">
									<tr>

										<td> Sub Total </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDW1" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDW1t" placeholder='Rs : 0.00' value='<?php if(isset($D_WW_Sub_Toatal)){echo $D_WW_Sub_Toatal;} ?>' />
										</td>
									</tr>
									</div>
									
								

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDW" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				


			</div>	<!-- End 3st -->

			<div class="container">
			<div class="col-md-5">
			<?php
			if(Input::exists()){
			if (Input::get('btnAddDC')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDC1' => array(
				'name' => 'Clearing Of Trees & Roots',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDC2' => array(
				'name' => 'Clearing Of Shrubs',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
				
					
					if(!$database->count()){

						$D_CL_Clearing_Of_Trees_Roots = Input::get('txtDC1');
					$D_CL_Clearing_Of_Shrubs = Input::get('txtDC2');
					$D_CL_Sub_Total = $D_CL_Clearing_Of_Trees_Roots + $D_CL_Clearing_Of_Shrubs;


					$user->create('tbl_cost_of_project',array(
					"D_CL_Clearing_Of_Trees_Roots" => $D_CL_Clearing_Of_Trees_Roots,
					'p_id' => $_SESSION['pj_id'],
       		 		"D_CL_Clearing_Of_Shrubs" => $D_CL_Clearing_Of_Shrubs,
       		 		"D_CL_Sub_Total" => $D_CL_Sub_Total
       		 		));	

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Clearing ",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtDC1').','.Input::get('txtDC2')						            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';

       		 		}else{
								
										$DClearingOfTrees1    = Input::get('txtDC1'); 
										$DClearingOfTrees2 = Input::get('txtDC1t');
										$DClearingOfTreessum  = $DClearingOfTrees1 + $DClearingOfTrees2;

										$ClearingOfShrubs1    = Input::get('txtDC2'); 
										$ClearingOfShrubs2 = Input::get('txtDC2t');
										$ClearingOfShrubssum  = $ClearingOfShrubs1 + $ClearingOfShrubs2;

										$D_CL_Sub_Total2 = $DClearingOfTreessum + $ClearingOfShrubssum;

									


								
					$user->update('tbl_cost_of_project',array(
					"D_CL_Clearing_Of_Trees_Roots" => $DClearingOfTreessum,
					'p_id' => $_SESSION['pj_id'],
       		 		"D_CL_Clearing_Of_Shrubs" => $ClearingOfShrubssum,
       		 		"D_CL_Sub_Total" => $D_CL_Sub_Total2
						          
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Clearing ",
							            "COP_Pid" => $id,
							            "Activity" => $DClearingOfTreessum.','.$ClearingOfShrubssum					            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
																		
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>		
				
				<div class="panel panel-default">
					<div class="panel-heading">Clearing </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 								<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_CL_Clearing_Of_Trees_Roots = $database->D_CL_Clearing_Of_Trees_Roots;
												$D_CL_Clearing_Of_Shrubs = $database->D_CL_Clearing_Of_Shrubs;
												$D_CL_Sub_Total = $database->D_CL_Sub_Total;
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Clearing Of Trees & Roots </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDC1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDC1t" placeholder='Rs : 0.00' value='<?php if(isset($D_CL_Clearing_Of_Trees_Roots)){echo $D_CL_Clearing_Of_Trees_Roots;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Clearing Of Shrubs </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDC2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDC2t" placeholder='Rs : 0.00' value='<?php if(isset($D_CL_Clearing_Of_Shrubs)){echo $D_CL_Clearing_Of_Shrubs;} ?>' />
										</td>
									</tr>
									</div>
									
								
							
									
									

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDC" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<?php
			if(Input::exists()){
			if (Input::get('btnAddDRC')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDRC1' => array(
				'name' => 'Earth cutting',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDRC2' => array(
				'name' => 'Tarring',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDRC3' => array(
				'name' => 'Filling ABC',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDRC4' => array(
				'name' => 'Grading',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDRC5' => array(
				'name' => 'Retaining Walls',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){

					$D_RC_Earth_cutting = Input::get('txtDRC1');
					$D_RC_Tarring = Input::get('txtDRC2');
					$D_RC_Filling_ABC = Input::get('txtDRC3');
					$D_RC_Grading = Input::get('txtDRC4');
					$D_RC_Retaining_Walls = Input::get('txtDRC5');	

					$D_RC_Sub_Total = $D_RC_Earth_cutting + $D_RC_Tarring + $D_RC_Filling_ABC + $D_RC_Grading + $D_RC_Retaining_Walls;

					$user->create('tbl_cost_of_project_2',array(
					"D_RC_Earth_cutting" => Input::get('txtDRC1'),
					'p_id' => $_SESSION['pj_id'],
       		 		"D_RC_Tarring" => Input::get('txtDRC2'),
       		 		"D_RC_Filling_ABC" => Input::get('txtDRC3'),
       		 		"D_RC_Grading" => Input::get('txtDRC4'),
       		 		"D_RC_Retaining_Walls" => Input::get('txtDRC5'),
       		 		"D_RC_Sub_Total" => $D_RC_Sub_Total

       		 		));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Road Construction ",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtDRC1').','.Input::get('txtDRC2').','.Input::get('txtDRC3').','.Input::get('txtDRC4').','.Input::get('txtDRC5')								            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';

					}else{

										$DRCearth1    = Input::get('txtDRC1'); 
										$DRCearth2 = Input::get('txtDRC1t');
										$DRCearthsum  = $DRCearth1 + $DRCearth2;

										$DRCTarring1    = Input::get('txtDRC2'); 
										$DRCTarring2 = Input::get('txtDRC2t');
										$DRCTarringsum  = $DRCTarring1 + $DRCTarring2;

										$DRCFillingABC1    = Input::get('txtDRC3'); 
										$DRCFillingABC2 = Input::get('txtDRC3t');
										$DRCFillingABCsum  = $DRCFillingABC1 + $DRCFillingABC2;

										$DRCGrading1    = Input::get('txtDRC4'); 
										$DRCGrading2 = Input::get('txtDRC4t');
										$DRCGradingsum  = $DRCGrading1 + $DRCGrading2;

										$DRCRetainingwalls1     = Input::get('txtDRC5'); 
										$DRCRetainingwalls2 = Input::get('txtDRC5t');
										$DRCRetainingwallssum  = $DRCRetainingwalls1 + $DRCRetainingwalls2;

										$D_RC_Sub_Total2 = $DRCearthsum + $DRCTarringsum + $DRCFillingABCsum + $DRCGradingsum + $DRCRetainingwallssum;
								
					$user->update('tbl_cost_of_project',array(
					"D_RC_Earth_cutting" => $DRCearthsum,
					'p_id' => $_SESSION['pj_id'],
       		 		"D_RC_Tarring" => $DRCTarringsum,
       		 		"D_RC_Filling_ABC" => $DRCFillingABCsum,
       		 		"D_RC_Grading" => $DRCGradingsum,
       		 		"D_RC_Retaining_Walls" => $DRCRetainingwallssum,
       		 		"D_RC_Sub_Total" =>$D_RC_Sub_Total2
						          
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Road Construction ",
							            "COP_Pid" => $id,
							            "Activity" => $DRCearthsum.','.$DRCTarringsum.','.$DRCFillingABCsum.','.$DRCGradingsum.','.$DRCRetainingwallssum								            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
												
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Road Construction  </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_RC_Earth_cutting = $database->D_RC_Earth_cutting;
												$D_RC_Tarring = $database->D_RC_Tarring;
												$D_RC_Filling_ABC = $database->D_RC_Filling_ABC;
												$D_RC_Grading = $database->D_RC_Grading;
												$D_RC_Retaining_Walls = $database->D_RC_Retaining_Walls;
												$D_RC_Sub_Total = $database->D_RC_Sub_Total;
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Earth cutting   </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDRC1" placeholder='Rs : 0.00'  /> 
											<input class="form-control" type="hidden" name="txtDRC1t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Earth_cutting)){echo $D_RC_Earth_cutting;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Tarring </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDRC2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDRC2t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Tarring)){echo $D_RC_Tarring;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td> Filling ABC </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDRC3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDRC3t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Filling_ABC)){echo $D_RC_Filling_ABC;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Grading </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDRC4" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDRC4t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Grading)){echo $D_RC_Grading;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>

										<td> Retaining Walls  </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDRC5" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDRC5t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Retaining_Walls)){echo $D_RC_Retaining_Walls;} ?>' />
										</td>
									</tr>
									</div>

								

									
								

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDRC" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>




			
			</div> <!-- End 4st -->

			<div class="container">
				<div class="col-md-5">
				<?php
			if(Input::exists()){
			if (Input::get('btnAddDB')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDB1' => array(
				'name' => 'Purchasing B/Stones',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDB2' => array(
				'name' => 'Purchasing Pegs',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDB3' => array(
				'name' => 'Purchasing & installing',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDB6' => array(
				'name' => 'Fixing Of No Boards',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDB7' => array(
				'name' => 'Zone Doards',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){	

						$D_BAN_Purchasing_B_Stones = Input::get('txtDB1');
						$D_BAN_Purchasing_Pegs = Input::get('txtDB2'); 
						$D_BAN_Purchasing_installing = Input::get('txtDB3');
						$D_BAN_Fixing_Of_No_Boards = Input::get('txtDB6');
						$D_BAN_Zone_Doards = Input::get('txtDB7');

						$ROAD_CONSTRUCTION = $D_BAN_Purchasing_B_Stones + $D_BAN_Purchasing_Pegs +  $D_BAN_Purchasing_installing + $D_BAN_Fixing_Of_No_Boards + $D_BAN_Zone_Doards;



					$user->create('tbl_cost_of_project',array(
					"D_BAN_Purchasing_B_Stones" => Input::get('txtDB1'),
					'p_id' => $_SESSION['pj_id'],
					"D_BAN_Purchasing_Pegs" => Input::get('txtDB2'),
       		 		"D_BAN_Purchasing_installing" => Input::get('txtDB3'),
       		 		"D_BAN_Fixing_Of_No_Boards" => Input::get('txtDB6'),
       		 		"D_BAN_Zone_Doards" => Input::get('txtDB7'),
       		 		"D_BAN_Sub_Toatal" => $ROAD_CONSTRUCTION

       		 		));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Boundaries ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDB1').','.Input::get('txtDB2').','.Input::get('txtDB3').','.Input::get('txtDB6').','.Input::get('txtDB7')									            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

					}else{

										$DPurchasing1B    = Input::get('txtDB1'); 
										$DPurchasing2B = Input::get('txtDB1t');
										$DPurchasingsumB  = $DPurchasing1B + $DPurchasing2B;

										$DPurchasingP1    = Input::get('txtDB2'); 
										$DPurchasingP2 = Input::get('txtDB2t');
										$DPurchasingPsum  = $DPurchasingP1 + $DPurchasingP2;

										$DPurchasingins1    = Input::get('txtDB3'); 
										$DPurchasingins2 = Input::get('txtDB3t');
										$DPurchasinginssum  = $DPurchasingins1 + $DPurchasingins2;

										$DFixingOfNo1    = Input::get('txtDB6'); 
										$DFixingOfNo2 = Input::get('txtDB6t');
										$DFixingOfNosum  = $DFixingOfNo1 + $DFixingOfNo2;

										$DZoneDo1     = Input::get('txtDB7'); 
										$DZoneDo2 = Input::get('txtDB7t');
										$DZoneDosum  = $DZoneDo1 + $DZoneDo2;

										$D_BAN_Sub_Toatal2 = $DPurchasingsumB + $DPurchasingPsum + $DPurchasinginssum + $DFixingOfNosum + $DZoneDosum;

								
					$user->update('tbl_cost_of_project',array(
					"D_BAN_Purchasing_B_Stones" => $DPurchasingsumB,
					'p_id' => $_SESSION['pj_id'],
					"D_BAN_Purchasing_Pegs" => $DPurchasingPsum,
       		 		"D_BAN_Purchasing_installing" => $DPurchasinginssum ,
       		 		"D_BAN_Fixing_Of_No_Boards" => $DFixingOfNosum,
       		 		"D_BAN_Zone_Doards" => $DZoneDosum,
       		 		"D_BAN_Sub_Toatal" =>	$D_BAN_Sub_Toatal2				          
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Boundaries ",
							            "COP_Pid" => $id,
							            "Activity" =>$DPurchasingsumB.','.$DPurchasingPsum.','.$DPurchasinginssum.','.$DFixingOfNosum.','.$DZoneDosum								            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Boundaries </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_BAN_Purchasing_B_Stones = $database->D_BAN_Purchasing_B_Stones;
												$D_BAN_Purchasing_Pegs = $database->D_BAN_Purchasing_Pegs;
												$D_BAN_Purchasing_installing = $database->D_BAN_Purchasing_installing;
												$D_BAN_Fixing_Of_No_Boards = $database->D_BAN_Fixing_Of_No_Boards;
												$D_BAN_Zone_Doards = $database->D_BAN_Zone_Doards;
												$D_BAN_Sub_Toatal = $database->D_BAN_Sub_Toatal;
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Purchasing B/Stones </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDB1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDB1t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_B_Stones)){echo $D_BAN_Purchasing_B_Stones;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Purchasing Pegs </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDB2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDB2t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_Pegs)){echo $D_BAN_Purchasing_Pegs;} ?>'  />
										</td>
									</tr>
									</div>
									
							
									
									<div class="form-group">
									<tr>
										<td> Purchasing & installing  </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDB3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDB3t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_installing)){echo $D_BAN_Purchasing_installing;} ?>'  />
										</td>
									</tr>
									</div>

									
									
									<div class="form-group">
									<tr>
										<td> Fixing Of No Boards </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDB6" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDB6t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Fixing_Of_No_Boards)){echo $D_BAN_Fixing_Of_No_Boards;} ?>'   />
										</td>
									</tr>
									</div>
										<div class="form-group">
									<tr>
										<td> Zone Doards </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDB7" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDB7t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Zone_Doards)){echo $D_BAN_Zone_Doards;} ?>' />
										</td>
									</tr>
									</div>

								

										

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDB" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
									<?php
			if(Input::exists()){
			if (Input::get('btnAddDD')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDD1' => array(
				'name' => 'Earth',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDD2' => array(
				'name' => 'Cement Brickworks',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDD3' => array(
				'name' => 'Cement Concreate',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDD4' => array(
				'name' => 'Rubble',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){


						$D_DRA_Earth =  Input::get('txtDD1');
						$D_DRA_Cement_Brickworks = Input::get('txtDD2');
						$D_DRA_Cement_Concreate =Input::get('txtDD3');
						$D_DRA_Rubble = Input::get('txtDD4');
						$DRAINAGEsum = $D_DRA_Earth + $D_DRA_Cement_Brickworks + $D_DRA_Cement_Concreate + $D_DRA_Rubble;

					$user->create('tbl_cost_of_project',array(
					"D_DRA_Earth" => Input::get('txtDD1'),
					'p_id' => $_SESSION['pj_id'],
					"D_DRA_Cement_Brickworks" => Input::get('txtDD2'),
       		 		"D_DRA_Cement_Concreate" => Input::get('txtDD3'),
       		 		"D_DRA_Rubble" => Input::get('txtDD4'),
       		 		"D_DRA_Sub_Total" => $DRAINAGEsum
       		 		

       		 		));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Drainage ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDD1').','.Input::get('txtDD2').','.Input::get('txtDD3').','.Input::get('txtDD4')									            
							   


							            ));

						echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';

					}else{

										$DDRAINAGEearth1    = Input::get('txtDD1'); 
										$DDRAINAGEearth2 = Input::get('txtDD1t');
										$DDRAINAGEearthsum  = $DDRAINAGEearth1 + $DDRAINAGEearth2;

										$DDRAINAGECement1    = Input::get('txtDD2'); 
										$DDRAINAGECement2 = Input::get('txtDD2t');
										$DDRAINAGECementsum  = $DDRAINAGECement1 + $DDRAINAGECement2;

										$DDRAINAGEConcreate1    = Input::get('txtDD3'); 
										$DDRAINAGEConcreate2 = Input::get('txtDD3t');
										$DDRAINAGEConcreatesum  = $DDRAINAGEConcreate1 + $DDRAINAGEConcreate2;

										$DDRAINAGERubble1    = Input::get('txtDD4'); 
										$DDRAINAGERubble2 = Input::get('txtDD4t');
										$DDRAINAGERubblesum  = $DDRAINAGERubble1 + $DDRAINAGERubble2;

										$D_DRA_Sub_Total2 = $DDRAINAGEearthsum + $DDRAINAGECementsum + $DDRAINAGEConcreatesum + $DDRAINAGERubblesum;


								
					$user->update('tbl_cost_of_project',array(
					"D_DRA_Earth" => $DDRAINAGEearthsum,
					'p_id' => $_SESSION['pj_id'],
					"D_DRA_Cement_Brickworks" => $DDRAINAGECementsum,
       		 		"D_DRA_Cement_Concreate" => $DDRAINAGEConcreatesum,
       		 		"D_DRA_Rubble" => $DDRAINAGERubblesum,
       		 		"D_DRA_Sub_Total" => $D_DRA_Sub_Total2
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Drainage ",
							            "COP_Pid" => $id,
							            "Activity" =>$DDRAINAGEearthsum.','.$DDRAINAGECementsum.','.$DDRAINAGEConcreatesum.','.$DDRAINAGERubblesum 									            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
													
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
					
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";	
			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Drainage   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_DRA_Earth = $database->D_DRA_Earth;
												$D_DRA_Cement_Brickworks = $database->D_DRA_Cement_Brickworks;
												$D_DRA_Cement_Concreate = $database->D_DRA_Cement_Concreate;
												$D_DRA_Rubble = $database->D_DRA_Rubble;
												$D_DRA_Sub_Total = $database->D_DRA_Sub_Total;
												
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Earth    </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDD1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDD1t" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Earth)){echo $D_DRA_Earth;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Cement Brickworks </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDD2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDD2t" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Cement_Brickworks)){echo $D_DRA_Cement_Brickworks;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td> Cement Concreate </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDD3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDD3t"  placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Cement_Concreate)){echo $D_DRA_Cement_Concreate;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Rubble </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDD4" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDD4t" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Rubble)){echo $D_DRA_Rubble;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDD" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


		</div> <!--End 6st -->

		<div class="container">
				<div class="col-md-5">
				<?php
			if(Input::exists()){
			if (Input::get('btnAddDT1')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDT1' => array(
				'name' => 'Balance Brought Down',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDT2' => array(
				'name' => 'Culverts',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDT3' => array(
				'name' => 'Hume pipes- dia. 1.00',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDT4' => array(
				'name' => 'Hume pipes- dia. 1.50',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDT5' => array(
				'name' => 'Hume pipes- dia. 2.00',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDT6' => array(
				'name' => 'Hume pipes- dia. 2.50',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDT7' => array(
				'name' => 'Hume pipes- dia. 3.00',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDT8' => array(
				'name' => 'Hume pipes- dia. 4.00',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDT9' => array(
				'name' => 'Boc',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {

					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){

						$D_IT_Balance_Brought_Down = Input::get('txtDT1');
						$D_IT_Culverts = Input::get('txtDT2');
						$D_IT_Hume_1 = Input::get('txtDT3');
						$D_IT_Hume_2 = Input::get('txtDT4');
						$D_IT_Hume_3 = Input::get('txtDT5');
						$D_IT_Hume_4 = Input::get('txtDT6');
						$D_IT_Hume_5 = Input::get('txtDT7');
						$D_IT_Hume_6 = Input::get('txtDT8');
						$D_IT_Boc    = Input::get('txtDT9');

						$ITEMsums = $D_IT_Balance_Brought_Down + $D_IT_Culverts + $D_IT_Hume_1 + $D_IT_Hume_2 + $D_IT_Hume_3 + $D_IT_Hume_4 + $D_IT_Hume_5 + $D_IT_Hume_6 + $D_IT_Boc;

					$user->create('tbl_cost_of_project',array(
					"D_IT_Balance_Brought_Down" => $D_IT_Balance_Brought_Down,
					'p_id' => $_SESSION['pj_id'],
					"D_IT_Culverts" => $D_IT_Culverts,
       		 		"D_IT_Hume_1" => $D_IT_Hume_1,
       		 		"D_IT_Hume_2" => $D_IT_Hume_2,
       		 		"D_IT_Hume_3" => $D_IT_Hume_3,
       		 		"D_IT_Hume_4" => $D_IT_Hume_4,
       		 		"D_IT_Hume_5" => $D_IT_Hume_5,
       		 		"D_IT_Hume_6" => $D_IT_Hume_6,
       		 		"D_IT_Boc" => $D_IT_Boc,
       		 		"D_IT_Sub_Total" =>$ITEMsums

       		 		

       		 		));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Item ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDT1').','.Input::get('txtDT2').','.Input::get('txtDT3').','.Input::get('txtDT4').','.Input::get('txtDT5').','.Input::get('txtDT6').','.Input::get('txtDT7').','.Input::get('txtDT8').','.Input::get('txtDT9')									            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

					}else{


										$DITEMBal1    = Input::get('txtDT1'); 
										$DITEMBal2 = Input::get('txtDT1t');
										$DITEMBalsum  = $DITEMBal1 + $DITEMBal2;

										$DItemCulverts1    = Input::get('txtDT2'); 
										$DItemCulverts2 = Input::get('txtDT2t');
										$DItemCulvertssum  = $DItemCulverts1 + $DItemCulverts2;

										

										$DitemHumepipes1_1    = Input::get('txtDT3'); 
										$DitemHumepipes1_2 = Input::get('txtDT3t');
										$DitemHumepipessum1  = $DitemHumepipes1_1 + $DitemHumepipes1_2;

										$DitemHumepipes2_1    = Input::get('txtDT4'); 
										$DitemHumepipes2_2 = Input::get('txtDT4t');
										$DitemHumepipessum2  = $DitemHumepipes2_1 + $DitemHumepipes2_2;

										$DitemHumepipes3_1    = Input::get('txtDT5'); 
										$DitemHumepipes3_2 = Input::get('txtDT5t');
										$DitemHumepipessum3  = $DitemHumepipes3_1 + $DitemHumepipes3_2;

										$DitemHumepipes4_1    = Input::get('txtDT6'); 
										$DitemHumepipes4_2 = Input::get('txtDT6t');
										$DitemHumepipessum4  = $DitemHumepipes4_1 + $DitemHumepipes4_2;

										$DitemHumepipes5_1    = Input::get('txtDT7'); 
										$DitemHumepipes5_2 = Input::get('txtDT7t');
										$DitemHumepipessum5  = $DitemHumepipes5_1 + $DitemHumepipes5_2;

										$DitemHumepipes6_1    = Input::get('txtDT8'); 
										$DitemHumepipes6_2 = Input::get('txtDT8t');
										$DitemHumepipessum6  = $DitemHumepipes6_1 + $DitemHumepipes6_2;

										$DitemBoc1    = Input::get('txtDT9'); 
										$DitemBoc2 = Input::get('txtDT9t');
										$DitemBocsum  = $DitemBoc1 + $DitemBoc2;

										$D_IT_Sub_Total2 = $DITEMBalsum + $DItemCulvertssum + $DitemHumepipessum1 + $DitemHumepipessum2 + $DitemHumepipessum3 + $DitemHumepipessum4 + $DitemHumepipessum5 + $DitemHumepipessum6;
								
					$user->update('tbl_cost_of_project',array(
					"D_IT_Balance_Brought_Down" => $DITEMBalsum,
					'p_id' => $_SESSION['pj_id'],
					"D_IT_Culverts" => $DItemCulvertssum,
       		 		"D_IT_Hume_1" => $DitemHumepipessum1,
       		 		"D_IT_Hume_2" => $DitemHumepipessum2,
       		 		"D_IT_Hume_3" => $DitemHumepipessum3 ,
       		 		"D_IT_Hume_4" => $DitemHumepipessum4,
       		 		"D_IT_Hume_5" => $DitemHumepipessum5,
       		 		"D_IT_Hume_6" => $DitemHumepipessum6,
       		 		"D_IT_Boc" => $DitemBocsum,
       		 		"D_IT_Sub_Total" => $D_IT_Sub_Total2
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Item ",
							            "COP_Pid" => $id,
							            "Activity" =>$DITEMBalsum.','.$DItemCulvertssum.','.$DitemHumepipessum1.','.$DitemHumepipessum2.','.Input::get('txtDT5').','.Input::get('txtDT6').','.Input::get('txtDT7').','.Input::get('txtDT8').','.Input::get('txtDT9')									            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
																							
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Item </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_IT_Balance_Brought_Down = $database->D_IT_Balance_Brought_Down;
												$D_IT_Culverts = $database->D_IT_Culverts;
												$D_IT_Hume_1 = $database->D_IT_Hume_1;
												$D_IT_Hume_2 = $database->D_IT_Hume_2;
												$D_IT_Hume_3 = $database->D_IT_Hume_3;
												$D_IT_Hume_4 = $database->D_IT_Hume_4;
												$D_IT_Hume_5 = $database->D_IT_Hume_5;
												$D_IT_Hume_6 = $database->D_IT_Hume_6;
												$D_IT_Boc = $database->D_IT_Boc;
												
												$D_IT_Sub_Total = $database->D_IT_Sub_Total;
												
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Balance Brought Down </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDT1t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Balance_Brought_Down)){echo $D_IT_Balance_Brought_Down;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Culverts </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDT2t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Culverts)){echo $D_IT_Culverts;} ?>' />
										</td>
									</tr>
									</div>
									
							
									
									<div class="form-group">
									<tr>
										<td> Hume pipes- dia. 1.00' </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDT3t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_1)){echo $D_IT_Hume_1;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Hume pipes- dia. 1.50' </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT4" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDT4t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_2)){echo $D_IT_Hume_2;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> Hume pipes- dia. 2.00' </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT5" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDT5t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_3)){echo $D_IT_Hume_3;} ?>' />
										</td>
									</tr>
									</div>
									<div class="form-group">
									<tr>
										<td> Hume pipes- dia. 2.50' </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT6" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDT6t"placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_4)){echo $D_IT_Hume_4;} ?>' />
										</td>
									</tr>
									</div>
										<div class="form-group">
									<tr>
										<td> Hume pipes- dia. 3.00' </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT7" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDT7t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_5)){echo $D_IT_Hume_5;} ?>' />
										</td>
									</tr>
									</div>
									<div class="form-group">
									<tr>
										<td> Hume pipes- dia. 4.00' </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT8" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDT8t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_6)){echo $D_IT_Hume_6;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> Boc </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDT9" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDT9t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Boc)){echo $D_IT_Boc;} ?>' />
										</td>
									</tr>
									</div>


									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDT1" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
			<?php
			if(Input::exists()){
			if (Input::get('btnAddDRB')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDRB1' => array(
				'name' => 'Sub Total',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){	

						$D_IT_ROB = Input::get('txtDRB1');

					$user->create('tbl_cost_of_project_2',array(
					"D_IT_ROB" => $D_IT_ROB ,
					'p_id' => $_SESSION['pj_id'],
			
       		 		));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Rock Blasting  ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDRB1')								            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

					}else{

										$DROCKBls1    = Input::get('txtDRB1'); 
										$DROCKBls2 = Input::get('txtDRB1t');
										$DROCKBlssum  = $DROCKBls1 + $DROCKBls2;
								
					$user->update('tbl_cost_of_project',array(
					"D_IT_ROB" => $DROCKBlssum,
					'p_id' => $_SESSION['pj_id'],

					),$id);

						$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Rock Blasting  ",
							            "COP_Pid" => $id,
							            "Activity" =>$DROCKBlssum							            
							   


							            ));


					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}												
					} catch (Exception $e) {
					 die($e-> getMessage());

					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Rock Blasting   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_IT_ROB = $database->D_IT_ROB;
												
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
								


									<div class="form-group">
									<tr>

										<td> Sub Total </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDRB1" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDRB1t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_ROB)){echo $D_IT_ROB;} ?>' />
										</td>
									</tr>
									</div>
								

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDRB" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


		</div> <!--End 7st -->

			<div class="container">
				<div class="col-md-5">
						<?php
			if(Input::exists()){
			if (Input::get('btnAddDFL')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDFL1' => array(
				'name' => 'Earth Cutting And Filling',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDFL2' => array(
				'name' => 'Earth Transport And Filling',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){

						$D_IT_FAL_Earth_Cutting = Input::get('txtDFL1');
						$D_IT_FAL_Earth_Transport = Input::get('txtDFL2');
						$D_IT_FAL_Sub_Total = $D_IT_FAL_Earth_Cutting + $D_IT_FAL_Earth_Transport;

					$user->create('tbl_cost_of_project',array(
					"D_IT_FAL_Earth_Cutting" => Input::get('txtDFL1'),
					'p_id' => $_SESSION['pj_id'],
					"D_IT_FAL_Earth_Transport" => Input::get('txtDFL2'),
					"D_IT_FAL_Sub_Total" => $D_IT_FAL_Sub_Total
       		 		

       		 		

       		 		));

       		 			$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Filling And Levling  ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDFL1').','.Input::get('txtDFL2')							            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';
								
					}else{

										$FILLINGLEVLINGEarth1    = Input::get('txtDFL1'); 
										$FILLINGLEVLINGEarth2 = Input::get('txtDFL1t');
										$FILLINGLEVLINGEarthsums  = $FILLINGLEVLINGEarth1 + $FILLINGLEVLINGEarth2;

										$FILLINGLEVLINGEarthTransport1    = Input::get('txtDFL2'); 
										$FILLINGLEVLINGEarthTransport2 = Input::get('txtDFL2t');
										$FILLINGLEVLINGEarthTransportsums  = $FILLINGLEVLINGEarthTransport1 + $FILLINGLEVLINGEarthTransport2;

										$D_IT_FAL_Sub_Total2 = $FILLINGLEVLINGEarthsums + $FILLINGLEVLINGEarthTransportsums;
								
					$user->update('tbl_cost_of_project',array(
					"D_IT_FAL_Earth_Cutting" => $FILLINGLEVLINGEarthsums,
					'p_id' => $_SESSION['pj_id'],
					"D_IT_FAL_Earth_Transport" => $FILLINGLEVLINGEarthTransportsums,
					"D_IT_FAL_Sub_Total" => $D_IT_FAL_Sub_Total2
					),$id);


					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Filling And Levling  ",
							            "COP_Pid" => $id,
							            "Activity" =>$FILLINGLEVLINGEarthsums.','.$FILLINGLEVLINGEarthTransportsums						            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}												
																		
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";
			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Filling And Levling  </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_IT_FAL_Earth_Cutting = $database->D_IT_FAL_Earth_Cutting;
												$D_IT_FAL_Earth_Transport = $database->D_IT_FAL_Earth_Transport;
												$D_IT_FAL_Sub_Total = $database->D_IT_FAL_Sub_Total;
												
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Earth Cutting And Filling </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDFL1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDFL1t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_FAL_Earth_Cutting)){echo $D_IT_FAL_Earth_Cutting;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Earth Transport And Filling </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDFL2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDFL2t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_FAL_Earth_Transport)){echo $D_IT_FAL_Earth_Transport;} ?>' />
										</td>
									</tr>
									</div>
									
								
									
									
									

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDFL" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
				<?php
			if(Input::exists()){
			if (Input::get('btnAddDTE')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDTE1' => array(
				'name' => 'Sub Total',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){	

						$D_IT_TUR = Input::get('txtDTE1');

					$user->create('tbl_cost_of_project',array(
					"D_IT_TUR" => $D_IT_TUR,
					'p_id' => $_SESSION['pj_id']
			
       		 		));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Turfing  ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDTE1')							            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

						}else{

										$DDTURFING1    = Input::get('txtDTE1'); 
										$DDTURFING2 = Input::get('txtDTE1t');
										$DDTURFINGsum  = $DDTURFING1 + $DDTURFING2;
								
					$user->update('tbl_cost_of_project',array(
					"D_IT_TUR" => $DDTURFINGsum,
					'p_id' => $_SESSION['pj_id']

					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Turfing  ",
							            "COP_Pid" => $id,
							            "Activity" =>$DDTURFINGsum							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}															
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
					
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Turfing   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_IT_TUR = $database->D_IT_TUR;
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
								
									
									

									<div class="form-group">
									<tr>

										<td> Sub Total </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDTE1" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDTE1t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_TUR)){echo $D_IT_TUR;} ?>' />
										</td>
									</tr>
									</div>
								

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDTE" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


		</div> <!-- End 8st -->

				<div class="container">
				<div class="col-md-5">
		<?php
			if(Input::exists()){
			if (Input::get('btnAddDWS')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDWS1' => array(
				'name' => 'Well Water',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDWS2' => array(
				'name' => 'Pipe Born Water (Mainline)',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDWS3' => array(
				'name' => 'Special Water Service Scheme',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){

						$D_WAS_Well_Water = Input::get('txtDWS1');
						$D_WAS_Pipe_Born = Input::get('txtDWS2');
						$D_WAS_Special_Water = Input::get('txtDWS3');

						$D_WAS_Sub_Total = $D_WAS_Well_Water + $D_WAS_Pipe_Born + $D_WAS_Special_Water;

					$user->create('tbl_cost_of_project',array(
					"D_WAS_Well_Water" => $D_WAS_Well_Water,
					'p_id' => $_SESSION['pj_id'],
					"D_WAS_Pipe_Born" => $D_WAS_Pipe_Born,
					"D_WAS_Special_Water" => $D_WAS_Special_Water,
					"D_WAS_Sub_Total" => $D_WAS_Sub_Total

       		 		));

       		 		$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Water Supply   ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDWS1').','.Input::get('txtDWS2').','.Input::get('txtDWS3')							            
							   


							            ));

       		 		echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

						}else{ 


										$DWATERwell1    = Input::get('txtDWS1'); 
										$DWATERwell2 = Input::get('txtDWS1t');
										$DWATERwellsum  = $DWATERwell1 + $DWATERwell2;

										$DWATERPipe1    = Input::get('txtDWS2'); 
										$DWATERPipe2 = Input::get('txtDWS2t');
										$DWATERPipesum  = $DWATERPipe1 + $DWATERPipe2;

										$DWATERSpecial1    = Input::get('txtDWS3'); 
										$DWATERSpecial2 = Input::get('txtDWS3t');
										$DWATERSpecialsum  = $DWATERSpecial1 + $DWATERSpecial2;

										$D_WAS_Sub_Total2 = $DWATERwellsum + $DWATERPipesum + $DWATERSpecialsum;
								
					$user->update('tbl_cost_of_project',array(
					"D_WAS_Well_Water" => $DWATERwellsum ,
					'p_id' => $_SESSION['pj_id'],
					"D_WAS_Pipe_Born" => $DWATERPipesum,
					"D_WAS_Special_Water" => $DWATERSpecialsum,
					"D_WAS_Sub_Total" => $D_WAS_Sub_Total2

					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update  Water Supply   ",
							            "COP_Pid" => $id,
							            "Activity" =>$DWATERwellsum.','.$DWATERPipesum.','.$DWATERSpecialsum							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>

				<div class="panel panel-default">
					<div class="panel-heading"> Water Supply </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_WAS_Well_Water = $database->D_WAS_Well_Water;
												$D_WAS_Pipe_Born = $database->D_WAS_Pipe_Born;
												$D_WAS_Special_Water = $database->D_WAS_Special_Water;
												$D_WAS_Sub_Total = $database->D_WAS_Sub_Total;
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Well Water </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDWS1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDWS1t" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Well_Water)){echo $D_WAS_Well_Water;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Pipe Born Water (Mainline) </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDWS2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDWS2t" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Pipe_Born)){echo $D_WAS_Pipe_Born;} ?>' />
										</td>
									</tr>
									</div>
									
							
									
									
										<div class="form-group">
									<tr>
										<td> Special Water Service Scheme </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDWS3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDWS3t" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Special_Water)){echo $D_WAS_Special_Water;} ?>' />
										</td>
									</tr>
									</div>

									

									

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDWS" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
			<?php
			if(Input::exists()){
			if (Input::get('btnAddDES1')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtdes1' => array(
				'name' => 'Providing From Existing Lines',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtdes2' => array(
				'name' => 'Providing Augment Of Existing Transformer',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtdes3' => array(
				'name' => 'New Transformer',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){	

						$D_SE_Pro_lines = Input::get('txtdes1');
						$D_SE_Pro_Trans = Input::get('txtdes2');
						$D_SE_New_Trans = Input::get('txtdes3');

						$D_SE_SUB_Total = $D_SE_Pro_lines + $D_SE_Pro_Trans + $D_SE_New_Trans;

					$user->create('tbl_cost_of_project',array(
					"D_SE_Pro_lines" => $D_SE_Pro_lines,
					'p_id' => $_SESSION['pj_id'],
					"D_SE_Pro_Trans" => $D_SE_Pro_Trans,
					"D_SE_New_Trans" => $D_SE_New_Trans,
					"D_SE_SUB_Total" => $D_SE_SUB_Total
						
					));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Elecrtricity Supply    ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtdes1').','.Input::get('txtdes2').','.Input::get('txtdes3')							            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

					}else{

										$DELECRTRICITYSUPPLYP1    = Input::get('txtdes1'); 
										$DELECRTRICITYSUPPLYP2 = Input::get('txtdes1t');
										$DELECRTRICITYSUPPLYPsum  = $DELECRTRICITYSUPPLYP1 + $DELECRTRICITYSUPPLYP2;

										$DELECRTRICITYSUPPLYTT1    = Input::get('txtdes2'); 
										$DELECRTRICITYSUPPLYTT2 = Input::get('txtdes2t');
										$DELECRTRICITYSUPPLYTTsums  = $DELECRTRICITYSUPPLYTT1 + $DELECRTRICITYSUPPLYTT2;

										$DELECRTRICITYSUPPLYGyyyyy1     = Input::get('txtdes3'); 
										$DELECRTRICITYSUPPLYGyyyyy2 = Input::get('txtdes3t');
										$DELECRTRICITYSUPPLYGyyyyysum  = $DELECRTRICITYSUPPLYGyyyyy1 + $DELECRTRICITYSUPPLYGyyyyy2;

										$D_SE_SUB_Total2 = $DELECRTRICITYSUPPLYPsum + $DELECRTRICITYSUPPLYTTsums + $DELECRTRICITYSUPPLYGyyyyysum;
								
					$user->update('tbl_cost_of_project',array(
					"D_SE_Pro_lines" => $DELECRTRICITYSUPPLYPsum,
					'p_id' => $_SESSION['pj_id'],
					"D_SE_Pro_Trans" => $DELECRTRICITYSUPPLYTTsums,
					"D_SE_New_Trans" => $DELECRTRICITYSUPPLYGyyyyysum,
					"D_SE_SUB_Total" => $D_SE_SUB_Total2 

					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Elecrtricity Supply    ",
							            "COP_Pid" => $id,
							            "Activity" => $DELECRTRICITYSUPPLYPsum.','.$DELECRTRICITYSUPPLYTTsums.','.$DELECRTRICITYSUPPLYGyyyyysum						            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}											
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading">Elecrtricity Supply   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_SE_Pro_lines = $database->D_SE_Pro_lines;
												$D_SE_Pro_Trans = $database->D_SE_Pro_Trans;
												$D_SE_New_Trans = $database->D_SE_New_Trans;
												$D_SE_SUB_Total = $database->D_SE_SUB_Total;
												
												
										}
									?>

								<form name="frmAddProp" method="POST" action="">
								

									

									<div class="form-group">
									<tr>

										<td> Providing From Existing Lines </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtdes1" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtdes1t" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_Pro_lines)){echo $D_SE_Pro_lines;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Providing Augment Of Existing Transformer </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtdes2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtdes2t" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_Pro_Trans)){echo $D_SE_Pro_Trans;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> New Transformer </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtdes3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtdes3t" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_New_Trans)){echo $D_SE_New_Trans;} ?>' />
										</td>
									</tr>
									</div>

								
								

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDES1" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


		</div> <!-- end 9st -->

		<div class="container">
				<div class="col-md-5">
				<?php
			if(Input::exists()){
			if (Input::get('btnAddDFE')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDFE1' => array(
				'name' => 'SM,AM',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDFE2' => array(
				'name' => 'ise',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDFE3' => array(
				'name' => 'LSE',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDFE4' => array(
				'name' => 'A/TM',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDFE5' => array(
				'name' => 'P/O',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){

						$D_FUEL_SM_AM = Input::get('txtDFE1');
						$D_FUEL_ise = Input::get('txtDFE2');
						$D_FUEL_LSE = Input::get('txtDFE3');
						$D_FUEL_ATM =  Input::get('txtDFE4');
						$D_FUEL_PO  = Input::get('txtDFE5');

						$D_FUEL_Sub_Total = $D_FUEL_SM_AM + $D_FUEL_ise + $D_FUEL_LSE + $D_FUEL_ATM + $D_FUEL_PO;


					$user->create('tbl_cost_of_project',array(
					"D_FUEL_SM_AM" => $D_FUEL_SM_AM,
					'p_id' => $_SESSION['pj_id'],
					"D_FUEL_ise" => $D_FUEL_ise,
					"D_FUEL_LSE" => $D_FUEL_LSE,
					"D_FUEL_ATM" => $D_FUEL_ATM,
					"D_FUEL_PO" => $D_FUEL_PO,
					"D_FUEL_Sub_Total" => $D_FUEL_Sub_Total
						
					));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Fuel Expenses   ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDFE1').','.Input::get('txtDFE2').','.Input::get('txtDFE3').','.Input::get('txtDFE4').','.Input::get('txtDFE5')
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

					}else{

										$DSMAM1    = Input::get('txtDFE1'); 
										$DSMAM2 = Input::get('txtDFE1t');
										$DSMAMsum  = $DSMAM1 + $DSMAM2;

										$Dise1    = Input::get('txtDFE2'); 
										$Dise2 = Input::get('txtDFE2t');
										$Disesum  = $Dise1 + $Dise2;

										$DLSE1    = Input::get('txtDFE3'); 
										$DLSE2 = Input::get('txtDFE3t');
										$DLSEsum  = $DLSE1 + $DLSE2;

										$DTM1    = Input::get('txtDFE4'); 
										$DTM2 = Input::get('txtDFE4t');
										$DTMsum  = $DTM1 + $DTM2;

										$PO1    = Input::get('txtDFE5'); 
										$PO2 = Input::get('txtDFE5t');
										$POsum  = $PO1 + $PO2;

										$D_FUEL_Sub_Total2 = $DSMAMsum + $Disesum + $DLSEsum + $DTMsum + $POsum; 


								
					$user->update('tbl_cost_of_project',array(
					"D_FUEL_SM_AM" => $DSMAMsum,
					'p_id' => $_SESSION['pj_id'],
					"D_FUEL_ise" => $Disesum ,
					"D_FUEL_LSE" => $DLSEsum,
					"D_FUEL_ATM" => $DTMsum,
					"D_FUEL_PO" => $POsum,
					"D_FUEL_Sub_Total" => $D_FUEL_Sub_Total2
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Fuel Expenses   ",
							            "COP_Pid" => $id,
							            "Activity" =>$DSMAMsum.','.$Disesum.','.$DLSEsum.','.$DTMsum.','.$POsum
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}											
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading"> Fuel Expenses </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_FUEL_SM_AM = $database->D_FUEL_SM_AM;
												$D_FUEL_ise = $database->D_FUEL_ise;
												$D_FUEL_LSE = $database->D_FUEL_LSE;
												$D_FUEL_ATM = $database->D_FUEL_ATM;
												$D_FUEL_PO = $database->D_FUEL_PO;
												$D_FUEL_Sub_Total = $database->D_FUEL_Sub_Total;
												
												
										}
									?>

								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> SM,AM </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDFE1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtDFE1t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_SM_AM)){echo $D_FUEL_SM_AM;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> ise </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDFE2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDFE2t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_ise)){echo $D_FUEL_ise;} ?>'  />
										</td>
									</tr>
									</div>
									
							
									
									
										<div class="form-group">
									<tr>
										<td> LSE </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDFE3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDFE3t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_LSE)){echo $D_FUEL_LSE;} ?>'  />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> A/TM </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDFE4" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDFE4t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_ATM)){echo $D_FUEL_ATM;} ?>'  />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> P/O </td>
										<td> 
											<input class="form-control" type="number"step="any" name="txtDFE5" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDFE5t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_PO)){echo $D_FUEL_PO;} ?>'  />
										</td>
									</tr>
									</div>

								

									

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDFE" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
								<?php
			if(Input::exists()){
			if (Input::get('btnAddDSE')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDSDE1' => array(
				'name' => 'Sundry',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDSDE2' => array(
				'name' => 'Meals/Refreshments',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDSDE3' => array(
				'name' => 'Transport',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDSDE4' => array(
				'name' => 'Accommodation',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){

						$D_SaAD_Day = Input::get('txtDSDE1');
						$D_SaAD_Meals = Input::get('txtDSDE2');
						$D_SaAD_Transport = Input::get('txtDSDE3');
						$D_SaAD_Accommodation = Input::get('txtDSDE4');

						$D_SaAD_Sub_Total = $D_SaAD_Day + $D_SaAD_Meals + $D_SaAD_Transport + $D_SaAD_Accommodation;

					$user->create('tbl_cost_of_project',array(
					"D_SaAD_Day" => Input::get('txtDSDE1'),
					'p_id' => $_SESSION['pj_id'],
					"D_SaAD_Meals" => Input::get('txtDSDE2'),
					"D_SaAD_Transport" => Input::get('txtDSDE3'),
					"D_SaAD_Accommodation" => Input::get('txtDSDE4'),
					"D_SaAD_Sub_Total" => $D_SaAD_Sub_Total
					
						
					));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Sales Day Expenses  ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDSDE1').','.Input::get('txtDSDE2').','.Input::get('txtDSDE3').','.Input::get('txtDSDE4')
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

					}else{

										$DSundry1    = Input::get('txtDSDE1'); 
										$DSundry2 = Input::get('txtDSDE1t');
										$DSundrysum  = $DSundry1 + $DSundry2;

										$Refreshments1    = Input::get('txtDSDE2'); 
										$Refreshments2 = Input::get('txtDSDE2t');
										$Refreshmentssums  = $Refreshments1 + $Refreshments2;

										$Transport1    = Input::get('txtDSDE3'); 
										$Transport2 = Input::get('txtDSDE3t');
										$Transportsum  = $Transport1 + $Transport2;

										$Accommodation1    = Input::get('txtDSDE4'); 
										$Accommodation2 = Input::get('txtDSDE4t');
										$Accommodationsum  = $Accommodation1 + $Accommodation2;

										$D_SaAD_Sub_Total2 = $DSundrysum + $Refreshmentssums + $Transportsum + $Accommodationsum;
								
					$user->update('tbl_cost_of_project',array(
					"D_SaAD_Day" => $DSundrysum,
					'p_id' => $_SESSION['pj_id'],
					"D_SaAD_Meals" => $Refreshmentssums,
					"D_SaAD_Transport" => $Transportsum,
					"D_SaAD_Accommodation" => $Accommodationsum,
					"D_SaAD_Sub_Total" => $D_SaAD_Sub_Total2
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Sales Day Expenses   ",
							            "COP_Pid" => $id,
							            "Activity" =>$DSundrysum.','.$Refreshmentssums.','.$Transportsum.','.$Accommodationsum
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}															
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading"> Sales Day Expenses  </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_SaAD_Day = $database->D_SaAD_Day;
												$D_SaAD_Meals = $database->D_SaAD_Meals;
												$D_SaAD_Transport = $database->D_SaAD_Transport;
												$D_SaAD_Accommodation = $database->D_SaAD_Accommodation;
												$D_SaAD_Sub_Total = $database->D_SaAD_Sub_Total;
												
												
												
										}
									?>

								<form name="frmAddProp" method="POST" action="">
								

									

									<div class="form-group">
									<tr>

										<td> Sundry  </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDSDE1" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDSDE1t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Day)){echo $D_SaAD_Day;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Meals/Refreshments </td>
										<td> 
											<input class="form-control" type="number"step="any" name="txtDSDE2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDSDE2t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Meals)){echo $D_SaAD_Meals;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Transport </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDSDE3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDSDE3t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Transport)){echo $D_SaAD_Transport;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Accommodation </td>
										<td>
											<input class="form-control" type="number" step="any" name="txtDSDE4" placeholder='Rs : 0.00'  /> 
											<input class="form-control"  type="hidden" name="txtDSDE4t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Accommodation)){echo $D_SaAD_Accommodation;} ?>'  />
										</td>
									</tr>
									</div>

							
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDSE" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


		</div> <!-- end 10st -->

		<div class="container">
				<div class="col-md-5">
												<?php
			if(Input::exists()){
			if (Input::get('btnAddda')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtda1' => array(
				'name' => 'Bammers',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtda2' => array(
				'name' => 'Hordings',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtda3' => array(
				'name' => 'Hand Bills',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtda4' => array(
				'name' => 'Redio',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtda5' => array(
				'name' => 'T/V',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtda6' => array(
				'name' => 'Press',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtda7' => array(
				'name' => 'Gift And Presents',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtda8' => array(
				'name' => 'Propaganda Van',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){	
					
						$D_AD_Bammers = Input::get('txtda1');
						$D_AD_Hordings = Input::get('txtda2');
						$D_AD_Hand_Bills = Input::get('txtda3');
						$D_AD_Redio = Input::get('txtda4');
						$D_AD_TV = Input::get('txtda5');
						$D_AD_Press = Input::get('txtda6');
						$D_AD_Presents = Input::get('txtda7');
						$D_AD_Propaganda_Van = Input::get('txtda8');

						$D_AD_Sub_Total = $D_AD_Bammers + $D_AD_Hordings + $D_AD_Hand_Bills + $D_AD_Redio + $D_AD_TV + $D_AD_Press + $D_AD_Presents  + $D_AD_Propaganda_Van;

					$user->create('tbl_cost_of_project',array(
					"D_AD_Bammers" => $D_AD_Bammers,
					'p_id' => $_SESSION['pj_id'],
					"D_AD_Hordings" => $D_AD_Hordings,
					"D_AD_Hand_Bills" => $D_AD_Hand_Bills,
					"D_AD_Redio" => $D_AD_Redio,
					"D_AD_TV" => $D_AD_TV,
					"D_AD_Press" => $D_AD_Press,
					"D_AD_Presents" => $D_AD_Presents,
					"D_AD_Propaganda_Van" => $D_AD_Propaganda_Van,
					"D_AD_Sub_Total" => $D_AD_Sub_Total
					
						
					));	

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Advertising   ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtda1').','.Input::get('txtda2').','.Input::get('txtda3').','.Input::get('txtda4').','.Input::get('txtda5').','.Input::get('txtda6').','.Input::get('txtda7').','.Input::get('txtda8')
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

					}else{

										$Bammers1    = Input::get('txtda1'); 
										$Bammers2 = Input::get('txtda1t');
										$Bammerssum  = $Bammers1 + $Bammers2;

										$Hordings1    = Input::get('txtda2'); 
										$Hordings2 = Input::get('txtda2t');
										$Hordingssums  = $Hordings1 + $Hordings2;

										$Hand1    = Input::get('txtda3'); 
										$Hand2 = Input::get('txtda3t');
										$Hand2sum  = $Hand1 + $Hand2;

										$Redio1    = Input::get('txtda4'); 
										$Redio2 = Input::get('txtda4t');
										$Rediosum  = $Redio1 + $Redio2;

										$V1    = Input::get('txtda5'); 
										$V2 = Input::get('txtda5t');
										$Vsum  = $V1 + $V2;

										$Press1    = Input::get('txtda6'); 
										$Press2 = Input::get('txtda6t');
										$Presssum  = $Press1 + $Press2;

										$Gift1    = Input::get('txtda7'); 
										$Gift2 = Input::get('txtda7t');
										$Giftsum  = $Gift1 + $Gift2;


										$Propaganda1    = Input::get('txtda8'); 
										$Propaganda2 = Input::get('txtda8t');
										$Propagandasum  = $Propaganda1 + $Propaganda2;

										$D_AD_Sub_Total2 = $Bammerssum + $Hordingssums + $Hand2sum + $Rediosum + $Vsum + $Presssum  + $Giftsum + $Propagandasum;
								
					$user->update('tbl_cost_of_project',array(
					"D_AD_Bammers" => $Bammerssum,
					'p_id' => $_SESSION['pj_id'],
					"D_AD_Hordings" => $Hordingssums,
					"D_AD_Hand_Bills" => $Hand2sum,
					"D_AD_Redio" => $Rediosum,
					"D_AD_TV" => $Vsum,
					"D_AD_Press" => $Presssum,
					"D_AD_Presents" => $Giftsum,
					"D_AD_Propaganda_Van" => $Propagandasum,
					"D_AD_Sub_Total" => $D_AD_Sub_Total2
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Advertising   ",
							            "COP_Pid" => $id,
							            "Activity" =>$Bammerssum.','.$Hordingssums.','.$Hand2sum.','.$Rediosum.','.$Vsum.','.$Presssum.','.$Giftsum.','.$Propagandasum
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}															
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading"> Advertising   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 								<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_AD_Bammers = $database->D_AD_Bammers;
												$D_AD_Hordings = $database->D_AD_Hordings;
												$D_AD_Hand_Bills = $database->D_AD_Hand_Bills;
												$D_AD_Redio = $database->D_AD_Redio;
												$D_AD_TV = $database->D_AD_TV;
												$D_AD_Press = $database->D_AD_Press;
												$D_AD_Presents = $database->D_AD_Presents;
												$D_AD_Propaganda_Van = $database->D_AD_Propaganda_Van;
												$D_AD_Sub_Total = $database->D_AD_Sub_Total;
												
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Bammers </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtda1" placeholder='Rs : 0.00'  />
											<input class="form-control" type="hidden" name="txtda1t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Bammers)){echo $D_AD_Bammers;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Hordings </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtda2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtda2t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Hand_Bills)){echo $D_AD_Hand_Bills;} ?>' />
										</td>
									</tr>
									</div>
									
							
									
									
										<div class="form-group">
									<tr>
										<td> Hand Bills </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtda3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtda3t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Redio)){echo $D_AD_Redio;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> Redio </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtda4" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtda4t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_TV)){echo $D_AD_TV;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> T/V </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtda5" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtda5t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_TV)){echo $D_AD_TV;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> Press </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtda6" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtda6t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Press)){echo $D_AD_Press;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> Gift And Presents </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtda7" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtda7t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Presents)){echo $D_AD_Presents;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td> Propaganda Van </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtda8" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtda8t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Propaganda_Van)){echo $D_AD_Propaganda_Van;} ?>' />
										</td>
									</tr>
									</div>

									

									

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddda" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<?php
			if(Input::exists()){
			if (Input::get('btnAddDLAE')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txtDLAE1' => array(
				'name' => '1% Tax',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				
				'txtDLAE2' => array(
				'name' => 'Plan Approvel',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				),
				'txtDLAE3' => array(
				'name' => 'Transport',	
				'min' => 3,
				'max' => 2000,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){	

						$D_LAE_Tax = Input::get('txtDLAE1');
						$D_LAE_PA = Input::get('txtDLAE2');
						$D_LAE_Transport  = Input::get('txtDLAE3');

						$D_LAE_Sub_Total = $D_LAE_Tax + $D_LAE_PA + $D_LAE_Transport;

					$user->create('tbl_cost_of_project',array(
					"D_LAE_Tax" => Input::get('txtDLAE1'),
					'p_id' => $_SESSION['pj_id'],
					"D_LAE_PA" => Input::get('txtDLAE2'),
					"D_LAE_Transport" => Input::get('txtDLAE3'),
					"D_LAE_Sub_Total" => $D_LAE_Sub_Total
										
						
					));

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Local Authority Expenses   ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtDLAE1').','.Input::get('txtDLAE2').','.Input::get('txtDLAE3')
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

					}else{


										$Tax1    = Input::get('txtDLAE1'); 
										$Tax2 = Input::get('txtDLAE1t');
										$Taxsum  = $Tax1 + $Tax2;

										$Approvel1    = Input::get('txtDLAE2'); 
										$Approvel2 = Input::get('txtDLAE2t');
										$Approvelsums  = $Approvel1 + $Approvel2;

										$TransportF1    = Input::get('txtDLAE3'); 
										$TransportF2 = Input::get('txtDLAE3t');
										$TransportFsum  = $TransportF1 + $TransportF2;

										$D_LAE_Sub_Total2 = $Taxsum + $Approvelsums + $TransportFsum;

										
								
					$user->update('tbl_cost_of_project',array(
				"D_LAE_Tax" => $Taxsum,
					'p_id' => $_SESSION['pj_id'],
					"D_LAE_PA" => $Approvelsums,
					"D_LAE_Transport" => $TransportFsum,
					"D_LAE_Sub_Total" => $D_LAE_Sub_Total2
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Local Authority Expenses   ",
							            "COP_Pid" => $id,
							            "Activity" =>$Taxsum.','.$Approvelsums.','.$TransportFsum
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
				<div class="panel panel-default">
					<div class="panel-heading"> Local Authority Expenses  </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_LAE_Tax = $database->D_LAE_Tax;
												$D_LAE_PA = $database->D_LAE_PA;
												$D_LAE_Transport = $database->D_LAE_Transport;
												$D_LAE_Sub_Total = $database->D_LAE_Sub_Total;
												
												
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
								

									

									<div class="form-group">
									<tr>

										<td> 1% Tax   </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDLAE1" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDLAE1t" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_Tax)){echo $D_LAE_Tax;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Plan Approvel </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDLAE2" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDLAE2t" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_PA)){echo $D_LAE_PA;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Transport </td>
										<td> 
											<input class="form-control" type="number" step="any" name="txtDLAE3" placeholder='Rs : 0.00'  />
											<input class="form-control"  type="hidden" name="txtDLAE3t" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_Transport)){echo $D_LAE_Transport;} ?>' />
										</td>
									</tr>
									</div>

								

								
								

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddDLAE" value="ADD" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


		</div> <!-- end 11st -->

			<div class="container">
				<div class="col-md-10">
										<?php
			if(Input::exists()){
			if (Input::get('btnAddts')){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
				
				'txts1' => array(
				'name' => 'Cost Of Purchase',	
				'required' => true,
				'min' => 3,
				'max' => 20,
				'RS' => true
				),
				
				'txts2' => array(
				'name' => 'Cost Of Development',	
				'required' => true,
				'min' => 3,
				'max' => 20,
				'RS' => true
				),
				'txts3' => array(
				'name' => 'Cost Of Project',	
				'required' => true,
				'min' => 3,
				'max' => 20,
				'RS' => true
				)
				
				));

				 if($validation->passed()){
							
					try {

					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM tbl_cost_of_project WHERE p_id =  '$id'");
					if(!$database->count()){	
					$user->create('tbl_cost_of_project_2',array(
					"D_Summery_COPU" => Input::get('txts1'),
					'p_id' => $_SESSION['pj_id'],
					"D_Summery_COPU" => Input::get('txts2'),
					"D_Summery_COP" => Input::get('txts3')
										
						
					));	

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup)  Summery  ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txts1').','.Input::get('txts2').','.Input::get('txts3')
						            							            
							   


							            ));
					echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

						}else{
								
					$user->update('tbl_cost_of_project',array(
					"D_Summery_COPU" => Input::get('txts1'),
					'p_id' => $_SESSION['pj_id'],
					"D_Summery_COD" => Input::get('txts2'),
					"D_Summery_COP" => Input::get('txts3')
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (startup) Update Summery  ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txts1').','.Input::get('txts2').','.Input::get('txts3')
						            							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}														
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	?>
	<?php
	if(isset($_SESSION['pj_id'])){
$id = $_SESSION['pj_id'];
	
}
if(Input::exists()){
			if (Input::get('btnsummery1')){
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
			
				
				
					));
				 if($validation->passed()){
							
					try {
					$id = $_SESSION['pj_id'];
					echo $id; 
					$database = DB:: getinstance()->query("SELECT *  FROM report_summery WHERE 	p_id =  '$id'");
					if(!$database->count()){	
					
					

					$user->create('report_summery',array(
					"D_Summery_COPU_1" => Input::get('txts1'),
					'p_id_1' => $_SESSION['pj_id'],
       		 		"D_Summery_COD_1" => Input::get('txts2'),
       		 		"D_Summery_COP_1" => Input::get('txts3')
       		 		
       		 	
       		 	       		 		
       		 		
		        
		        		    ));	

					  $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (Start)  Summery",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txts1').','.Input::get('txts2').','.Input::get('txts3')							            
							   


							            ));

					  echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';

					}else{

										

								
					$user->update('report_summery',array(
					"D_Summery_COPU_1" => Input::get('txts1'),
					'p_id_1' => $_SESSION['pj_id'],
       		 		"D_Summery_COD_1" => Input::get('txts2'),
       		 		"D_Summery_COP_1" => Input::get('txts3')
       	
						          
					),$id);

					$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Cost of Project  (Actuval) Update  Summery",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txts1').','.Input::get('txts2').','.Input::get('txts3')							            
							   


							            ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					
								}
																		
					} catch (Exception $e) {
							 die($e-> getMessage());
					 }

																					

					}else{
																				        
						$ecount=0;
						echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div>";

			}
	}	
																			
	}
	if(isset($_SESSION['pj_id'])){
	?>	
	

			<h2>   Summery  </h2>	
				<div class="panel panel-default">
					<div class="panel-heading"> Summery   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D1 = $database->COPsum;
												$D2 = $database->D_SC_Sub_Toatal;
												$D4 = $database->D_FE_Sub_Total;

												$D5 = $database->D_PH_Sub_Total;
												$D6 = $database->D_WW_Sub_Toatal;
												$D7 = $database->D_CL_Sub_Total;

												$D8 = $database->D_RC_Sub_Total;
												$D9 = $database->D_DRA_Sub_Total;
												$D10 = $database->D_IT_Sub_Total;

												$D11 = $database->D_IT_FAL_Sub_Total;
												$D12 = $database->D_IT_TUR;
												$D13 = $database->D_WAS_Sub_Total;

												$D14 = $database->D_SE_SUB_Total;
												$D15 = $database->D_FUEL_Sub_Total;
												$D16 = $database->D_SaAD_Sub_Total;

												$D17 = $database->D_AD_Sub_Total;
												$D18 = $database->D_LAE_Sub_Total;
												
												
												$Summery1 = $D2  + $D4 + $D5 + $D6 + $D7 + $D8 + $D9 + $D10 + $D11 + $D12 + $D13 + $D14 + $D15 + $D16 + $D17 + $D18;
												
												$allSummery = $Summery1 + $D1;
												
												
										}
									?>

												
												


									 
									 


								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td> Cost Of Purchase  </td>
										<td> 
											<input id="dare" class="form-control" type="text" placeholder='Rs : 0.00' name="txts1" value='<?php if(isset($D1)){echo $D1;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td> Cost Of Development   </td>
										<td> 
											<input id="dare1" class="form-control" placeholder='Rs : 0.00'  type="text" name="txts2" value='<?php if(isset($Summery1)){echo $Summery1;} ?>'/>
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>

										<td> Cost Of Project   </td>
										<td> 
											<input class="form-control" placeholder='Rs : 0.00'  type="text" name="txts3" value='<?php if(isset($allSummery)){echo $allSummery;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnsummery1" value="ADD" />
									</td>
									</tr>
									</div>	

								</form>
							</table>
						</div>
					</div>
				</div>
				<?php } ?>
		

		

		</div> <!-- end 12st -->

	</div>
	

	</div>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

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

	<script type="text/javascript" src="includes/CAL/jsDatePick.min.1.3.js"></script>

	
    <script src="CAL/js/jquery-ui.min.js"></script>
    <script src="CAL/js/bootstrap.min.js"></script>
    <script src="CAL/js/bootstrap-datepicker.js"></script>
    <script src="CAL/js/auto.js"></script>

</body>

</html>

<?php
//}}
 	


}else{
	Redirect::to('index.php');
}
		




?>