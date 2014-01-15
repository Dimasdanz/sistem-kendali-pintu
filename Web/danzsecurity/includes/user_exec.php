<?php
	include_once '/../../includes/connection.php';
	include_once 'user_function.php';
	session_start();
	
	$userid = $_POST['userid'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	
	if($_POST['add']){
		insert_user($userid, $name, $password);
		$_SESSION['message'] = "$name has been added";
		header('Location: /danzsecurity/database');
	}
	
	if($_POST['update']){
		update_user($userid, $name, $password);
		$_SESSION['message'] = "$name has been updated";
		header('Location: /danzsecurity/database');
	}
	
	if($_POST['delete']){
		delete_user($userid);
		$_SESSION['message'] = "$name has been deleted";
		header('Location: /danzsecurity/database');
	}