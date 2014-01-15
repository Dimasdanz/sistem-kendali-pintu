<?php 
	include_once '/../includes/hw_function.php';
	if(get_status() == '1'){
		$status = 'Armed';
	}else{
		$status = 'Disarmed';
	}
	if(get_condition() == '1'){
		$condition = 'Unlocked';
	}else{
		$condition = 'Locked';
	}
?>
<ul class="list-inline">
	<li><strong>Condition : <?=$condition?></strong></li>
	<li><strong>|</strong></li>
	<li><strong>Status : <?=$status?></strong></li>
	<li><strong>|</strong></li>
	<li><strong>Password Attemps : <?=get_attempts()?></strong></li>
</ul>