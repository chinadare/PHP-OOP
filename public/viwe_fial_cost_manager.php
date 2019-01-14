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
											die ("no user");
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
				
					<li ><a href="viwe_est_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View  Estimated Project Cost</a></li>
				<li ><a href="viwe_act_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View Actual Project Cost</a></li>	
				<li ><a href="viwe_cost_com_manaer.php"><i class="fa fa-dashboard"></i> View  project Cost Compare</a></li>
				<li class='open'><a href="viwe_fial_cost_manager.php"><i class="fa fa-dashboard"></i> View  project Cost Diffrence</a></li>						
				
				
				
			

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
									<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Manager] : Actual Project Cost Diffrence <a/> </p>
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
																	die ("No Project Summery");
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
		
		<div id="printS" class="container"> <!-- 1st -->
						
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
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Current Projects <button  class=" pull-right" onclick='printContent("printS")'><span class="glyphicon glyphicon-print"></span> Print </button>  </div>
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
								<tr  >
								<th ><p> Project Name</p></th>
								<th class='text-primary'><p class="text-primary">Purchase Cost (Estimated)</p></th>
								<th class='text-primary'><p class="text-primary">Development Cost (Estimated)</p></th>
								<th class='success'><p class="text-primary">project Cost (Estimated)</p></th>
								
								<th class="success"><p class="text-info">Development Cost (Actual)</p></th>
								
								<th class="success"> <p class="text-warning">Main Diffrent </p></th>
								
								
								
								
							
							
									<?php
									$id = Input::get('cmbDis00');
									
									$database = DB:: getinstance()->query("SELECT * FROM report_summery   WHERE  p_id='$id'");
									if(!$database->count()){
											die ("No Project Summery");
											}else{
											
											foreach($database->results() as $database){
												$pj1 =  $database->p_id;
												$sum1 = $database->D_Summery_COPU_1;
												$sum2 = $database->D_Summery_COD_1;
												$sum3 = $database->D_Summery_COP_1;
											}

											}

									$database = DB:: getinstance()->query("SELECT * FROM report_summery   WHERE  p_id_1='$id'");
									if(!$database->count()){
											die ("No Project Summery");
											}else{
											
											foreach($database->results() as $database){
												$pj = $database->p_id_1;
												
											 	$sum5 = $database->D_Summery_COD_2;
												$sum6 = $database->D_Summery_COP_2;
											}

											}	

									$database = DB:: getinstance()->query("SELECT * FROM tbl_project   WHERE  id='$pj1'");
									if(!$database->count()){
											die ("No Project Summery");
											}else{
											
											foreach($database->results() as $database){
												$Name1 = $database->pj_name;
												
											}

											}	
									$database = DB:: getinstance()->query("SELECT * FROM tbl_project   WHERE  id='$pj'");
									if(!$database->count()){
											die ("No Project Summery");
											}else{
											
											foreach($database->results() as $database){
												$Name = $database->pj_name;
												
											}

											}		
											$Psum = $sum3 - $sum5 ;
											


										echo "<form name='frmLogin' method='POST' action='Exe_home2.php'>";
										
										echo	"<tbody>";
										echo	"<tr>";
										
										echo	" <td> <p '> $Name1 </p> </td> ";
										echo	"<td> <p class='text-primary'> $sum1 </p> </td> ";
										echo	"<td> <p class='text-primary'> $sum2 </p> </td>";
										echo	"<td> <p class='text-primary'> $sum3 </p></td>";
										

										
										echo	"<td> <p class='text-info'> $sum5 </p> </td>";
										echo	"<td class='text-warning'> $Psum  </td>";
										

										
										
										
									
								
								
										echo	"</tbody>";
										echo	"</tr>";
												
										echo 	"</form>";

									


									?>
									
								</tr>
								</thead>
								</ul>	



							</table>
							</div>
						</div>				
					</div>


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