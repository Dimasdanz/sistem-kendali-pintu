<?php
	require_once '/../../includes/conf.php';
	include_once 'log_function.php';
	
	function set_attempts($data){
		$file = device_put_content.'attempts.txt';
		file_put_contents($file, $data);
	}
	
	function set_condition($data){
		$file = device_put_content.'condition.txt';
		file_put_contents($file, $data);
		if($data == '<0>'){
			insert_log('Device Locked');
		}else{
			insert_log('Device Unlocked');
		}
	}
	
	function set_status($data){
		$file = device_put_content.'status.txt';
		file_put_contents($file, $data);
		if($data == '<0>'){
			insert_log('Device Disarmed');
		}else{
			insert_log('Device Armed');
		}
	}
	
	function set_result($data){
		$file = device_put_content.'result.txt';
		file_put_contents($file, $data);
	}
	
	function get_attempts(){
		$file = device_directory.'attempts.txt';
		$attempts = file_get_contents($file);
		return trim($attempts, '<>');
	}
	
	function get_condition(){
		$file = device_directory.'condition.txt';
		$attempts = file_get_contents($file);
		return trim($attempts, '<>');
	}
	
	function get_status(){
		$file = device_directory.'status.txt';
		$attempts = file_get_contents($file);
		return trim($attempts, '<>');
	}