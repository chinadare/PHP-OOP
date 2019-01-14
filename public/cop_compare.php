<?php
	require_once("core/init.php");

$user = new User();
if ($user->hasPermission('managing_director')) {
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
  <script src="includes/javascript/jquery.min.js"></script>
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
					<li><a href="managing_director_cha_PW.php"> Edit My Account</a></li>
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
					

				<li><a href="Exe_viwe_Sec.php"><i class="fa fa-dashboard"></i> Activity Log</a></li>

				<li class="open"><a href="cop_compare.php"><i class="fa fa-dashboard"></i> Project Cost Report </a></li>

				<li><a href="COP_SUM_summery.php"><i class="fa fa-dashboard"></i> Project Cost Summery </a></li>
			
				<li><a href="cost_of_p2.php"><i class="fa fa-dashboard"></i>  Update Project Cost</a></li>

				<li><a href="update_project.php"><i class="fa fa-dashboard"></i>  Update Projects </a></li>

					<li><a href="Resell_MD.php"><i class="fa fa-dashboard"></i> Land Resell </a></li>	
					<li><a href="bank_con.php"><i class="fa fa-dashboard"></i> Conform Payments </a></li>

				<!-- Account from above -->
					<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
			<li class="ts-account">
				<a href="#"><img src="includes/style/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="managing_director_cha_PW.php"> Edit My Account</a></li>
					<li><a href="logout.php">Logout </a></li>
				</ul>
			</li>
		</ul>

			</ul>
		</nav>



		 <div class="content-wrapper"> 

			<div class="container-fluid"> 
				<div class="container">
									<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Manager] : Actual Project Cost Compare <a/> </p>
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
							if (Input::get('btnsession')){
									$id = Input::get('cmbDis00');

										$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project_2   WHERE  p_id='$id'");
									if(!$database->count()){
											die ("no user");
										}else{
											
											foreach($database->results() as $database){
												$cop1U = $database->Purchase_P;
												$cop2U = $database->C_Title_Insurance;
												$cop3U = $database->C_Stamps;
												$cop4U = $database->C_Valuation_Report;
												$cop5U = $database->C_Introducrs_Commission;
												$cop6U = $database->Cp_date;
												$cop7U = $database->sub_total;
											//	$month = date("m",strtotime($database->Cp_date));

												$D_SC_PerimeterU = $database->D_SC_Perimeter;
												$D_SC_Blocking_out_of_planU = $database->D_SC_Blocking_out_of_plan;
												$D_SC_Demarcation_boundariesU = $database->D_SC_Demarcation_boundaries;
												$D_SC_Labour_chargersU = $database->D_SC_Labour_chargers;
												$D_SC_TravelingU = $database->D_SC_Traveling;
												$D_SC_Sub_ToatalU = $database->D_SC_Sub_Toatal;
												$D_SC_dateU = $database->D_SC_date;
												
												$D_FE_parapet_wallsU = $database->D_FE_parapet_walls;
												$D_FE_FencingU = $database->D_FE_Fencing;
												$D_FE_Sub_TotalU = $database->D_FE_Sub_Total;
												$D_FE_dateU = $database->D_FE_date;
												
												$D_PH_ShedU = $database->D_PH_Shed;
												$D_PH_Structure_BuildingU = $database->D_PH_Structure_Building;
												$D_PH_Reno_Of_Existing_BuildingU = $database->D_PH_Reno_Of_Existing_Building;
												$D_PH_Sub_TotalU = $database->D_PH_Sub_Total;
												$D_PH_dateU = $database->D_PH_date;
												
												$D_WW_Sub_ToatalU = $database->D_WW_Sub_Toatal;
												$D_WW_dateU = $database->D_WW_date;

												$D_CL_Clearing_Of_Trees_RootsU = $database->D_CL_Clearing_Of_Trees_Roots;
												$D_CL_Clearing_Of_ShrubsU = $database->D_CL_Clearing_Of_Shrubs;
												$D_CL_Sub_TotalU = $database->D_CL_Sub_Total;
												$D_CL_dateU = $database->D_CL_date;

												$D_RC_Earth_cuttingU = $database->D_RC_Earth_cutting;
												$D_RC_TarringU = $database->D_RC_Tarring;
												$D_RC_Filling_ABCU = $database->D_RC_Filling_ABC;
												$D_RC_GradingU = $database->D_RC_Grading; 
												$D_RC_Retaining_WallsU = $database->D_RC_Retaining_Walls;
												$D_RC_Sub_TotalU = $database->D_RC_Sub_Total;
												$D_RC_dateU = $database->D_RC_date;

												$D_BAN_Purchasing_B_StonesU = $database->D_BAN_Purchasing_B_Stones;
												$D_BAN_Purchasing_PegsU = $database->D_BAN_Purchasing_Pegs;
												$D_BAN_Purchasing_installingU = $database->D_BAN_Purchasing_installing;
												$D_BAN_Fixing_Of_No_BoardsU = $database->D_BAN_Fixing_Of_No_Boards;
												$D_BAN_Zone_DoardsU = $database->D_BAN_Zone_Doards;
												$D_BAN_dateU = $database->D_BAN_date;
												$D_BAN_Sub_ToatalU = $database->D_BAN_Sub_Toatal;

												$D_DRA_EarthU = $database->D_DRA_Earth;
												$D_DRA_Cement_BrickworksU = $database->D_DRA_Cement_Brickworks;
												$D_DRA_Cement_ConcreateU = $database->D_DRA_Cement_Concreate;
												$D_DRA_RubbleU = $database->D_DRA_Rubble;
												$D_DRA_Sub_TotalU = $database->D_DRA_Sub_Total;
												$D_DRA_dateU = $database->D_DRA_date;

												$D_IT_Balance_Brought_DownU = $database->D_IT_Balance_Brought_Down;
												$D_IT_CulvertsU= $database->D_IT_Culverts;
												$D_IT_Hume_1U= $database->D_IT_Hume_1;
												$D_IT_Hume_2U= $database->D_IT_Hume_2;
												$D_IT_Hume_3U= $database->D_IT_Hume_3;
												$D_IT_Hume_4U= $database->D_IT_Hume_4;
												$D_IT_Hume_5U= $database->D_IT_Hume_5;
												$D_IT_Hume_6U= $database->D_IT_Hume_6;
												$D_IT_dateU= $database->D_IT_date;
												$D_IT_BocU= $database->D_IT_Boc;
												$D_IT_Sub_TotalU= $database->D_IT_Sub_Total;

												$D_IT_ROBU= $database->D_IT_ROB;
												$D_IT_ROB_dateU= $database->D_IT_ROB_date;

												$D_IT_FAL_Earth_CuttingU= $database->D_IT_FAL_Earth_Cutting;
												$D_IT_FAL_Earth_TransportU= $database->D_IT_FAL_Earth_Transport;
												$D_IT_FAL_Sub_TotalU= $database->D_IT_FAL_Sub_Total;
												$D_IT_FAL_dateU= $database->D_IT_FAL_date;
												
												$D_IT_TURU= $database->D_IT_TUR;
												$D_IT_TUR_dateU= $database->D_IT_TUR_date;

												$D_WAS_Well_WaterU= $database->D_WAS_Well_Water;
												$D_WAS_Pipe_BornU= $database->D_WAS_Pipe_Born;
												$D_WAS_Special_WaterU= $database->D_WAS_Special_Water;
												$D_WAS_Sub_TotalU= $database->D_WAS_Sub_Total;
												$D_WAS_dateU= $database->D_WAS_date;

												$D_SE_Pro_linesU=$database->D_SE_Pro_lines;
												$D_SE_Pro_TransU=$database->D_SE_Pro_Trans;
												$D_SE_New_TransU=$database->D_SE_New_Trans;
												$D_SE_SUB_TotalU=$database->D_SE_SUB_Total;
												$D_SE_dateU=$database->D_SE_date;

												$D_FUEL_SM_AMU=$database->D_FUEL_SM_AM;
												$D_FUEL_iseU=$database->D_FUEL_ise;
												$D_FUEL_LSEU=$database->D_FUEL_LSE;
												$D_FUEL_ATMU=$database->D_FUEL_ATM;
												$D_FUEL_POU=$database->D_FUEL_PO;
												$D_FUEL_Sub_TotalU=$database->D_FUEL_Sub_Total;
												$D_FUEL_dateU=$database->D_FUEL_date;

												$D_SaAD_DayU=$database->D_SaAD_Day;
												$D_SaAD_MealsU=$database->D_SaAD_Meals;
												$D_SaAD_TransportU=$database->D_SaAD_Transport;
												$D_SaAD_AccommodationU=$database->D_SaAD_Accommodation;
												$D_SaAD_Sub_TotalU=$database->D_SaAD_Sub_Total;
												$D_SaAD_dateU=$database->D_SaAD_date;


												$D_AD_BammersU=$database->D_AD_Bammers;
												$D_AD_HordingsU=$database->D_AD_Hordings;
												$D_AD_Hand_BillsU=$database->D_AD_Hand_Bills;
												$D_AD_RedioU=$database->D_AD_Redio;
												$D_AD_TVU=$database->D_AD_TV;
												$D_AD_PressU=$database->D_AD_Press;
												$D_AD_PresentsU=$database->D_AD_Presents;
												$D_AD_Propaganda_VanU=$database->D_AD_Propaganda_Van;
												$D_AD_Sub_TotalU=$database->D_AD_Sub_Total;
												

												$D_AD_dateU=$database->D_AD_date;
												$D_LAE_TaxU=$database->D_LAE_Tax;
												$D_LAE_PAU=$database->D_LAE_PA;
												$D_LAE_TransportU=$database->D_LAE_Transport;
												$D_LAE_Sub_TotalU=$database->D_LAE_Sub_Total;
												$D_LAE_dateU=$database->D_LAE_date;
												
												$D_Summery_COPUU=$database->D_Summery_COPU;
												$D_Summery_CODU=$database->D_Summery_COD;
												$D_Summery_COPU=$database->D_Summery_COP;
												




												

												
											}
											}

											$database = DB:: getinstance()->query("SELECT * FROM tbl_cost_of_project   WHERE  p_id='$id'");
									if(!$database->count()){
											die ("no user");
										}else{
											
											foreach($database->results() as $database){
												$cop1A = $database->Purchase_P;
												$cop2A = $database->C_Title_Insurance;
												$cop3A = $database->C_Stamps;
												$cop4A = $database->C_Valuation_Report;
												$cop5A = $database->C_Introducrs_Commission;
												
												$cop7A = $database->COPsum;
											//	$month = date("m",strtotime($database->Cp_date));

												$D_SC_PerimeterA = $database->D_SC_Perimeter;
												$D_SC_Blocking_out_of_planA = $database->D_SC_Blocking_out_of_plan;
												$D_SC_Demarcation_boundariesA = $database->D_SC_Demarcation_boundaries;
												$D_SC_Labour_chargersA = $database->D_SC_Labour_chargers;
												$D_SC_TravelingA = $database->D_SC_Traveling;
												$D_SC_Sub_ToatalA = $database->D_SC_Sub_Toatal;
												
												
												$D_FE_parapet_wallsA = $database->D_FE_parapet_walls;
												$D_FE_FencingA = $database->D_FE_Fencing;
												$D_FE_Sub_TotalA = $database->D_SC_Sub_Toatal;
												
												
												$D_PH_ShedA = $database->D_PH_Shed;
												$D_PH_Structure_BuildingA = $database->D_PH_Structure_Building;
												$D_PH_Reno_Of_Existing_BuildingA = $database->D_PH_Reno_Of_Existing_Building;
												$D_PH_Sub_TotalA = $database->D_PH_Sub_Total;
												
												
												$D_WW_Sub_ToatalA = $database->D_WW_Sub_Toatal;
												

												$D_CL_Clearing_Of_Trees_RootsA = $database->D_CL_Clearing_Of_Trees_Roots;
												$D_CL_Clearing_Of_ShrubsA = $database->D_CL_Clearing_Of_Shrubs;
												$D_CL_Sub_TotalA = $database->D_CL_Sub_Total;
												

												$D_RC_Earth_cuttingA = $database->D_RC_Earth_cutting;
												$D_RC_TarringA = $database->D_RC_Tarring;
												$D_RC_Filling_ABCA = $database->D_RC_Filling_ABC;
												$D_RC_GradingA = $database->D_RC_Grading; 
												$D_RC_Retaining_WallsA = $database->D_RC_Retaining_Walls;
												$D_RC_Sub_TotalA = $database->D_RC_Sub_Total;
												

												$D_BAN_Purchasing_B_StonesA = $database->D_BAN_Purchasing_B_Stones;
												$D_BAN_Purchasing_PegsA = $database->D_BAN_Purchasing_Pegs;
												$D_BAN_Purchasing_installingA = $database->D_BAN_Purchasing_installing;
												$D_BAN_Fixing_Of_No_BoardsA = $database->D_BAN_Fixing_Of_No_Boards;
												$D_BAN_Zone_DoardsA = $database->D_BAN_Zone_Doards;
												
												$D_BAN_Sub_ToatalA = $database->D_BAN_Sub_Toatal;

												$D_DRA_EarthA = $database->D_DRA_Earth;
												$D_DRA_Cement_BrickworksA = $database->D_DRA_Cement_Brickworks;
												$D_DRA_Cement_ConcreateA = $database->D_DRA_Cement_Concreate;
												$D_DRA_RubbleA = $database->D_DRA_Rubble;
												$D_DRA_Sub_TotalA = $database->D_DRA_Sub_Total;
												

												$D_IT_Balance_Brought_DownA = $database->D_IT_Balance_Brought_Down;
												$D_IT_CulvertsA= $database->D_IT_Culverts;
												$D_IT_Hume_1A= $database->D_IT_Hume_1;
												$D_IT_Hume_2A= $database->D_IT_Hume_2;
												$D_IT_Hume_3A= $database->D_IT_Hume_3;
												$D_IT_Hume_4A= $database->D_IT_Hume_4;
												$D_IT_Hume_5A= $database->D_IT_Hume_5;
												$D_IT_Hume_6A= $database->D_IT_Hume_6;
												
												$D_IT_BocA= $database->D_IT_Boc;
												$D_IT_Sub_TotalA= $database->D_IT_Sub_Total;

												$D_IT_ROBA= $database->D_IT_ROB;
												

												$D_IT_FAL_Earth_CuttingA= $database->D_IT_FAL_Earth_Cutting;
												$D_IT_FAL_Earth_TransportA= $database->D_IT_FAL_Earth_Transport;
												$D_IT_FAL_Sub_TotalA= $database->D_IT_FAL_Sub_Total;
												
												
												$D_IT_TURA= $database->D_IT_TUR;
												

												$D_WAS_Well_WaterA= $database->D_WAS_Well_Water;
												$D_WAS_Pipe_BornA= $database->D_WAS_Pipe_Born;
												$D_WAS_Special_WaterA= $database->D_WAS_Special_Water;
												$D_WAS_Sub_TotalA= $database->D_WAS_Sub_Total;
												

												$D_SE_Pro_linesA=$database->D_SE_Pro_lines;
												$D_SE_Pro_TransA=$database->D_SE_Pro_Trans;
												$D_SE_New_TransA=$database->D_SE_New_Trans;
												$D_SE_SUB_TotalA=$database->D_SE_SUB_Total;
												

												$D_FUEL_SM_AMA=$database->D_FUEL_SM_AM;
												$D_FUEL_iseA=$database->D_FUEL_ise;
												$D_FUEL_LSEA=$database->D_FUEL_LSE;
												$D_FUEL_ATMA=$database->D_FUEL_ATM;
												$D_FUEL_POA=$database->D_FUEL_PO;
												$D_FUEL_Sub_TotalA=$database->D_FUEL_Sub_Total;
												

												$D_SaAD_DayA=$database->D_SaAD_Day;
												$D_SaAD_MealsA=$database->D_SaAD_Meals;
												$D_SaAD_TransportA=$database->D_SaAD_Transport;
												$D_SaAD_AccommodationA=$database->D_SaAD_Accommodation;
												$D_SaAD_Sub_TotalA=$database->D_SaAD_Sub_Total;
											


												$D_AD_BammersA=$database->D_AD_Bammers;
												$D_AD_HordingsA=$database->D_AD_Hordings;
												$D_AD_Hand_BillsA=$database->D_AD_Hand_Bills;
												$D_AD_RedioA=$database->D_AD_Redio;
												$D_AD_TVA=$database->D_AD_TV;
												$D_AD_PressA=$database->D_AD_Press;
												$D_AD_PresentsA=$database->D_AD_Presents;
												$D_AD_Propaganda_VanA=$database->D_AD_Propaganda_Van;
												$D_AD_Sub_TotalA=$database->D_AD_Sub_Total;
												

												
												$D_LAE_TaxA=$database->D_LAE_Tax;
												$D_LAE_PAA=$database->D_LAE_PA;
												$D_LAE_TransportA=$database->D_LAE_Transport;
												$D_LAE_Sub_TotalA=$database->D_LAE_Sub_Total;
											
												
												$D_Summery_COPUA=$database->D_Summery_COPU;
												$D_Summery_CODA=$database->D_Summery_COD;
												$D_Summery_COPA=$database->D_Summery_COP;
												




												

												
											}
											}
												?>

		
					
				<h2> Development Cost </h2>	
				<div class="col-md-4">
				
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
										<td style="width:50%"> <p class="text-primary"> Perimeter(Estimate)</p> <br> <p class="text-info"> Perimeter(Actual)</p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDS1" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_PerimeterA)){echo $D_SC_PerimeterA;} ?>' />
											<br> 
											<input class="form-control" type="text" name="txtDS1t" placeholder='Rs : 0.00' value='<?php if(isset($CPerimeter2)){echo $CPerimeter2;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Blocking out of plan(Estimate) </p> <br> <p class="text-info">Blocking out of plan (Actual)</p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDS2" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Blocking_out_of_planA)){echo $D_SC_Blocking_out_of_planA;} ?>' />
											<br> <br>
											<input class="form-control"  type="text" name="txtDS2t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Blocking_out_of_plan)){echo $D_SC_Blocking_out_of_plan;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Demarcation boundaries(Estimate) </p> <br> <p class="text-info">Demarcation boundaries(Actual)</p>  </td>
										<td> 
											<input class="form-control" type="text" name="txtDS3" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Demarcation_boundariesA)){echo $D_SC_Demarcation_boundariesA;} ?>' />
											<br> <br>
											<input class="form-control"  type="text" name="txtDS3t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Demarcation_boundaries)){echo $D_SC_Demarcation_boundaries;} ?>' />
										</td>
									</tr>
									</div>
									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Labour chargers(Estimate)</p> <br> <p class="text-info">Labour chargers(Actual)</p>  </td>
										<td> 
											<input class="form-control" type="text" name="txtDS4" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Labour_chargersA)){echo $D_SC_Labour_chargersA;} ?>' />
											<br> <br>
											<input class="form-control"  type="text" name="txtDS4t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Labour_chargers)){echo $D_SC_Labour_chargers;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Traveling (Estimate)</p> <br> <p class="text-info">Traveling (Actual)</p></td>
										<td> 
											<input class="form-control" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_TravelingA)){echo $D_SC_TravelingA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Traveling)){echo $D_SC_Traveling;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate) </p> <br> <p class="text-info"> Subtotal (Actual) </p></td>
										<td> 
											<input class="form-control"id="a2" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Sub_ToatalA)){echo $D_SC_Sub_ToatalA;} ?>' />
											<br>
											<input class="form-control"id="a1"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_SC_Sub_ToatalU)){echo $D_SC_Sub_ToatalU;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<?php 

										$d1sum = $D_SC_Sub_ToatalA - $D_SC_Sub_ToatalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d1sum)){echo $d1sum;} ?>' />
											
										</td>
									</tr>
									</div>

							

								</form>
							</table>
						</div>
					</div>
				</div>	

				

				<div class="col-md-4">
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
										<td><p class="text-primary">  parapet walls(Estimate) </p> <br> <p class="text-info"> parapet walls (Actual)</p></td>
										<td> 
											<input class="form-control" type="text" name="txtDF1" placeholder='Rs : 0.00' value='<?php if(isset($D_FE_parapet_wallsA)){echo $D_FE_parapet_wallsA;} ?>' />
											<br><br>
											<input class="form-control" type="text" name="txtDF1t" placeholder='Rs : 0.00' value='<?php if(isset($D_FE_parapet_walls)){echo $D_FE_parapet_walls;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Fencing(Estimate) </p> <br> <p class="text-info"> Fencing(Actual)</p></td>
										<td> 
											<input class="form-control" type="text" name="txtDF2" placeholder='Rs : 0.00' value='<?php if(isset($D_FE_FencingA)){echo $D_FE_FencingA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDF2t" placeholder='Rs : 0.00' value='<?php if(isset($D_FE_Fencing)){echo $D_FE_Fencing;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate) </p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="aF2" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_FE_Sub_TotalA)){echo $D_FE_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="aF1"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_FE_Sub_TotalU)){echo $D_FE_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<?php 

										$d2sum = $D_FE_Sub_TotalA - $D_FE_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d2sum)){echo $d2sum;} ?>' />
											
										</td>
									</tr>
									</div>
									
									

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Pemporary Hut </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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
										<td> <p class="text-primary"> Shed(Estimate) </p> <br> <p class="text-info"> Shed(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDPH1" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_ShedA)){echo $D_PH_ShedA;} ?>' />
											<br>
											<input class="form-control" type="text" name="txtDPH1t" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Shed)){echo $D_PH_Shed;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Structure Building(Estimate) </p> <br> <p class="text-info"> Structure Building(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDPH2" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Structure_BuildingA)){echo $D_PH_Structure_BuildingA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDPH2t" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Structure_Building)){echo $D_PH_Structure_Building;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Reno Of Existing Building(Estimate) </p> <br> <p class="text-info"> Reno Of Existing Building(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDPH3" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Reno_Of_Existing_BuildingA)){echo $D_PH_Reno_Of_Existing_BuildingA;} ?>'  />
											<br><br>
											<input class="form-control"  type="text" name="txtDPH3t" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Reno_Of_Existing_Building)){echo $D_PH_Reno_Of_Existing_Building;} ?>'/>
										</td>
									</tr>
									</div>
																	
										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate) </p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="PH1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Sub_TotalA)){echo $D_PH_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="PH2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_PH_Sub_TotalU)){echo $D_PH_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<?php 

										$d3sum = $D_PH_Sub_TotalA - $D_PH_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d3sum)){echo $d3sum;} ?>' />
											
										</td>
									</tr>
									</div>


								</form>
							</table>
						</div>
					</div>
				</div>
			</div>
				<div class="container">

				<div class="col-md-4">	
				<div class="panel panel-default">
					<div class="panel-heading">Watcher Wages </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_WW_Sub_Toatal = $database->D_WW_Sub_Toatal;
											
												
												
										}
									?>

								<form name="frmAddProp" method="POST" action="">

									
																		
																	
									<div class="form-group">
									<tr>

										<td><p class="text-primary"> SubTotal(Estimate) </p> <br> <p class="text-info"> SubTotal(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDW1" placeholder='Rs : 0.00' value='<?php if(isset($D_WW_Sub_ToatalA)){echo $D_WW_Sub_ToatalA;} ?>'  />
											<br>
											<input class="form-control"  type="text" name="txtDW1t" placeholder='Rs : 0.00' value='<?php if(isset($D_WW_Sub_ToatalU)){echo $D_WW_Sub_ToatalU;} ?>' />
										</td>
									</tr>
									</div>

									

									<div class="form-group">
									<tr>
										<?php 

										$d4sum = $D_WW_Sub_ToatalA - $D_WW_Sub_ToatalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d4sum)){echo $d4sum;} ?>' />
											
										</td>
									</tr>
									</div>
									
									


								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-4">	
				<div class="panel panel-default">
					<div class="panel-heading">Clearing </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 								<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												$D_CL_Clearing_Of_Trees_Roots = $database->D_CL_Clearing_Of_Trees_Roots;
												$D_CL_Clearing_Of_Shrubs = $database->D_CL_Clearing_Of_Shrubs;
												$D_CL_Sub_Total = $database->D_CL_Sub_Total;
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Clearing Of Trees & Roots(Estimate) </p> <br> <p class="text-info"> Clearing Of Trees & Roots(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDC1" placeholder='Rs : 0.00' value='<?php if(isset($D_CL_Clearing_Of_Trees_RootsA)){echo $D_CL_Clearing_Of_Trees_RootsA;} ?>' />
											<br><br>
											<input class="form-control" type="text" name="txtDC1t" placeholder='Rs : 0.00' value='<?php if(isset($D_CL_Clearing_Of_Trees_Roots)){echo $D_CL_Clearing_Of_Trees_Roots;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Clearing Of Shrubs(Estimate) </p> <br> <p class="text-info">Clearing Of Shrubs(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDC2" placeholder='Rs : 0.00' value='<?php if(isset($D_CL_Clearing_Of_ShrubsA )){echo $D_CL_Clearing_Of_ShrubsA ;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDC2t" placeholder='Rs : 0.00' value='<?php if(isset($D_CL_Clearing_Of_Shrubs)){echo $D_CL_Clearing_Of_Shrubs;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate) </p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="CL1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_CL_Sub_TotalA)){echo $D_CL_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="CL2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_CL_Sub_TotalU)){echo $D_CL_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<?php 

										$d5sum = $D_CL_Sub_TotalA - $D_CL_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d5sum)){echo $d5sum;} ?>' />
											
										</td>
									</tr>
									</div> 
							

								

								</form>
							</table>
						</div>
					</div>
				</div>


				<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Road Construction  </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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
										<td><p class="text-primary"> Earth cutting(Estimate) </p> <br> <p class="text-info"> Earth cutting(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDRC1" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Earth_cuttingA)){echo $D_RC_Earth_cuttingA;} ?>' /> 
											<br><br>
											<input class="form-control" type="text" name="txtDRC1t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Earth_cutting)){echo $D_RC_Earth_cutting;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Tarring(Estimate) </p> <br> <p class="text-info"> Tarring(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDRC2" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_TarringA)){echo $D_RC_TarringA;} ?>'  />
											<br>
											<input class="form-control"  type="text" name="txtDRC2t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Tarring)){echo $D_RC_Tarring;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Filling ABC(Estimate)</p> <br> <p class="text-info">Filling ABC(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDRC3" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Filling_ABCA)){echo $D_RC_Filling_ABCA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDRC3t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Filling_ABC)){echo $D_RC_Filling_ABC;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Grading(Estimate)</p> <br> <p class="text-info"> Grading(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDRC4" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_GradingA)){echo $D_RC_GradingA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDRC4t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Grading)){echo $D_RC_Grading;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>

										<td><p class="text-primary"> Retaining Walls(Estimate)</p> <br> <p class="text-info"> Retaining Walls(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDRC5" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Retaining_WallsA)){echo $D_RC_Retaining_WallsA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDRC5t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Retaining_Walls)){echo $D_RC_Retaining_Walls;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="RC1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Sub_TotalA)){echo $D_RC_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="RC2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_RC_Sub_TotalU)){echo $D_RC_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<?php 

										$d6sum = $D_RC_Sub_TotalA - $D_RC_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d6sum)){echo $d6sum;} ?>' />
											
										</td>
									</tr>
									</div> 

									
									

								

								</form>
							</table>
						</div>
					</div>
				</div>
</div>
<div class="container">
			 <div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Boundaries </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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
										<td><p class="text-primary"> Purchasing B/Stones(Estimate)</p> <br> <p class="text-info"> Purchasing B/Stones(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDB1" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_B_StonesA)){echo $D_BAN_Purchasing_B_StonesA;} ?>' />
											<br><br>
											<input class="form-control" type="text" name="txtDB1t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_B_Stones)){echo $D_BAN_Purchasing_B_Stones;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Purchasing Pegs(Estimate)</p> <br> <p class="text-info"> Purchasing Pegs(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDB2" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_PegsA)){echo $D_BAN_Purchasing_PegsA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDB2t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_Pegs)){echo $D_BAN_Purchasing_Pegs;} ?>'  />
										</td>
									</tr>
									</div>
									
							
									
									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Purchasing & installing(Estimate)</p> <br> <p class="text-info"> Purchasing & installing(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDB3" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_installingA)){echo $D_BAN_Purchasing_installingA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDB3t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Purchasing_installing)){echo $D_BAN_Purchasing_installing;} ?>'  />
										</td>
									</tr>
									</div>

									
									
									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Fixing Of No Boards(Estimate)</p> <br> <p class="text-info"> Fixing Of No Boards(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDB6" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Fixing_Of_No_BoardsA)){echo $D_BAN_Fixing_Of_No_BoardsA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDB6t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Fixing_Of_No_Boards)){echo $D_BAN_Fixing_Of_No_Boards;} ?>'   />
										</td>
									</tr>
									</div>
										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Zone Doards(Estimate)</p> <br> <p class="text-info"> Zone Doards(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDB7" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Zone_DoardsA)){echo $D_BAN_Zone_DoardsA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDB7t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Zone_Doards)){echo $D_BAN_Zone_Doards;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="BAN1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Sub_ToatalA)){echo $D_BAN_Sub_ToatalA;} ?>' />
											<br>
											<input class="form-control"id="BAN2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_BAN_Sub_ToatalU)){echo $D_BAN_Sub_ToatalU;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<?php 

										$d7sum = $D_BAN_Sub_ToatalA - $D_BAN_Sub_ToatalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d7sum)){echo $d7sum;} ?>' />
											
										</td>
									</tr>
									</div> 

								</form>

							


							</table>
						</div>
					</div>
				</div>


				 <div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Drainage   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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
										<td><p class="text-primary"> Earth(Estimate)</p> <br> <p class="text-info"> Earth(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDD1" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_EarthA)){echo $D_DRA_EarthA;} ?>' />
											<br>
											<input class="form-control" type="text" name="txtDD1t" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Earth)){echo $D_DRA_Earth;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Cement Brickworks(Estimate)</p> <br> <p class="text-info"> Cement Brickworks(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDD2" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Cement_BrickworksA)){echo $D_DRA_Cement_BrickworksA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDD2t" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Cement_Brickworks)){echo $D_DRA_Cement_Brickworks;} ?>' />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Cement Concreate(Estimate)</p> <br> <p class="text-info">Cement Concreate(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDD3" placeholder='Rs : 0.00'  value='<?php if(isset($D_DRA_Cement_ConcreateA)){echo $D_DRA_Cement_ConcreateA;} ?>'/>
											<br><br>
											<input class="form-control"  type="text" name="txtDD3t"  placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Cement_Concreate)){echo $D_DRA_Cement_Concreate;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Rubble(Estimate)</p> <br> <p class="text-info"> Rubble(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDD4" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_RubbleA)){echo $D_DRA_RubbleA;} ?>'  />
											<br>
											<input class="form-control"  type="text" name="txtDD4t" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Rubble)){echo $D_DRA_Rubble;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="DRA1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Sub_TotalA)){echo $D_DRA_Sub_TotalA;} ?>' />
											<input class="form-control"id="DRA2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_DRA_Sub_TotalU)){echo $D_DRA_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<?php 

										$d8sum = $D_DRA_Sub_TotalA - $D_DRA_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d8sum)){echo $d8sum;} ?>' />
											
										</td>
									</tr>
									</div> 

									

								</form>
							</table>
						</div>
					</div>
				</div>


				 <div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Item </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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
										<td><p class="text-primary"> Balance Brought Down(Estimate)</p> <br> <p class="text-info"> Balance Brought Down(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT1" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Balance_Brought_DownA)){echo $D_IT_Balance_Brought_DownA;} ?>'  />
											<br><br>
											<input class="form-control" type="text" name="txtDT1t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Balance_Brought_Down)){echo $D_IT_Balance_Brought_Down;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Culverts(Estimate)</p> <br> <p class="text-info"> Culverts(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT2" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_CulvertsA)){echo $D_IT_CulvertsA;} ?>'  />
											<br>
											<input class="form-control"  type="text" name="txtDT2t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Culverts)){echo $D_IT_Culverts;} ?>' />
										</td>
									</tr>
									</div>
									
							
									
									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Hume pipes- dia. 1.00'(Estimate)</p> <br> <p class="text-info"> Hume pipes- dia. 1.00'(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT3" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_1A)){echo $D_IT_Hume_1A;} ?>'  />
											<br><br>
											<input class="form-control"  type="text" name="txtDT3t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_1)){echo $D_IT_Hume_1;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Hume pipes- dia. 1.50'(Estimate)</p> <br> <p class="text-info"> Hume pipes- dia. 1.50'(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT4" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_2A)){echo $D_IT_Hume_2A;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDT4t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_2)){echo $D_IT_Hume_2;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Hume pipes- dia. 2.00'(Estimate)</p> <br> <p class="text-info"> Hume pipes- dia. 2.00'(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT5" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_3A)){echo $D_IT_Hume_3A;} ?>'  />
											<br><br>
											<input class="form-control"  type="text" name="txtDT5t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_3)){echo $D_IT_Hume_3;} ?>' />
										</td>
									</tr>
									</div>
									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Hume pipes- dia. 2.50'(Estimate)</p> <br> <p class="text-info"> Hume pipes- dia. 2.50'(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT6" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_4A)){echo $D_IT_Hume_4A;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDT6t"placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_4)){echo $D_IT_Hume_4;} ?>' />
										</td>
									</tr>
									</div>
										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Hume pipes- dia. 3.00'(Estimate)</p> <br> <p class="text-info"> Hume pipes- dia. 3.00'(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT7" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_5A)){echo $D_IT_Hume_5A;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDT7t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_5)){echo $D_IT_Hume_5;} ?>' />
										</td>
									</tr>
									</div>
									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Hume pipes- dia. 4.00' (Estimate)</p> <br> <p class="text-info">  Hume pipes- dia. 4.00'(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT8" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_6A)){echo $D_IT_Hume_6A;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDT8t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Hume_6)){echo $D_IT_Hume_6;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Boc(Estimate)</p> <br> <p class="text-info"> Boc(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDT9" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_BocA)){echo $D_IT_BocA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDT9t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Boc)){echo $D_IT_Boc;} ?>' />
										</td>
									</tr>
									</div>

											<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="D_IT1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Sub_TotalA)){echo $D_IT_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="D_IT2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_Sub_TotalU)){echo $D_IT_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<?php 

										$d9sum = $D_IT_Sub_TotalA - $D_IT_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d9sum)){echo $d9sum;} ?>' />
											
										</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>
			</div>
				<div class="container">

				 <div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Rock Blasting   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_IT_ROB = $database->D_IT_ROB;
												
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
								



											<div class="form-group">
									<tr>
										<td><p class="text-primary"> Sub Total(Estimate)</p> <br> <p class="text-info"> Sub Total(Actual) </p> </td>
										<td> 
											<input class="form-control"id="ROB1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_BocA)){echo $D_IT_BocA;} ?>' />
											<br><br>
											<input class="form-control"id="ROB2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_ROBU)){echo $D_IT_ROBU;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<?php 

										$d10sum = $D_IT_BocA - $D_IT_ROBU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d10sum)){echo $d10sum;} ?>' />
											
										</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				 <div class="col-md-4">
					<div class="panel panel-default">
					<div class="panel-heading">Filling And Levling  </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_IT_FAL_Earth_Cutting = $database->D_IT_FAL_Earth_Cutting;
												$D_IT_FAL_Earth_Transport = $database->D_IT_FAL_Earth_Transport;
												$D_IT_FAL_Sub_Total = $database->D_IT_FAL_Sub_Total;
												
											
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
																		
									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Earth Cutting And Filling(Estimate)</p> <br> <p class="text-info"> Earth Cutting And Filling(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDFL1" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_FAL_Earth_CuttingA)){echo $D_IT_FAL_Earth_CuttingA;} ?>' />
											<br><br>
											<input class="form-control" type="text" name="txtDFL1t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_FAL_Earth_Cutting)){echo $D_IT_FAL_Earth_Cutting;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Earth Transport And Filling(Estimate)</p> <br> <p class="text-info"> Earth Transport And Filling(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDFL2" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_FAL_Earth_TransportA)){echo $D_IT_FAL_Earth_TransportA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDFL2t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_FAL_Earth_Transport)){echo $D_IT_FAL_Earth_Transport;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="FAL1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_FAL_Sub_TotalA)){echo $D_IT_FAL_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="FAL2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_FAL_Sub_TotalU)){echo $D_IT_FAL_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<?php 

										$d11sum = $D_IT_FAL_Sub_TotalA - $D_IT_FAL_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d11sum)){echo $d11sum;} ?>' />
											
										</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

				 <div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Turfing   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
										foreach($database->results() as $database){
												
												
												$D_IT_TUR = $database->D_IT_TUR;
												
												
										}
									?>
								<form name="frmAddProp" method="POST" action="">
								
								

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="TUR1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_TURA)){echo $D_IT_TURA;} ?>' />
											<br>
											<input class="form-control"id="TUR2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_IT_TURU)){echo $D_IT_TURU;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<?php 

										$d12sum = $D_IT_TURA - $D_IT_TURU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d12sum)){echo $d12sum;} ?>' />
											
										</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


		</div> <!-- End 8st -->
	</div>
		<div class="container">
		 <div class="col-md-4">
			<div class="panel panel-default">
					<div class="panel-heading"> Water Supply </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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
										<td><p class="text-primary"> Well Water(Estimate)</p> <br> <p class="text-info"> Well Water(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDWS1" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Well_WaterA)){echo $D_WAS_Well_WaterA;} ?>' />
											<br>
											<input class="form-control" type="text" name="txtDWS1t" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Well_Water)){echo $D_WAS_Well_Water;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Pipe Born Water[Mainline](Estimate)</p> <br> <p class="text-info"> Pipe Born Water[Mainline](Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDWS2" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Pipe_BornA)){echo $D_WAS_Pipe_BornA;} ?>' />
											<br><br><br>
											<input class="form-control"  type="text" name="txtDWS2t" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Pipe_Born)){echo $D_WAS_Pipe_Born;} ?>' />
										</td>
									</tr>
									</div>
									
							
									
									
										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Special Water Service Scheme(Estimate)</p> <br> <p class="text-info">Special Water Service Scheme(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDWS3" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Special_WaterA)){echo $D_WAS_Special_WaterA;} ?>' />
											<br><br>
											<input class="form-control"  type="text" name="txtDWS3t" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Special_Water)){echo $D_WAS_Special_Water;} ?>' />
										</td>
									</tr>
									</div>

												<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="WAS1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Sub_TotalA)){echo $D_WAS_Sub_TotalA;} ?>' />
											<input class="form-control"id="WAS2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_WAS_Sub_TotalU)){echo $D_WAS_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<?php 

										$d13sum = $D_WAS_Sub_TotalA - $D_WAS_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d13sum)){echo $d13sum;} ?>' />
											
										</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>

			 <div class="col-md-4">	
				<div class="panel panel-default">
					<div class="panel-heading">Elecrtricity Supply   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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

										<td><p class="text-primary"> Providing From Existing Lines(Estimate)</p> <br> <p class="text-info"> Providing From Existing Lines(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtdes1" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_Pro_linesA)){echo $D_SE_Pro_linesA;} ?>'  />
											<input class="form-control"  type="text" name="txtdes1t" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_Pro_lines)){echo $D_SE_Pro_lines;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Providing Augment Of Existing Transformer(Estimate)</p> <br> <p class="text-info">Providing Augment Of Existing Transformer(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtdes2" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_Pro_TransA)){echo $D_SE_Pro_TransA;} ?>'  />
											<input class="form-control"  type="text" name="txtdes2t" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_Pro_Trans)){echo $D_SE_Pro_Trans;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> New Transformer(Estimate)</p> <br> <p class="text-info">New Transformer(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtdes3" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_New_TransA)){echo $D_SE_New_TransA;} ?>'  />
											<input class="form-control"  type="text" name="txtdes3t" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_New_Trans)){echo $D_SE_New_Trans;} ?>' />
										</td>
									</tr>
									</div>

													<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="SE10" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_SUB_TotalA)){echo $D_SE_SUB_TotalA;} ?>' />
											<input class="form-control"id="SE20"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_SE_SUB_TotalU)){echo $D_SE_SUB_TotalU;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<?php 

										$d14sum = $D_SE_SUB_TotalA - $D_SE_SUB_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d14sum)){echo $d14sum;} ?>' />
											
										</td>
									</tr>
									</div>
								

								</form>
							</table>
						</div>
					</div>
				</div>

				 <div class="col-md-4">	
				<div class="panel panel-default">
					<div class="panel-heading"> Fuel Expenses </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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
										<td><p class="text-primary"> SM,AM(Estimate)</p> <br> <p class="text-info"> SM,AM(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDFE1" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_SM_AMA)){echo $D_FUEL_SM_AMA;} ?>'  />
											<input class="form-control" type="hidden" name="txtDFE1t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_SM_AM)){echo $D_FUEL_SM_AM;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> ise(Estimate)</p> <br> <p class="text-info"> ise(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDFE2" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_iseA)){echo $D_FUEL_iseA;} ?>'  />
											<input class="form-control"  type="hidden" name="txtDFE2t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_ise)){echo $D_FUEL_ise;} ?>'  />
										</td>
									</tr>
									</div>
									
							
									
									
										<div class="form-group">
									<tr>
										<td><p class="text-primary"> LSE(Estimate)</p> <br> <p class="text-info"> LSE(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDFE3" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_LSEA)){echo $D_FUEL_LSEA;} ?>' />
											<input class="form-control"  type="hidden" name="txtDFE3t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_LSE)){echo $D_FUEL_LSE;} ?>'  />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> A/TM(Estimate)</p> <br> <p class="text-info"> A/TM(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDFE4" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_ATMA)){echo $D_FUEL_ATMA;} ?>' />
											<input class="form-control"  type="hidden" name="txtDFE4t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_ATM)){echo $D_FUEL_ATM;} ?>'  />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> P/O(Estimate)</p> <br> <p class="text-info"> P/O(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDFE5" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_POA)){echo $D_FUEL_POA;} ?>' />
											<input class="form-control"  type="hidden" name="txtDFE5t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_PO)){echo $D_FUEL_PO;} ?>'  />
										</td>
									</tr>
									</div>


									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="FEUL1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_Sub_TotalA)){echo $D_FUEL_Sub_TotalA;} ?>' />
											<input class="form-control"id="FEUL2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_FUEL_Sub_TotalU)){echo $D_FUEL_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

											<div class="form-group">
									<tr>
										<?php 

										$d15sum = $D_FUEL_Sub_TotalA - $D_FUEL_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d15sum)){echo $d15sum;} ?>' />
											
										</td>
									</tr>
									</div>
									


								</form>
							</table>
						</div>
					</div>
				</div>
</div>
<div class="container">
				 <div class="col-md-4">	
				<div class="panel panel-default">
					<div class="panel-heading"> Sales Day Expenses  </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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

										<td ><p class="text-primary"> Sundry(Estimate)</p> <br> <p class="text-info"> Sundry(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDSDE1" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_DayA)){echo $D_SaAD_DayA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDSDE1t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Day)){echo $D_SaAD_Day;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Meals/Refreshments<br>(Estimate)</p> <br> <p class="text-info"> Meals/Refreshments<br>(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDSDE2" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_MealsA)){echo $D_SaAD_MealsA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDSDE2t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Meals)){echo $D_SaAD_Meals;} ?>'  />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Transport(Estimate)</p> <br> <p class="text-info"> Transport(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDSDE3" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_TransportA)){echo $D_SaAD_TransportA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDSDE3t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Transport)){echo $D_SaAD_Transport;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Accommodation(Estimate)</p> <br> <p class="text-info"> Accommodation(Actual) </p> </td>
										<td>
											<input class="form-control" type="text" name="txtDSDE4" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_AccommodationA)){echo $D_SaAD_AccommodationA;} ?>' /> 
											<br>
											<input class="form-control"  type="text" name="txtDSDE4t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Accommodation)){echo $D_SaAD_Accommodation;} ?>'  />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="SaAD1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Sub_TotalA)){echo $D_SaAD_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="SaAD2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_SaAD_Sub_TotalU)){echo $D_SaAD_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<?php 

										$d16sum = $D_SaAD_Sub_TotalA - $D_SaAD_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d16sum)){echo $d16sum;} ?>' />
											
										</td>
									</tr>
									</div>
								

								</form>
							</table>
						</div>
					</div>
				</div>


				<div class="col-md-4">

					<div class="panel panel-default">
					<div class="panel-heading"> Advertising   </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 								<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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
										<td><p class="text-primary"> Bammers(Estimate)</p> <br> <p class="text-info"> Bammers(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtda1" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Bammers)){echo $D_AD_Bammers;} ?>'  />
											<br>
											<input class="form-control" type="text" name="txtda1t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Bammers)){echo $D_AD_Bammers;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Hordings(Estimate)</p> <br> <p class="text-info"> Hordings(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtda2" placeholder='Rs : 0.00'  value='<?php if(isset($D_AD_Bammers)){echo $D_AD_Bammers;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtda2t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Hand_Bills)){echo $D_AD_Hand_Bills;} ?>' />
										</td>
									</tr>
									</div>
									
							
									
									
										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Hand Bills(Estimate)</p> <br> <p class="text-info"> Hand Bills(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtda3" placeholder='Rs : 0.00'  value='<?php if(isset($D_AD_Hand_BillsA)){echo $D_AD_Hand_BillsA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtda3t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Redio)){echo $D_AD_Redio;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Redio(Estimate)</p> <br> <p class="text-info"> Redio(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtda4" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_RedioA)){echo $D_AD_RedioA;} ?>'  />
											<br>
											<input class="form-control"  type="text" name="txtda4t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_TV)){echo $D_AD_TV;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> T/V(Estimate)</p> <br> <p class="text-info"> T/V(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtda5" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_TVA)){echo $D_AD_TVA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtda5t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_TV)){echo $D_AD_TV;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Press(Estimate)</p> <br> <p class="text-info"> Press(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtda6" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_PressA)){echo $D_AD_PressA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtda6t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Press)){echo $D_AD_Press;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Gift And Presents(Estimate)</p> <br> <p class="text-info"> Gift And Presents(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtda7" placeholder='Rs : 0.00'  value='<?php if(isset($D_AD_PresentsA)){echo $D_AD_PresentsA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtda7t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Presents)){echo $D_AD_Presents;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Propaganda Van(Estimate)</p> <br> <p class="text-info"> Propaganda Van(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtda8" placeholder='Rs : 0.00'value='<?php if(isset($D_AD_Propaganda_VanA)){echo $D_AD_Propaganda_VanA;} ?>'  />
											<br>
											<input class="form-control"  type="text" name="txtda8t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Propaganda_Van)){echo $D_AD_Propaganda_Van;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="AD1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Sub_TotalA)){echo $D_AD_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="AD2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_AD_Sub_TotalU)){echo $D_AD_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

											<div class="form-group">
									<tr>
										<?php 

										$d17sum = $D_AD_Sub_TotalA - $D_AD_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d17sum)){echo $d17sum;} ?>' />
											
										</td>
									</tr>
									</div>

							

								</form>
							</table>
						</div>
					</div>
				</div>

<div class="col-md-4">
<div class="panel panel-default">
					<div class="panel-heading"> Local Authority Expenses  </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	 							<?php
										
				
										$database = DB:: getinstance()->get('tbl_cost_of_project_2' , array('id' ,'=' , $id));


										
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

										<td><p class="text-primary"> 1% Tax(Estimate)</p> <br> <p class="text-info"> 1% Tax(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDLAE1" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_TaxA)){echo $D_LAE_Tax;} ?> ' />
											<br>
											<input class="form-control"  type="text" name="txtDLAE1t" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_Tax)){echo $D_LAE_Tax;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Plan Approvel(Estimate)</p> <br> <p class="text-info"> Plan Approvel(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDLAE2" placeholder='Rs : 0.00'  value='<?php if(isset($D_LAE_PAA)){echo $D_LAE_PAA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDLAE2t" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_PA)){echo $D_LAE_PA;} ?>' />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>

										<td><p class="text-primary"> Transport(Estimate)</p> <br> <p class="text-info">Transport(Actual) </p> </td>
										<td> 
											<input class="form-control" type="text" name="txtDLAE3" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_Sub_TotalA)){echo $D_LAE_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"  type="text" name="txtDLAE3t" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_Transport)){echo $D_LAE_Transport;} ?>' />
										</td>
									</tr>
									</div>

										<div class="form-group">
									<tr>
										<td><p class="text-primary"> Subtotal(Estimate)</p> <br> <p class="text-info"> Subtotal(Actual) </p> </td>
										<td> 
											<input class="form-control"id="LAE1" type="text" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_Sub_TotalA)){echo $D_LAE_Sub_TotalA;} ?>' />
											<br>
											<input class="form-control"id="LAE2"  type="text" name="txtDS5t" placeholder='Rs : 0.00' value='<?php if(isset($D_LAE_Sub_TotalU)){echo $D_LAE_Sub_TotalU;} ?>' />
										</td>
									</tr>
									</div>

											<div class="form-group">
									<tr>
										<?php 

										$d18sum = $D_LAE_Sub_TotalA - $D_LAE_Sub_TotalU; 
										?>

										<td class="success"><p class="text-warning"> Difference </p></td>
										<td class="success"> 
											<input class="form-control" type="text" id ="result1" name="txtDS5" placeholder='Rs : 0.00' value='<?php if(isset($d18sum)){echo $d18sum;} ?>' />
											
										</td>
									</tr>
									</div>

								

								</form>
							</table>
						</div>
					</div>
				</div>
</div>

					<?php
			
					

										
									}}
							?>
				

		

		

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