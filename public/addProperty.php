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
				<a href="#">
			<?php
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

			

				<li class="open"><a href="addProperty.php"><i class="fa fa-dashboard"></i> Add New Project</a></li>

				

				<li><a href="Add_block_details.php"><i class="fa fa-dashboard"></i> Add Block Price</a></li>

				<li><a href="Exe_create_discount.php"><i class="fa fa-dashboard"></i> Add Discount</a></li>

				<li><a href="application.php"><i class="fa fa-dashboard"></i> Add Customer</a></li>

				<li><a href="Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

				

				<li><a href="Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

				<li><a href="Conti_payment.php"><i class="fa fa-dashboard"></i> Customer Payment</a></li>

				

			
				<li><a href="Exe_resell.php"><i class="fa fa-dashboard"></i> Land Resell</a></li>	
				

				

				<li><a href="cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

				

								
										
								
				
				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li><a href="#">Help</a></li>
					
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="#">My Account</a></li>
							<li><a href="#">Edit Account</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>

			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				
		<div class="container">
			<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Add Property <a/> </p>
			<?php
			 	$id = escape($user->data()->id); ?>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST"  && Input::get('btnAdd')){

		$validate = new Validate(); 
    	$validation =  $validate->check( $_POST ,array(

		      'cmbDis' => array('required'=>true), 
		      'txtPLoca' => array(
		      	'name' => 'Location',	
		      	'required'=>true,
		      	'min' => 2,
          		'max' => 200
		      	), 
		      'txtPName' => array(
		      	'name' => 'Name',
		      	'required'=>true,
		      	'min' => 2,
        		'max' => 200
		      	),
		      'txtTotArea' => array(
		      	'name' => 'Total Area',
		      	'required'=>true,
		      	'min' => 1,
         		'max' => 200
		      	),
		      'txtNoBlock' => array(
		      	'name' => 'Total Blocks',
		      	'required'=>true,
		      	'min' => 1,
         		'max' => 200
		      	)

		 ));

    	 if($validation->passed()){
        
       		 try {

       		 	$user->create('tbl_project',array(

       		 		"district_id" => Input::get('cmbDis'),
		            "location" => Input::get('txtPLoca'),
		            "pj_name" => Input::get('txtPName'),
		            "tot_area" => Input::get('txtTotArea'),
		            "no_of_blocks" => Input::get('txtNoBlock'),
		            "M_unit" => Input::get('cmbmunit')
		   


		            ));

       		 	$user->create('login_sec',array(

       		 		"Log_id" => $user->data()->id,
		           
		            "Login_time" => date("Y-m-d h:i:s"),
		            "Page" => "ADD PROJECT",
		          
		            "Activity" => Input::get('cmbDis').','.Input::get('txtPLoca').','.Input::get('txtPName').','.Input::get('txtTotArea').','.Input::get('txtNoBlock')
		            
		   


		            ));


       		 		echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';	
			       
		       		 echo'	<meta http-equiv="refresh" content="1">';

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
 	



		

	}	?>
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">ADD PROJECT</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
									<tr>
										<td> District </td>
										<td> 
											<select class="form-control" name="cmbDis" required>
											<?php	
												

												$database = DB:: getinstance()->query("SELECT * FROM tbl_district");
															if(!$database->count()){
																	echo "No Record";
																}else{
																	
																foreach($database->results() as $database){
												
												
													
																	echo "<option value='".$database->dis_id."'>".$database->district."</option>";
																	}

																}					
											?>
											</select>
										</td>
									</tr>
									
									<div class="form-group">
									<tr>
										<td> Location </td>
										<td> 
											<input class="form-control" type="text" pattern="^[A-Z a-z ]{1,}$" name="txtPLoca" value='<?php echo escape(Input::get('txtPLoca')); ?>' required/>
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Name </td>
										<td> 
											<input class="form-control"  type="text" pattern="^[A-Z a-z ]{1,}$" name="txtPName" value='<?php echo escape(Input::get('txtPName')); ?>' required/>
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>
										
										<td> Total Area </td>
										<td> 
											<input class="form-control" size="4" id='shit' type="number" name="txtTotArea"  value='<?php echo escape(Input::get('txtTotArea')); ?>' required/>
											<div align="right">
											<select class="form-control"  name="cmbmunit" style="width:40%;">

											    <option value="1">Perch</option>
											    <option value="2">Rood</option>
											    <option value="3">Arc</option>
											</select>
											</div>
										</td>
									</tr>
								</div>

									 <div class="col-lg-6">
  


									</div>
									<div class="form-group">
									<tr>
										<td> Total Blocks </td>
										<td> 
											<input class="form-control"  type="number" name="txtNoBlock" value='<?php echo escape(Input::get('txtNoBlock')); ?>'required />
										</td>
									</tr>
									</div>
									
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

	
			<div class="col-md-5">
				<?php
	
		
		if(isset($_POST['btnRe1'])){	
			$validate = new Validate();
			$validation = $validate->check($_POST, array(

			/*'txtFn' => array(
			'required' => true,
			'min' => 3,
			'max' => 200
			 )*/

			  ));
	 if($validation->passed()){
	 		$areaRe	=Input::get('txtREASON');
	 		$idRe	=Input::get('txtid1Reson');
		try {
			
		$database = DB:: getinstance()->query("UPDATE login_sec SET Activity='$areaRe' WHERE  id= '$idRe' ");
		         

		          
		} catch (Exception $e) {
		    die($e-> getMessage());
		}
		      }else{
		      	    foreach($validation->error() as $error){

		     		 }
		      }
		  } else{} 
		

?>
			
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


	/*if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['btnAdd'])){
		
		$district = $db->escape($_POST['cmbDis']);
		$location = $db->escape($_POST['txtPLoca']);
		$pjname = $db->escape($_POST['txtPName']);
		$tot_area = $db->escape($_POST['txtTotArea']);
		$no_block = $db->escape($_POST['txtNoBlock']);
		
		$sql = "INSERT INTO tbl_project (district_id, location, tot_area,  pj_name, no_of_blocks) 
				VALUES('$district', '$location', '$tot_area',	'$pjname', '$no_block')";
		$res = $db -> query($sql);
		echo $res;
	}*/
	}else{
		Redirect::to('index.php');
	}
?>