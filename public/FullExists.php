<?php
	session_start();
	unset($_SESSION['FBSFname']);
	unset($_SESSION['FBSFproject']);
	unset($_SESSION['FBSFblocks']);
	

	header('location:Exe_home.php');
?>