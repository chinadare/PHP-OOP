<?php
require_once("core/init.php");
	$user = new User();
$user->logout();
session_destroy();
unset($_SESSION["FBSpayment"]);
	unset($_SESSION["FBSdepo"]);
	unset($_SESSION["cmbPROJECT2"]);
	unset($_SESSION["cmbCUSTOMER2"]);
Redirect::to('index.php');