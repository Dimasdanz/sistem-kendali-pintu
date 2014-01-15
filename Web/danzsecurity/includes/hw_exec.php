<?php
	include_once 'hw_function.php';
	session_start();
	if(get_condition() == '1'){
		if(isset($_POST['status']) && !isset($_POST['apply'])){
			if(get_status() == '1'){
				set_status('<0>');
				$_SESSION['message'] = "Device has been turned off";
				header('Location: /danzsecurity/setting');
			}else if(get_status() == '0'){
				set_status('<1>');
				$_SESSION['message'] = "Device has been turned on";
				header('Location: /danzsecurity/setting');
			}
		}
		
		if(isset($_POST['apply'])){
			set_attempts("<$_POST[password_attempts]>");
			$_SESSION['message'] = "Password Attempts has been changed";
			header('Location: /danzsecurity/setting');
		}
	}else if(!isset($_POST['condition'])){
		$_SESSION['error'] = "Setting cannot be changed while device is locked";
		header('Location: /danzsecurity/setting');
	}
	if(isset($_POST['condition'])){
		set_condition('<1>');
		$_SESSION['message'] = "Device has been unlocked";
		header('Location: /danzsecurity/setting');
	}