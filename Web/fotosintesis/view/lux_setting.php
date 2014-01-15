<?php 
	$lux_setting = trim(file_get_contents('../device/lux_setting.txt'), '<>');
?>
<ul class="list-inline">
	<li><strong>Lux Setting : <?=$lux_setting?></strong></li>
</ul>