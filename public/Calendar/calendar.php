<html>

<head>
	
	<!-- Calendar control -->
	<link rel="stylesheet" href="CAL/css/datepicker.css">
    <link rel="stylesheet" href="CAL/css/bootstrap.css">
	
	
</head>

<body>
	

	<?php
		if(Input::exists()){

			if (Input::get('btnAdd')){	
				$payDate = Input::get('txtPayDate');
				echo $payDate;
	
			}  

		}
	?> 	    		
	
	<form name="frmAddProp" method="POST" action="#">


				<input  type="text" class="form-control" placeholder="DD-MM-YYYY"  id="payDate" name="txtPayDate" required>
					
				<script type="text/javascript">
					$(document).ready(function () {
						$('#payDate').datepicker({
							format: "dd/mm/yyyy"
						});  
					});
				</script>										
							
				<input class="btn btn-info" type="submit" name="btnAdd" value="ADD" />
				<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
			
	</form>
	
	
	<!-- Calendar Control -->
	<script src="CAL/js/jquery-3.1.1.min.js"></script>
    <script src="CAL/js/bootstrap-datepicker.js"></script>


</body>

</html>


