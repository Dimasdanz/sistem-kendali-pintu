<?php
	include_once '/../includes/user_function.php';
	include_once '/../includes/hw_function.php';
	
	$string = $_POST['password'];
	
	$userid = substr($string, 0, 3);
	$password = substr($string, 3);
	$result = get_single_user($userid);
	if(!empty($result)){
		if($result->password == $password){
			$data = '<1>';
			set_result($data);
			insert_log($result->name);
		}else{
			$data = '<0>';
			set_result($data);
		}
	}else{
		$data = '<0>';
		set_result($data);
	}