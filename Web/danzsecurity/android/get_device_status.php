<?php
	include_once '/../includes/hw_function.php';
	
	$response['device_status'] = array();
	
	if(get_status() == '1'){
		$status = 'Armed';
	}else{
		$status = 'Disarmed';
	}
	
	if(get_condition() == '1'){
		$condition = 'Unlocked';
	}else{
		$condition = 'Locked';
	}
	
	$device_status = array();
	$device_status['status'] = $status;
	$device_status['condition'] = $condition;
	$device_status['password_attempts'] = get_attempts();
	
	array_push($response['device_status'], $device_status);
	
	$response['success'] = 1;
	
	echo json_encode($response);