<?php
	session_start();
	unset($_SESSION["b_id"]);
	unset($_SESSION["b_block"]);
	unset($_SESSION["b_name"]);
	unset($_SESSION["b_location"]);
	unset($_SESSION["id"]);

	header('location:Add_block_details.php');
?>