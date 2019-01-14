<?php
	require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {

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
				

				

				<li><a href="cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

				

				<li><a href="check.php"><i class="fa fa-dashboard"></i> Check Recipt</a></li>						
							
								

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
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Check <a/> </p>
		<?php
		if(Input::exists()){
	if(isset($_POST['btnAdd'])){

		$validate = new Validate();
  		$validation = $validate->check($_POST, array(
       /*
        'txtCno' => array(
          'required' => true
      ),
        'txtRs' => array(
          'required' => true,
          
      ),
        'cmbMr' => array(
          'required' => true,
          
      ),
        'txtof' => array(
          'required' => true,
          
      ),
        'txtcash' => array(
          'required' => true,
         
      ),
        'txtdrawn' => array(
          'required' => true,
        
      ),
        'txting' => array(
          'required' => true,
          
      ),
        'txtRSS' => array(
          'required' => true,
        
      ),
*/
    ));

  	 if($validation->passed()){
        	
        	
        	   try {
       		 $user->create('receipt',array(

          	"Day" =>date("Y-m-d H:i:s"),
          	"ConNo" => Input::get('txtCno'),
          	"Rs_word" => Input::get('txtRs'),
            "Sex" => Input::get('cmbMr'),
            "Of" => Input::get('txtof'),
            "Cash_Cheque_No" => Input::get('txtcash'),
            "Drawn" => Input::get('txtdrawn'),
             "being" => Input::get('txting'),
             "Rs" => Input::get('txtRSS')
			
           


            ));

       		  $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Check",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtCno').','.Input::get('txtRs').','.Input::get('cmbMr').','.Input::get('txtcash').','.Input::get('txting').','.Input::get('txtRSS')
							            
							   


							            ));
			        		        

       		  	} catch (Exception $e) {
		          die($e-> getMessage());
		        }

		 
		        
 }else{
    foreach($validation->error() as $error){
         // echo $error ,"</br>";
    	echo $error ," &nbsp &nbsp &nbsp ";

        }
  	  }


	}
}?>
						<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">Receipt</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
									
									

									
									

									<thead>

								 	<div id="getCust">
										
										</div>
								 		<tr>
											<td> Project Name </td>
											<td> 
												<select class="form-control" name="cmbProjR" onChange="getRici('getRici.php?cmbProjR='+this.value)">
													<option value="select" selected="selected"> - Select Project - </option>
												<?php													
													$database = DB:: getinstance()->query("SELECT * FROM tbl_project");
													if(!$database->count()){
															die ("no user");
													}else{
															
														foreach($database->results() as $database){
															echo "<option value='".$database->id."'>".$database->pj_name."</option>";
														}
													}					
												?>
												</select>
											</td>
										</tr>
										<script type="text/javascript" src="includes/javascript/getRici.js"></script>

										
								 	
									</thead>

									<tr>
										<td> Customer Name</td>
										<td> 
												<div id="getCust1">
												<select class="form-control" name="cmbCust1" )>
													<option value="select"> - Select Block - </option>
											
												</select>
												</div>
												
										</td>
									</tr>
									

								
								
									<tr>
										<td> Payment Type </td>
										<td>
										<select class="form-control" name="cmbexample"  onChange="getCashor('getCashor.php?cmbexample='+this.value)">
											    <option value="select" selected="selected"> - Select Project - </option>
											    <option value="A">Cash</option>
											    <option value="B">Cheque No</option>
											    
											</select>
										</td>
									</tr>
									<script type="text/javascript" src="includes/javascript/Ajs.js"></script>
									
									<tr>
										<td> Amount & No</td>
										<td> 
												<div id="getAjs">
												
													<input class='form-control' type='text' name='txtAm' value= ''  />

												</div>
												
										</td>
									</tr>

									

									<div class="form-group">
									<tr>
										<td>  Drawn on </td>

									 	<td>
											<input class="form-control" name="txtdrawn" value="" type="text" value='<?php echo escape(Input::get('txtdrawn')); ?>' >
									 
										</td>
									</tr>
									</div>	

									

									<div class="form-group">
									<tr>
										<td>  Rs </td>

									 	<td>
											<input class="form-control" name="txtRSS" value="" type="text" value='<?php echo escape(Input::get('txtRSS')); ?>' >
									 
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

?>	