<?php
require_once("core/init.php");
$user = new User();

$database = DB:: getinstance()->query('SELECT * FROM tbl_customer  JOIN tbl_customer_purchase ON tbl_customer.c_id=tbl_customer_purchase.Customer_table_id  ');

										if(!$database->count()){
											echo "no userss";
										}
										foreach($database->results() as $database){
														echo $database->name; 
														echo "</br>";
														echo $database->full_name;
														echo "</br>";
														echo $database->c_name;

													}





