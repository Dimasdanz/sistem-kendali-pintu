<?php 
	include_once '/../includes/log_function.php';
?>
<table class="table table-border table-hover table-condensed">
	<thead>
		<tr>
			<th style="width: 5%;">No. </th>
			<th style="width: 75%;">Name</th>
			<th style="width: 20%;">Time</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$no = 1;
		$log = get_today_log();
		if(!empty($log)){
			foreach($log as $row){
	?>
		<tr>
			<td><?=$no?></td>
			<td><?=$row->name?></td>
			<td><?=date('H:i:s', strtotime($row->time))?></td>
		</tr>
	<?php 
			$no++;
			}
		}else{
	?>
		<tr>
			<td colspan="3" align="center">No Log for Today</td>
		</tr>
	<?php 
		}
	?>
	</tbody>
</table>