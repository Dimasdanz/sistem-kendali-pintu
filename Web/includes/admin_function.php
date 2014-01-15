<?php
	include_once 'connection.php';

	function get_single_admin($username){
		$query = "select * from admin where username='$username'";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0){
			return mysql_fetch_object($result);
		}else{
			return null;
		}
	}