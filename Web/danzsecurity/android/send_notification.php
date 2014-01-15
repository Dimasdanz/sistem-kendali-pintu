<?php
	include_once '/../../includes/conf.php';
	include_once '/../includes/android_function.php';

	function send_notification($registration_ids, $message) {
		$url = 'https://android.googleapis.com/gcm/send';
	
		$fields = array(
				'registration_ids' => $registration_ids,
				'data' => $message,
		);
	
		$headers = array(
				'Authorization: key=' . GOOGLE_API_KEY,
				'Content-Type: application/json'
		);

		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, $url);
	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
	
		curl_close($ch);
		echo $result;
	}
	
	function send_message($message){
		if($message != 'Device Armed' && $message != 'Device Disarmed' && $message != 'Device Unlocked' && $message != 'Device Locked'){
			$message .= ' just opened the door';
		}
		
		$devices = get_all_device();
		
		foreach ($devices as $row){
			$reg_id = $row->gcm_regid;
			$registration_ids = array($reg_id);
			$msg = array('notif'=>$message);
			$result = send_notification($registration_ids, $msg);
			echo $result;
		}
	}