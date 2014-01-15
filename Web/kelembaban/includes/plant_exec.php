<?php
session_start();
include_once '/../../includes/connection.php';
if(isset($_POST['add'])){
	$query = "insert into plants(name,humidity) values('$_POST[name]','$_POST[humidity]')";
	mysql_query($query);
	$_SESSION['message'] = "$_POST[name] has been added";
	header('Location: /kelembaban/plants/');
}

if(isset($_POST['update'])){
	$query = "update plants set name='$_POST[name]', humidity='$_POST[humidity]' where id=$_POST[id]";
	mysql_query($query);
	$_SESSION['message'] = "$_POST[name] has been updated";
	header('Location: /kelembaban/plants/');
}

if(isset($_POST['delete'])){
	$query = "delete from plants where id=$_POST[id]";
	mysql_query($query);
	$_SESSION['message'] = "$_POST[name] has been deleted";
	header('Location: /kelembaban/plants/');
}