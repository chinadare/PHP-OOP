<?php
	require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {

if(isset($_SESSION['checkno1'])){ $new_checNo =	$_SESSION['checkno1'];  }

if(isset($_SESSION['checkno2'])){ $new_checday =	$_SESSION['checkno2']; }

if(isset($_SESSION['paymentsty'])){ $Ptype	= $_SESSION['paymentsty']; }

if(isset($_SESSION['cuspaymentFull'])){$insp	= $_SESSION['cuspaymentFull'];}

if(isset($_SESSION['checkno1id'])){$checid	= $_SESSION['checkno1id'];}

if(isset($_SESSION['apay'])){$apayment	= $_SESSION['apay'];}

$database = DB:: getinstance()->query("SELECT * FROM tbl_customer WHERE c_id='$checid'");


										
										foreach($database->results() as $database){
												$name = $database->full_name;
												$tele = $database->p_tele;
												$addre = $database->o_addr;

											}



	if(Input::exists()){
					if (Input::get('btnupdate')){
						
						if($Ptype == 'Full Cash'){
							Redirect::to('Exe_full_proress.php');
						}else if($Ptype == 'Bank Loan'){
							Redirect::to('Bank_loan_progress.php');
						}else if($Ptype == 'Six Month Plan'){
							Redirect::to('Exe_six_months_plan_progress.php');
						}else if($Ptype == '4 Years'){
							Redirect::to('Exe_4year_plan_progress.php');
							
						}
					}
				}

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
		<link rel="stylesheet" href="includes/style/css/receipt.css">



	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="brand clearfix">
		<a href="" class="logo"><img src="includes/style/img/logo.gif" class="img-responsive" alt=""></a> 
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

				
			<div class="container" id="printS">
				<div class="col-md-10">
					<div class="panel panel-default">
						<h3 id='h3' >Silvereen Real Estate Company (PVT) LTD. </h3>
					<div class="panel-heading">"Silvereen Center",No 271,Katuasthota Road,Sri Lanka  <button  class=" pull-right" onclick='printContent("printS")'><span class="glyphicon glyphicon-print"></span> Print </button></div>

							  <script>
									function printContent(el){
										var restoragepage = document.body.innerHTML;
										var printcontent = document.getElementById(el).innerHTML;
										document.body.innerHTML = printcontent;
										window.print();
										document.body.innerHTML = restoragepage;
									}
								</script>
	 					
	 				<form class="form-horizontal" method="POST" action="#" role="form">
	 				 


	 				 <div id='R0'>
									<tr>
										<td > <em style="font-size:20px;"><b>Receipt</b></em> </td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
										<td> 
											<input id='R0I' type="text" name="txtPLoca" size='10'/>
										</td>
									</tr>
							</div>
								</br>							
							<div id='R1' >
									<tr>
										<td>&nbsp;<b> Contact No </b></td> &nbsp;
										<td> 
											<input id='R1I' type="text" name="txtcon" value="&nbsp; <?php if(isset($tele)){echo $tele; }?>"size='40'/>
										</td>

										<td>&nbsp;<b> Payment Options </b></td> &nbsp;
										<td> 
											
											
											<input id='RS1' type="text" value="&nbsp; <?php if(isset($_SESSION['paymentsty'])){echo $Ptype	= $_SESSION['paymentsty']; }?>" name="txtRs" size='30'/>
																									
										
										</td>

									</tr>
							</div>

							<tr>

							</tr>

						</br>
							<div id='R2' >
									<tr>
										<td>&nbsp;<b> We acknowledge with thanks receipt Rs </b></td> &nbsp;
										<td> 
											<input id='R2I' type="text" name="txtRs" value="" size='92'/>
										</td>
									</tr>
							</div>
						</br>
							<div id='R3' >
									<tr>
										<td>&nbsp;<b> Form Mr/Mrs/Miss/Ms </b></td> &nbsp;
										<td> 
											<input id='R3I' type="text" name="txtSex" value="&nbsp; <?php if(isset($name)){echo $name; }?>" size='108'/>
										</td>
									</tr>
							</div>
						</br>
							<div id='R4' >
									<tr>
										<td>&nbsp;<b> of </b></td> &nbsp;
										<td> 
											<input id='R4I' type="text" value="&nbsp; <?php if(isset($addre)){echo $addre; }?>"  name="txtRe" size='128'/>
										</td>
									</tr>
							</div>
						</br>
							<div id='R5' >
									<tr>
										<td><b>&nbsp; by Cash/Cheque No </b></td> &nbsp;
										<td> 
											<input id='R5I' type="text" value="&nbsp; <?php if(isset($_SESSION['checkno1'])){ echo $new_checNo = $_SESSION['checkno1'];  }?>" name="txtCno" size='45'/>
										</td>
										<td>&nbsp;<b> Drawn on </b></td> &nbsp;
										<td> 
											<input id='R5I' type="text" value="&nbsp; <?php if(isset($_SESSION['checkno2'])){ echo $new_checday = $_SESSION['checkno2']; } ?>" name="txtON" size='51'/>
										</td>

									</tr>
							</div>
							</br>
							<div id='R6' >
									<tr>
										<td>&nbsp;<b> being </b></td> &nbsp;
										<td> 
											<input id='R6I' type="text" name="txtbein" size='124'/>
										</td>
									</tr>
							</div>	
							</br>
							<div id='R7' >
									<tr>
										<td>&nbsp;<b> Rs </b></td> &nbsp;
										<td> 
											<input id='R7I' type="text" value="&nbsp; <?php if(isset($apayment)){echo $apayment; }?>" name="txtamount" size='20'/>
										</td>
									</tr>
							</div>	
						</br>
								
					
					</form>
					
									
					</div>
		

						
					</div>
				</div>
				<div class="container">
					<?php
				

					?>

						<form name='frmLogin' method='POST' action=''>
										
									
								
								<div align="center"> <input class="btn btn-info" type="submit" name="btnupdate" value="GO Back" />  </div>								
						</form>				

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