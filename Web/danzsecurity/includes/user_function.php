<?php
require_once '/../../includes/connection.php';

function user_auto_id(){
	$query = "select userid from security_user order by userid desc limit 1";
	$result = mysql_query($query);
	if(mysql_num_rows($result)>0){
		$data = mysql_fetch_row($result);
		$data = ($data[0]+1);
		return str_pad($data,3,'0',STR_PAD_LEFT);
	}else{
		return '001';
	}
}

function insert_user($userid, $name, $password){
	$query = "insert into security_user values('$userid', '$name', '$password')";
	mysql_query($query);
}

function update_user($userid, $name, $password){
	$query = "update security_user set name='$name', password='$password' where userid='$userid'";
	mysql_query($query);
}

function delete_user($userid){
	$query = "delete from security_user where userid='$userid'";
	mysql_query($query);
}

function get_all_user(){
	$query = "select * from security_user";
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

function get_single_user($userid){
	$query = "select * from security_user where userid=$userid";
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0){
		return mysql_fetch_object($result);
	}else{
		return null;
	}
}