<?php
session_start();
if(isset($_POST['apply'])){
	file_put_contents('../device/lux_setting.txt', '<'.$_POST['lux_setting'].'>');
	$_SESSION['message'] = "Lux setting has been applied";
	header('Location: /fotosintesis/setting');
}