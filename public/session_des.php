<?php
	session_start();
	session_destroy();
	header('location:Add_block_details.php');
?>