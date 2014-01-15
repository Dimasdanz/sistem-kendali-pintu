<?php
	include_once '/../../includes/connection.php';

	function get_all_device(){
		$query = "select * from android_devices";
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
	
	function insert_device($gcm_regid){
		$query = "insert into android_devices(gcm_regid) values('$gcm_regid')";
		mysql_query($query);
	}