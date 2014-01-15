<?php
	include_once '/../includes/android_function.php';

	if(isset($_POST["regId"])) {
		$gcm_regid = $_POST["regId"];
		insert_device($gcm_regid);
	}