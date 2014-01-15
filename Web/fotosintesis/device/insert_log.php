<?php
include_once '/../../includes/connection.php';
$lux = $_POST['lux'];
$query = "insert into fotosintesis_log(lux,time) values ('$lux', now())";
mysql_query($query);
mysql_close();
?>