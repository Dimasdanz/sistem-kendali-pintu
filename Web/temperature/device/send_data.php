<?php 
	include_once '/../../includes/connection.php';
	
	$celcius = $_POST['tempc'];
	$humidity = $_POST['humidity'];
	$query = "insert into temperature_log(celcius, humidity, time) values('$celcius', '$humidity', now())";
	mysql_query($query);
?>