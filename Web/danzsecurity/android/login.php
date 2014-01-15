<?php
	include_once '/../../includes/admin_function.php';

	$response = array();
	
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$data = get_single_admin($username);
		if(!empty($data)){
			if($data->password == md5($password)){
				$response["success"] = 1;
				echo json_encode($response);
			}else{
				$response["success"] = 0;
				echo json_encode($response);
			}
		}else{
			$response["success"] = 0;
			echo json_encode($response);
		}
	}