<?php
include_once '/../../includes/connection.php';

session_start();

if (isset ($_POST ['select_one'])) {
	$query = "select * from plants where id='$_POST[select_one]'";
	$result = mysql_query ( $query );
	$data = mysql_fetch_row ( $result );
	if($data[2] == "dry"){
		$lower = 100;
		$upper = 300;
	}
	if($data[2] == "humid"){
		$lower = 301;
		$upper = 500;
	}
	if($data[2] == "water"){
		$lower = 501;
		$upper = 700;
	}
	file_put_contents('../device/active_one.txt', $data[1]);
	file_put_contents('../device/upper_one.txt', '<'.$upper.'>');
	file_put_contents('../device/lower_one.txt', '<'.$lower.'>');
	$_SESSION['message'] = "$data[1] selected as paramter on pot one";
	header('Location: /kelembaban/');
}

if (isset ($_POST ['select_two'])) {
	$query = "select * from plants where id='$_POST[select_two]'";
	$result = mysql_query ( $query );
	$data = mysql_fetch_row ( $result );
	if($data[2] == "dry"){
		$lower = 100;
		$upper = 300;
	}
	if($data[2] == "humid"){
		$lower = 301;
		$upper = 500;
	}
	if($data[2] == "water"){
		$lower = 501;
		$upper = 700;
	}
	file_put_contents('../device/active_two.txt', $data[1]);
	file_put_contents('../device/upper_two.txt', '<'.$upper.'>');
	file_put_contents('../device/lower_two.txt', '<'.$lower.'>');
	$_SESSION['message'] = "$data[1] selected as paramter on pot two";
	header('Location: /kelembaban/');
}