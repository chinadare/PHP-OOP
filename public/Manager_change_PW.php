<?php
require_once("core/init.php");
$user = new User();
if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}
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
			<li><a href="#">Settings</a></li>
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
							?>
				 Account <i class="fa fa-angle-down hidden-side"></i></a>
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
				
					
		
				<li><a href="Exe_viwe_fcash.php"><i class="fa fa-dashboard"></i> Full Cash Projects</a></li>
				<li><a href="report_Bank_loan.php"><i class="fa fa-dashboard"></i> Bank Loan report</a></li>
				<li><a href="home_manager.php"><i class="fa fa-dashboard"></i> Current Projects</a></li>
				
					<li><a href="viwe_est_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View  Estimated Project Cost</a></li>
				<li><a href="viwe_act_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View Actual Project Cost</a></li>	
				<li><a href="viwe_cost_com_manaer.php"><i class="fa fa-dashboard"></i> View  project Cost Compare</a></li>
				<li><a href="viwe_fial_cost_manager.php"><i class="fa fa-dashboard"></i> View  project Cost Diffrence</a></li>					
				

				

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
		
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Manager] : Edit Profile <a/> </p>	

		<?php
			if(Input::exists()){
				if(Input::get('btnUpd')){
					$validate = new Validate();
					$validation = $validate->check($_POST, array(					
						'txtfname' => array(
						  'name' => 'Employee name',
						  'required' => true,
						  'min' => 3,
						  'max' => 200
						),
						
						'txtdname' => array(
						  'name' => 'Display name',
						  'required' => true,
						  'min' => 3,
						  'max' => 200
						),
						
						'txtcon' => array(
						  'name' => 'Employee Contact Number',
						  'required' => true,
						  'tpnumber' => true
						),	

					));
					
					if($validation->passed()){
						
						$id = $user->data()->id;
						$img = $user->data()->Image;
						
						try {
							if(!empty($_FILES['file']['name'])){
								if(isset($img)&& $img!="images/d_prof.png"){
									unlink($img);
								}
								$imgname=$_FILES["file"]["name"];
								$temp_name=$_FILES["file"]["tmp_name"];
								
								$nname = md5(time());
								$tmp = explode(".", $imgname);
								$extension=end($tmp);
								
								$nnimgname = $nname.".".$extension;
								$target_path = "uploads/".$nnimgname;
								
								move_uploaded_file($temp_name, $target_path); 
									
							}else{				
								$target_path = $img;
							}

							$user->update('users',array(
								"Full_Emp_name" => Input::get('txtfname'),
								"Emp_name" => Input::get('txtdname'),
								"Con_No" => Input::get('txtcon'),
								"Image" => $target_path
							),$id);	
							echo "<div class='alert alert-success'><strong>Success!</strong> Profile has been updated </div>";
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

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Update Account Details </div>
					<div class="panel-body">
	 				<table class="table table-bordered table-striped">
				
					<form class="form-horizontal" method="POST" action="#" enctype='multipart/form-data'>
						<?php
							$database = DB:: getinstance()->get('users' , array('id' ,'=' , $user->data()->id));
							foreach($database->results() as $database){
						?>
						
						<div class="form-group">
						<tr>
							<td colspan="2">
								<table>
									<tr>
										<td width="40%"> Employee Number </td> 
										<td width="40%"> <input type="text" name="txtEno" disabled size="15" value="<?php echo $database->EmpNo; ?>" /> </td>
										<td rowspan="2"> <?php echo	'<img src="'.$database->Image.'" height="150" width="150">'; ?> </td>
									</tr>
									<tr>
										<td> User Name </td>
										<td> <input type="text" name="txtEno" disabled size="15" value="<?php echo $database->username; ?>" /> </td>
									</tr>
								</table>
									
								
							</td>
						</tr>
						</div>

						<div class="form-group">
						<tr>
							<td> Full Name </td>
							<td> 
								<input class="form-control"  type="text" name="txtfname" value="<?php echo $database->Full_Emp_name; ?>" required/>
							</td>
						</tr>
						</div>


						<div class="form-group">
						<tr>
							<td> Display Name </td>
							<td> 
								<input class="form-control"  type="text" name="txtdname"  value="<?php echo $database->Emp_name; ?>" />
							</td>
						</tr>
						</div>
						
						<div class="form-group">
						<tr>

							<td> Contact Number </td>
							<td> 
								<input class="form-control"  type="number" name="txtcon" value="<?php echo $database->Con_No; ?>" required/>
							</td>
						</tr>
						</div>

						<?php
						$image = escape($user->data()->Image);
						if($image != ""){ 
							echo '<div class="form-group">';
							echo '		<tr>';
							echo '			<td> Change Profile Picture </td>';
							
							echo '		 	<td>';
							echo '				<input name="file" value="" type="file" >';
									 
							echo '			</td>';
							echo '		</tr>';
							echo'		</div>	';
						}else{
							echo '	<div class="form-group">';
							echo '		<tr>';
							echo '			<td> Insert New Profile Picture </td>';

							echo '		 	<td>';
							echo '				<input name="file" value="" type="file" >';
									 
							echo '			</td>';
							echo '		</tr>';
							echo '		</div>	';
						}
							}
						?>
						
						<div class="form-group">
							<tr>
								<td colspan="2" align="right"> 															
									<input class="btn" type="submit" name="btnUpd" value="UPDATE" />
								</td>
							</tr>
						</div>
					</form>
					</table>
						</div>
					</div>
			</div>	
			
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST"  && Input::get('btnChg')){
					$validate = new Validate();
					$validation = $validate->check($_POST, array(   
						'txtcpass' => array(
						  'name' => 'Current Password',
						  'required' => true,
						  'min' => 3,
						  'max' => 20,  
						),
						
						'newpass' => array(
						  'name' => 'New Password',
						  'required' => true,
						  'min' => 3,
						  'max' => 20
						),
						
						'confpass' => array(
						  'name' => 'Confirm New Password',
						  'required' => true,     
						)
					));

					if($validation->passed()){ 
						
						$id = escape($user->data()->id);
						$cpw = Input::get('txtcpass');
						$npw = Input::get('newpass');
						$cnpw = Input::get('confpass');
					
						$database = DB:: getinstance()->get('users' , array('id' ,'=' , $id));
						foreach($database->results() as $database){
							$db_pw = $database->password;	
						}
						
						$salt = $database->Salt;
						$cpw = Hash::make($cpw,$salt);
						
						if($db_pw === $cpw){
							if($npw === $cnpw){
								try{	
									$nsalt = Hash::salt(32);
									$user->update('users',array(
										'password' => Hash::make($npw,$nsalt),
										"Salt" => $nsalt,
									),$id);							
									
									echo "<div style='position:absolute; top:11%; left:64.1%; width:33%; height:80px;'><div class='alert alert-success'><strong>Success!</strong> Password has been changed</div></div>";
								}catch(Exception $e){
									die($e->getMessage());
								}
								
							}else{
								echo "<div style='position:absolute; top:11%; left:64.1%; width:33%; height:80px;'><div class='alert alert-danger'> <strong> Error! &nbsp;&nbsp;-&nbsp;&nbsp; </strong> New password & confirm password are not matching</div></div>";
							}
							
						}else{
							echo "<div style='position:absolute; top:11%; left:64.1%; width:33%; height:80px;'><div class='alert alert-danger'> <strong> Error! &nbsp;&nbsp;-&nbsp;&nbsp; </strong> Incorrect current password </div></div>";
						}
					}else{
						$ecount=0;
						echo "<div style='position:absolute; top:11%; left:64.1%; width:33%; height:80px;'><div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
						$len = count($validation->error());
						foreach($validation->error() as $error){
							if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
							echo "&nbsp;&nbsp;# ".$error;
							if (!($ecount == $len - 1)) {
								echo ",&nbsp;&nbsp;";
							}
							$ecount+=1;
						}
						echo "</div></div>";
					}
				}
			?>
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">Change Password </div>
					<div class="panel-body">
	 				<table class="table table-bordered table-striped">
					<form class="form-horizontal" method="POST" action="#" name="frmChnPw">
						<tr>
							<td> Current Password </td>
							<td> 
								<input class="form-control"  type="password" name="txtcpass" required/>
							</td>
						</tr>
						</div>
						
						<div class="form-group">
						<tr>
							<td> New Password</td>
							<td> 
								<input class="form-control"  type="password" name="newpass" required/>
							</td>
						</tr>
						</div>

						<div class="form-group ">
						<tr>
							<td> Confirm Password</td>
							<div class="col-sm-1">
							<td> 
							  <input class="form-control"  type="password" name="confpass" required/>
							</td>
							</div>
						</tr>
						</div>
						
						<div class="form-group ">
							<tr>
								<td colspan="2" align="right"> 
									<input class="btn" type="reset" name="btnClr" value="CLEAR" />								
									<input class="btn" type="submit" name="btnChg" value="CHANGE" />
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