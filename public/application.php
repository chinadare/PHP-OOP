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
	<script src="includes/javascript/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	
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
					}
				}
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

			

				<li><a href="addProperty.php"><i class="fa fa-dashboard"></i> Add New Project</a></li>

				

				<li><a href="Add_block_details.php"><i class="fa fa-dashboard"></i> Add Block Price</a></li>

				<li><a href="Exe_create_discount.php"><i class="fa fa-dashboard"></i> Add Discount</a></li>

				<li class="open"><a href="application.php"><i class="fa fa-dashboard"></i> Add Customer</a></li>

				<li><a href="Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

			

				<li><a href="Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

				<li><a href="Conti_payment.php"><i class="fa fa-dashboard"></i> Customer Payment</a></li>

				

			
				<li><a href="Exe_resell.php"><i class="fa fa-dashboard"></i> Land Resell</a></li>	
				

				

				<li><a href="cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

				

							
				
				
				
				

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
<?php
	if(Input::exists()){
		if (Input::get('btnSend')){	
			try {
			$blck = implode(",",$_POST['cmbBlock']);
		
			$cid = DB::getinstance()->query('SELECT MAX(c_id) AS lastcid FROM tbl_customer');
			if(!$cid->count()){
				$ncid = 1;
			}else{						
				foreach($cid->results() as $id){
					$ncid = $id->lastcid;
					$ncid++;
				}
			}

				if(isset($_FILES['file']['name'])){

								
								$imgname=$_FILES["file"]["name"];
								$temp_name=$_FILES["file"]["tmp_name"];
								
								$nname = md5(time());
								$tmp = explode(".", $imgname);
								$extension=end($tmp);
								
								$nnimgname = $nname.".".$extension;
								$target_path = "uploads/".$nnimgname;
								
								move_uploaded_file($temp_name, $target_path); 

							}

				if(isset($_FILES['file1']['name'])){	
							$imgname=$_FILES["file1"]["name"];
								$temp_name=$_FILES["file1"]["tmp_name"];
								
								$nname = rand(0, 3000);
								$tmp = explode(".", $imgname);
								$extension=end($tmp);
								
								$nnimgname = $nname.".".$extension;
								$target_path1 = "uploads/".$nnimgname;
								
								move_uploaded_file($temp_name, $target_path1); 

							}	
			
	
			$user->create('tbl_customer',array(
				"c_id" => $ncid,
       		 		"full_name" => Input::get('txtFn'),
		            "name" => Input::get('txtUsuN'),
		            "nic" => Input::get('txtNIC'),
		            "p_addr" => Input::get('txtPAdd'),
		            "p_tele" => Input::get('txtPTel'),
		            "job" => Input::get('txtJob'),
		            "employer" => Input::get('txtJobEmp'),
		            "o_addr" => Input::get('txtOAdd'),
		            "o_tele" => Input::get('txtOTel'),
		            "recidence_mode" => Input::get('rbtMdRec'),
		            "citizenship" => Input::get('rbtCitiz'),
		            "age" => Input::get('txtAge'),
					"credit_ref" => Input::get('txtCreR'),
					"Mnthly_incme" => Input::get('txtMonInc'),
					"income" => Input::get('txtHWInc'),
					"income_tax" => Input::get('cmbCredit'),
					"type" => Input::get('rbtTitle'),
					"dependents" => Input::get('txtNoDepe'),
		   			"j_Date" => date("Y-m-d H:i:s"),
		   			"road_image" => $target_path,
		   			"image2" => $target_path1
		   				
			));

			$user->create('tbl_customer_spouse',array(

       		 		"s_name" => Input::get('txtHWName'),
		            "s_job" => Input::get('txtHWJob'),
		            "s_o_addr" => Input::get('txtHWOAdd'),
		            "s_tele" => Input::get('txtHWTel'),
		            "s_income" => Input::get('txtHWInc'),
		          


		            ));

			 $user->create('tbl_customer_purchase',array(

       		 		"pr_name" => Input::get('cmbProject'),
		         	"id" => $ncid,
		            "j_Date" => date("Y-m-d H:i:s"),
		            "payment_type" => Input::get('cmbPayType'),
		            "c_name" => Input::get('txtFn'),
		            "Block_No" => $blck,
		            

		           

		            ));
			
			  $project =  Input::get('cmbProject');

			 



			 $blc = explode(',', $blck);

			 foreach ($blc as $block) { 
			 	 $block; 

			 	$database = DB:: getinstance()->query("UPDATE tbl_property SET status='2' WHERE block_no='$block' AND project_id= '$project' ");


			 }

						echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';


			 echo'	<meta http-equiv="refresh" content="2">';
			
			
			}catch (Exception $e) {
		        die($e-> getMessage());
		    }
		}  
	}
	
	
?>
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Add Customer <a/> </p>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">APPLICATION TO PURCHASE LAND ON INSTALMENTS</div>
						<div class="panel-body">
									
									<form method="POST" action="#" name="frmAddCust" enctype='multipart/form-data'>
									<table  class="table table-bordered table-striped">
										<tr>
											<td> Title </td>
											<td> 
												<input type="radio" name="rbtTitle" value="Mr" checked /> Mr.
												<input type="radio" name="rbtTitle" value="Mrs" /> Mrs.
												<input type="radio" name="rbtTitle" value="Miss" /> Miss.
												<input type="radio" name="rbtTitle" value="Rev" /> Rev.
											</td>
										</tr>

									

										<tr>
											<td> Full Name </td>
											<td> 
												<input class="form-control" type="text" name="txtFn" value='<?php echo escape(Input::get('txtFn')); ?>' pattern="^[A-Z a-z ]{1,500}$" required />
											</td>
										</tr>
										
										<tr>
											<td> Usual Name </td>
											<td>
												<input class="form-control" type="text" name="txtUsuN" value='<?php echo escape(Input::get('txtUsuN')); ?>' pattern="^[A-Z a-z ]{1,500}$" required/>
											</td>
										</tr>
										
										<tr>
											<td> National Identity Card No. / Passport No. </td>
											<td> 
												<input class="form-control" type="text" name="txtNIC" value='<?php echo escape(Input::get('txtNIC')); ?>' pattern="^[A-Za-z0-9]{10,12}$" required />
											</td>
										</tr>
										
										<tr>
											<td> Private Address </td>
											<td> 
												<textarea class="form-control" name="txtPAdd" type="text" pattern="^[a-z0-9\_\.]+\.[a-z]{2,4}$" value='<?php echo escape(Input::get('txtPAdd')); ?>' required></textarea>
											</td>
										</tr>
										
										<tr>
											<td> Telephone No. </td>
											<td> 
												<input class="form-control" type="tel" name="txtPTel" pattern="^[0-9 ]{10}$"   value='<?php echo escape(Input::get('txtPTel')); ?>'required />
											</td>
										</tr>
										
										<tr>
										<tr>
											<td> Profession / Trade / Occupation Name </td>
											<td> 
												<input class="form-control" type="text" name="txtJob" pattern="^[A-Z a-z 0-9 ]{1,}$" value='<?php echo escape(Input::get('txtJob1')); ?>' required/>
											</td>
										</tr>
										
										<tr>
											<td> Name of the Employer / Business </td>
											<td> 
												<input class="form-control" type="text" name="txtJobEmp" pattern="^[A-Z a-z 0-9 ]{1,}$" value='<?php echo escape(Input::get('txtJob')); ?>' />
											</td>
										</tr>
										<tr>
											<td> Official / Business Address </td>
											<td> 
												<textarea class="form-control" name="txtOAdd" value='<?php echo escape(Input::get('txtOAdd')); ?>' ></textarea>
											</td>
										</tr>
										
										<tr>
											<td> Official Telephone No. </td>
											<td> 
												<input class="form-control" type="tel" name="txtOTel" pattern="^[0-9 ]{10}$" value='<?php echo escape(Input::get('txtOTel')); ?>' />
											</td>
										</tr>	
										
										<tr>
											<td> Mode of residence at Private Address </td>
											<td> 
												<input type="radio" name="rbtMdRec" value="Owner" checked /> Owner
												<input type="radio" name="rbtMdRec" value="Tenant" /> Tenant
												<input type="radio" name="rbtMdRec" value="Boader" /> Boader
											</td>
										</tr>
										
										<tr>
											<td> Citizen of Sri Lanka </td>
											<td> 
												<input type="radio" name="rbtCitiz" value="Descent" checked /> By Descent
												<input type="radio" name="rbtCitiz" value="Registration" /> By Registration
											</td>
										</tr>
										
										<tr >
											<td> Age </td>
											<td> 
												<input class="form-control" type="number"  name="txtAge" value='<?php echo escape(Input::get('txtAge')); ?>' />
											</td>
										</tr>
										
										<tr>
											<td> Monthly Income (Salary & Other) </td>
											<td> 
												<input class="form-control" type="number" name="txtMonInc" value='<?php echo escape(Input::get('txtMonInc')); ?>' />
											</td>
										</tr>
										
										<tr>
											<td> Income Tax for the past two years </td>
											<td> 
												<input class="form-control" type="number" name="txtIncTax" value='<?php echo escape(Input::get('txtIncTax')); ?>' />
											</td>
										</tr>
										
										<tr >
											<td> Marital Status </td>
											<td> 
												<select  class="form-control" name="cmbMS" id='purpose' id="toggle" onChange="toggle_it('tr1');toggle_it('tr2')" requied>
													<option value="0" select="select"> Bachelor </option>
													<option value="1"> Maried </option>										
												</select>
											</td>
										</tr>
											<script>
									  function toggle_it(itemID){ 
									      // Toggle visibility between none and '' 
									      if ((document.getElementById(itemID).style.display == 'none')) { 
									            document.getElementById(itemID).style.display = '' 
									            event.preventDefault()
									      } else { 
									            document.getElementById(itemID).style.display = 'none'; 
									            event.preventDefault()
									      }    
									  } 

									</script>
										
										<tr id="tr1" style="display:none">
											<td colspan="2"  >
											<fieldset >
												<legend> Details of Husband / Wife </legend>
												<table >
													<tr>
														<td> Name of the Husband / Wife </td>
														<td> 
															<input class="form-control" type="text" pattern="^[A-Z a-z  ]{1,}$" name="txtHWName" value='<?php echo escape(Input::get('txtHWName')); ?>' />
														</td>
													</tr>
													<tr>
														<td> Name of the Employer / Business </td>
														<td> 
															<input class="form-control" type="text" pattern="^[A-Z a-z  ]{1,}$" name="txtHWJob" value='<?php echo escape(Input::get('txtHWJob')); ?>' />
														</td>
													</tr>
													<tr>
														<td> Official / Business Address </td>
														<td> 
															<textarea class="form-control" name="txtHWOAdd"></textarea>
														</td>
													</tr>
													<tr>
														<td> Telephone No. </td>
														<td> 
															<input class="form-control" type="text" pattern="^[0-9  ]{10}$" name="txtHWTel" value='<?php echo escape(Input::get('txtHWTel')); ?>' />
														</td>
													</tr>
													<tr>
														<td> Monthly Income </td>
														<td> 
															<input class="form-control" type="number" name="txtHWInc" value='<?php echo escape(Input::get('txtHWInc')); ?>' />
														</td>
													</tr>
												</table>
											</fieldset>
											</td>
										</tr>
										
										<tr>
											<td> No. of Dependents </td>
											<td> 
												<input class="form-control" type="text" name="txtNoDepe" value='<?php echo escape(Input::get('txtNoDepe')); ?>' />
											</td>
										</tr>
										
										<tr>
											<td> Have You Obtain Any Credit Facility? </td>
											<td> 
												<Select class="form-control"  name="cmbCredit" id="toggle" onChange="toggle_it('tr3');toggle_it('tr2')">
													<option value="0"> No </option>
													<option value="1"> Yes </option>
												</select>
											</td>
										</tr>

											<script>
									  function toggle_it(itemID){ 
									      // Toggle visibility between none and '' 
									      if ((document.getElementById(itemID).style.display == 'none')) { 
									            document.getElementById(itemID).style.display = '' 
									            event.preventDefault()
									      } else { 
									            document.getElementById(itemID).style.display = 'none'; 
									            event.preventDefault()
									      }    
									  } 

									</script>
										
										<tr id="tr3" style="display:none">
										<td colspan="2"  >
										<fieldset >
										<legend> Credit Details </legend>
												<table>
										<tr>

											<td> Credit Reference </td>
											<td> 
												<input class="form-control" type="text" name="txtCreR" value='<?php echo escape(Input::get('txtCreR')); ?>' />
											</td>
										</tr>
										
										<tr>
											<td> Credit Details </td>
											<td> 
												<textarea class="form-control" name="txtCreD" value='<?php echo escape(Input::get('txtCredit')); ?>' ></textarea>
											</td>
										</tr>
										</table>
									    </fieldset>
										</td>
										</tr>
																				
										<tr>
											<td> Name of the Property </td>
											<td> 
												
											</td>
										</tr>
										
										<tr>
											<td> Project Name </td>
											<td> 
												<select class="form-control" name="cmbProject" onChange="getBlock('getBlock.php?cmbProject='+this.value)" requied>
													<option value=""> Select Project </option>
												<?php													
													$database = DB:: getinstance()->query("SELECT * FROM tbl_project");
													if(!$database->count()){
															die ("No Projects Available");
													}else{
															
														foreach($database->results() as $database){
															echo "<option value='".$database->id."'>".$database->pj_name."</option>";
														}
													}					
												?>
												</select>
											</td>
										</tr>
										
										<script type="text/javascript" src="includes/javascript/projBlock.js"></script>
										
										<tr>
											<td> Reserved Block No </td>
											<td> 
											
											<div id="blockdiv">
												<select id="blk" name="cmbBlock[]" class="form-control">
													<option> - Select Block - </option>
												</select>
											</div>
											
											<div id="nblockdiv"> </div>
											<div align="right">
												<button type="button" id="btnDelBlk"  ><span class="glyphicon glyphicon-minus"> </span>  </button>
		
												<button type="button" id="btnAddBlk"   ><span class="glyphicon glyphicon-plus"> </span>  </button>
											</div>
											
											<script>
												
												$("#btnAddBlk").click(function(){
													$("#blk").clone().appendTo("#nblockdiv");
													
												});
												
												$("#btnDelBlk").click(function(){
													$('#nblockdiv').children('#blk').last().remove();
												});
												
											</script>
											</td>
										</tr>
												
										
											<tr>
										<td> Front Page  </td>

									 	<td>
											<input class="form-control" name="file" value="" type="file" >
									 
										</td>
										</tr>

										<tr>
										<td> Back Page  </td>

									 	<td>
											<input class="form-control" name="file1" value="" type="file" >
									 
										</td>
										</tr>

								

			
										<tr>
											<td colspan="2"> 
												<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
												<input class="btn btn-info"  type="submit" name="btnSend" value="ADD" />											
											</td>
										</tr>
									</table>
									</form>
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
?>
