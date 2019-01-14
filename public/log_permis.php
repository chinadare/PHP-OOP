<?php
require_once("core/init.php");
$user = new User();
 
 $id = Input::get('txtid');

	if(isset($_POST['btnupdate'])){
						 $id = Input::get('txtid');
						$gp = Input::get('cmbnnnn');
																						
						 try{

																					  		

						$user->update('users',array(

							'groupssss' => $gp, 
																					  		  
																					  
						),$id);

								Redirect::to('Admin_en_des.php');															
						}catch(Exception $e){
						die($e->getMessage());
							}

																				
																					

																			
				}elseif(isset($_POST['btnupdate2'])){
						$id = Input::get('txtid');
						$gp = Input::get('cmbnnnn');
																						
						 try{

																					  		

						$user->update('users',array(

							'groupssss' => $gp, 
																					  		  
																					  
						),$id);

							Redirect::to('Admin_en_des.php');																
						}catch(Exception $e){
						die($e->getMessage());
							}
					}