<?php
	include_once '/../includes/log_function.php';
	
	$response = array();
	
	$data = get_all_log();
	
	if(!empty($data)){
		$response['syslog'] = array();
		
		foreach($data as $row){
			$log = array();
			$log['logid'] = $row->logid;
			$log['name'] = $row->name;
			$log['time'] = $row->time;
			
			array_push($response['syslog'], $log);
		}
		
		$response['success'] = 1;
		echo json_encode($response);
	}else{
		$response['success'] = 0;
		$response["message"] = "No Log Found";
		echo json_encode($response);
	}