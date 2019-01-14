<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('managing_director')) {
		if(Input::exists()){


			if(isset($_POST['btnupdate'])){
			$id = Input::get('txtidare');
			
			$user->update('tbl_property',array(


            "block_no" => Input::get('txtCnBNO'),
            "b_area" => Input::get('txtCnBA'),
            "est_perch_price" => Input::get('txtCnEPP'),
            

 
            


            ),$id);

			$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => " Update PROJECT DETAILS   ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtCnBNO').','.Input::get('txtCnBA').','.Input::get('txtCnEPP')
						            							            
							   


							            ));

				Redirect::to('update_project.php');
			}
			
										
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
							?>Account <i class="fa fa-angle-down hidden-side"></i></a>
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
							<li class="ts-label">Main</li>
				
					<li><a href="exe.php"><i class="fa fa-dashboard"></i> Project Summery</a></li>

				<li><a href="Exe_viwe_Sec.php"><i class="fa fa-dashboard"></i> Activity Log</a></li>

				<li><a href="cop_compare.php"><i class="fa fa-dashboard"></i> Project Cost Report </a></li>

				<li><a href="COP_SUM_summery.php"><i class="fa fa-dashboard"></i> Project Cost Summery </a></li>
			
				<li><a href="cost_of_p2.php"><i class="fa fa-dashboard"></i>  Update Project Cost</a></li>

				<li><a href="update_project.php"><i class="fa fa-dashboard"></i>  Update Projects </a></li>

					<li><a href="Resell_MD.php"><i class="fa fa-dashboard"></i> Land Resell </a></li>				
				
				
			

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

				
						<div class="row">
							
						</div>
		<div class="container">
		
		

			<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Managering Director] : Projects  <a/> </p>

							<h3 id='heading' ><?php $name = Input::get('txtname');echo $name ;?>  <?php $loca = Input::get('txtloca');echo $loca ;?> </h3>
								

					<div class="col-md-10">
				<div class="panel panel-default">
				
					<div class="panel-heading">Project Details</div>

												<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
								 

								 <thead>
								<tr>
								<th>Block No</th>
								<th>Block Area</th>
								<th>Estimated Price</th>
								<th>Status</th>
								<th>Update</th>
								
								
								
							
							
									<?php
								
												
												$id = Input::get('txtidi');

													
																	//$database = DB:: getinstance()->get('tbl_property' , array(

																	//		'project_id' ,'=' , $id
																	$database = DB:: getinstance()->query("SELECT *  FROM tbl_property WHERE project_id =  '$id'"																	
																			);
																			if(!$database->count()){
																				echo "no userss";
																			}else{
																				foreach($database->results() as $database){
																					echo "<form name='frmLogin' method='POST' action='#'>";

																				echo	"<tbody>";
																				echo		"<tr>";
																				echo	"<td> <input class='form-control' type='text' name='txtCnBNO' value= '$database->block_no' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtCnBA' value= '$database->b_area' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtCnEPP' value= '$database->est_perch_price' </td>";
																				
																				
																				if($database->status =="1"  ){
																					echo	'<td> <span class="label label-success">Avallabe</span> </td>';
																				}if($database->status =="2"  ){
																					echo	'<td> <span class="label label-info">Reserved</span> </td>';
																				}if($database->status =="3"  ){
																					echo	'<td> <span class="label label-primary">Soled</span> </td>';
																				}if($database->status =="4"  ){
																					echo	'<td> <span class="label label-danger">Re-Soled</span> </td>';
																				}    

																				

																
																				echo	"<input type='hidden' name='txtidare' value= '$database->id' /> ";
																				
																				echo    '<th> <button class="btn btn-info" type="submit" name="btnupdate"  /> update </button> </th>';
																				
																				


																				


																				echo 	"</tr>";
																				echo "</tbody>";
																				echo "</form>";

																				}										
																			}

									
									?>
								</tr>
								</thead>
								</ul>	



							</table>
							 <a type="button" class="btn btn-warning" href="update_project.php" data-target="Signin">GO back</a>
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
						
									}
	
}else{
	Redirect::to('index.php');
}