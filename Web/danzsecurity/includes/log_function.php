<?php
	include_once '/../../includes/connection.php';
	include_once '/../android/send_notification.php';

	function get_all_log(){
		$query = "select * from security_log order by time desc";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0){
			while(true == $data = mysql_fetch_object($result)){
				$row[] = $data;
			}
			return $row;
		}else{
			return null;
		}
	}
	
	function get_today_log(){
		$query = "select * from security_log where date(time) = curdate() order by time desc";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0){
			while(true == $data = mysql_fetch_object($result)){
				$row[] = $data;
			}
			return $row;
		}else{
			return null;
		}
	}
	
	function insert_log($name){
		$query = "insert into security_log(name) values('$name')";
		mysql_query($query);
		send_message($name);
	}