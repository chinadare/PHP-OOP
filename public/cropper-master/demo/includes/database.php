<?php
	class db{
		
		private $con;
		
		function __construct(){
			$this -> open_con();
		}
		
		public function open_con(){ 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_sre"; 

			$this->con = new mysqli($servername,$username,$password,$dbname);
			
			if (!$this->con){
				die("Database Connection Error : ".$con->connect_error);
			}
		}
		
		public function close_con(){
			if(isset($this->con)){
				//$con -> close();
				mysqli_close($this->con);
				unset($con);
			}
		}
		
		public function query($sql){
			$con = $this->con;
			$result = $con->query($sql);
			 
			if (!$result){
				echo "Error: " . $sql . "<br />" . $con->error;
			} else {
				return $result;
			}
		}
		
		public function escape($value){
			$value = trim($value);
			//$value = htmlspecialchars($value);
			//$value = stripcslashes($value);
			$value = mysqli_real_escape_string($this->con,$value);
			return $value;	
		}
		
	}
	
	$db = new db();
	
?>