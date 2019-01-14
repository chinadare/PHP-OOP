<?php
class User{
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_suppored_formats= ['image/jpg','image/jpeg','image/png','image/png'],
			$_isLoggedIn;

	public function  __construct($user = null){
		$this->_db = DB:: getinstance();

		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');


		if(!$user){
			if(Session::exists($this->_sessionName)){
				$user = Session::get($this->_sessionName);
				
				if($this->find($user)){
					$this->_isLoggedIn = true;
				}else{
					//****
				}
			}
		}else{
			$this->find($user);
		}

	}

	public function uploadfile($file,$table,$row){
		if(is_array($file)){


			if(in_array($file['type'],$this->_suppored_formats)){
				$nm = $file['name'];
				$tem = $file['tmp_name'];
				$newname = rand(0, 3000);
				$tmp = explode(".",$nm);
				$extention = end($tmp);
				$newimage = $newname.".".$extention;
				$tarpath = 'uploads/'.$newimage;
				if(move_uploaded_file($tem,$tarpath)) {
					
					$user = $this->create($table,  array(

						$row => $tarpath

						));

				echo "ok";
			}
			}else{
				die('file format not supported!');
			}
		}else{
			die('No file was uploaded!');
		}
	}

	public function updatefile($file,$table,$row,$id){
		if(is_array($file)){


			if(in_array($file['type'],$this->_suppored_formats)){
				$nm = $file['name'];
				$tem = $file['tmp_name'];
				$newname = rand(0, 3000);
				$tmp = explode(".",$nm);
				$extention = end($tmp);
				$newimage = $newname.".".$extention;
				$tarpath = 'uploads/'.$newimage;
				if(move_uploaded_file($tem,$tarpath)) {
					
						$user->update($table,array(

							$row => $tarpath
											  			
											  
								),$id);
					
				echo "ok";
			}
			}else{
				die('file format not supported!');
			}
		}else{
			die('No file was uploaded!');
		}
	}

		public function update($table,$fields=array(), $id=null ){
		

		if(!$id && $this->isLoggedIn()){
			$id = $this->data()->id;
		}

		elseif(!$this->_db->update($table,$id,$fields)){
			throw new Exception("Update Id error");
		}	
		
	}

	

	public function delete($table, $where){
			if(!$this->_db->delete($table,$where)){
			throw new Exception("holy shit");
		}	
	}



	public function create($table, $fields = array()){

		if(!$this->_db->insert($table,$fields)){
			throw new Exception("Insert probloem");
		}
	}	
	public function find($user = null){
		if($user){
			$field = (is_numeric($user)) ? "id" : "username";
			$data = $this->_db->get("users",array($field,'=',$user)); 
 
			if($data->count()){
				
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function login($username=null,$password=null,$remember = false){
		
		if(!$username && !$password && $this->exists()){
			Session::put($this->_sessionName, $this->data()->id);
		}else{

		$user = $this->find($username);

		if($user){
			if($this->data()->password === Hash::make($password, $this->data()->Salt)){
				Session::put($this->_sessionName,$this->data()->id);

				if($remember){
					$hash = Hash::unique();
					$hashCheck = $this->_db->get('user_sessions', array('user_id','=',$this->data()->id));

					if(!$hashCheck->count()){
						$this->_db->insert('user_sessions',array(

							'user_id' => $this->data()->id,
							'hash'    => $hash


							));
					}else{
						$hash = $hashCheck->first()->hash;
					}

					Cookie::put($this->_cookieName,$hash,Config::get('remember/cookie_expiry'));

				}

				return true;
				}
			}
		}
		return false;
	}
	
	public function status(){
		$status = $this->data()->status;
		if($status==1){
			return true;
		}else{
			return false;
		}
	}

	public function hasPermission($key){
		$group = $this->_db->get('groups',  array('id', '=' ,$this->data()->empGroup ));
		//print_r($group->first());
		if($group->count()){
			$permissions = json_decode($group->first()->permissions,true);

			if($permissions[$key] == true){
				return true;
			}

		}

		//Redirect::to("index.php");
		return false;

			}

	public function exists(){
		return (!empty($this->_data)) ? true : false;
	}

	public function logout(){
		$this->_db->delete('user_sessions',  array('user_id' ,'=' , $this->data()->id));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
		


	}

	public function data(){
		return $this->_data;
	}

	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}
}