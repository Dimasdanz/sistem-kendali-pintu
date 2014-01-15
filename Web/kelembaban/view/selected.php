<?php 
	$active_one = file_get_contents('../device/active_one.txt');
	$active_two = file_get_contents('../device/active_two.txt');
?>
<ul class="list-inline">
	<li><strong>Plant One : <?=$active_one?></strong></li>
	<li><strong>|||</strong></li>
	<li><strong>Plant Two : <?=$active_two?></strong></li>
</ul>