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
		
			<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Managering Director] : Update Project <a/> </p>

		

					<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Update Project</div>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
								 

								 <thead>
								<tr class="info" >
								<th>Project Name</th>
								<th>Project District</th>
								<th>Project Location</th>
								<th>Block area</th>
								<th>No of block </th>
								<th>Update </th>

								
								
							
							
									<?php
									$database = DB:: getinstance()->query('SELECT * FROM tbl_project  JOIN tbl_district ON tbl_project.district_id=tbl_district.dis_id  ');


										if(!$database->count()){
											echo "no userss";
										}
										foreach($database->results() as $database){
										echo "<form name='frmLogin' method='POST' action=''>";
										
										echo	"<tbody>";
										echo	"<tr>";
										
										
										echo	"<td><input class='form-control' type='text' name='txtpjnU' value= '$database->pj_name' /> </td>";
										echo	"<td> $database->district </td> ";
										
										echo	"<td><input class='form-control' type='text' name='txtlocation' value= $database->location /></td>";
										echo	"<td><input class='form-control' type='text' name='txtpjnTA' value= '$database->tot_area' /> </td>";
										echo	"<td><input class='form-control' type='text' name='txtpjnNoB' value= '$database->no_of_blocks' /> </td>";
										
										echo	"<input type='hidden' name='txtid1' value= '$database->id' /> ";
										
										echo    '<th> <button class="btn btn-info" type="submit" name="btnUp"  /> Save </button> </th>';
										
										

										echo	"</tbody>";
										echo	"</tr>";
										
										echo 	"</form>";
										}

										if(Input::exists()){
											if(isset($_POST['btnUp'])){
														 $id = Input::get('txtid1');
															//	echo	 $name = Input::get('txtpjnU');
																//echo	 $loca = Input::get('txtpjnL');
															//	echo	 $totA = Input::get('txtpjnTA');
															//	echo	 $NOB = Input::get('txtpjnNoB');

																	 try{

																				  		

																	$user->update('tbl_project',array(

																		 'pj_name' => Input::get('txtpjnU'),
																		 'location' => Input::get('txtlocation'),
																		 'tot_area' => Input::get('txtpjnTA'),
																		 'no_of_blocks' => Input::get('txtpjnNoB')
																							  			
																					  
																	),$id);

																	$user->create('login_sec',array(

													       		 		"Log_id" => $user->data()->id,
															            
															            "Login_time" => date("Y-m-d h:i:s"),
															            "Page" => " Update UPDATE PROJECT   ",
															            "COP_Pid" => $id,
															            "Activity" =>Input::get('txtpjnU').','.Input::get('txtlocation').','.Input::get('txtpjnTA').','.Input::get('txtpjnNoB')
														            							            
															   


															            ));


																	echo '<div class="alert alert-success">';
																	echo '    <a href="#" aria-label="close">&times;</a>';
																	echo '    <strong>Success!</strong> Data has been insert into Database.';
																	echo ' </div>';	
																	}catch(Exception $e){
																		die($e->getMessage());
																	}

																	}else{
																		echo "kkkk";
																	}

																	}else{
																		//echo "saas";
																		}	
										

										
									?>
								</tr>
								</thead>
								</ul>	



							</table>
							 <a type="button" class="btn btn-success" href="update_project.php" data-target="Signin">GO back</a>
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
	Redirect::to("index.php");
}