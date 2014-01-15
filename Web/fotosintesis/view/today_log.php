<?php 
	include_once '/../../includes/connection.php';
?>
<table class="table table-border table-hover table-condensed">
	<thead>
		<tr>
			<th style="width: 5%;">No. </th>
			<th style="width: 75%;">Lux Level</th>
			<th style="width: 20%;">Time</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$no = 1;
		$query = "select * from fotosintesis_log where date(time) = curdate() order by time desc";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0){
			while(true == $data = mysql_fetch_object($result)){
				$row[] = $data;
			}
		}else{
			$row = NULL;
		}
		if($row != NULL){
			foreach($row as $val){
	?>
		<tr>
			<td><?=$no?></td>
			<td><?=$val->lux?></td>
			<td><?=date('H:i:s', strtotime($val->time))?></td>
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