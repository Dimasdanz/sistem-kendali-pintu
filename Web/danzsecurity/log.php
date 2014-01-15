<?php 
	include_once '/../templates/header.php';
	include_once '/../templates/navbar.php';
	include_once '/includes/log_function.php';
	$active = array('','','','');
	$active[2] = 'active';
?>
<div class="container">
	<?php include_once '/view/header.php'?>
	<div class="row">
		<?php include_once 'view/navbar.php';?>
		<div class="col-sm-9">
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<h3 class="panel-title">Device Log</h3>
				</div>
				<div class="table-responsive">
					<table class="table table-border table-hover table-condensed">
						<thead>
							<tr>
								<th style="width: 5%;">No. </th>
								<th style="width: 55%;">Name</th>
								<th style="width: 20%;">Date</th>
								<th style="width: 20%;">Time</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$no = 1;
							$log = get_all_log();
							if(!empty($log)){
								foreach ($log as $row){
						?>
							<tr>
								<td><?=$no?></td>
								<td><?=$row->name?></td>
								<td><?=date('d F Y', strtotime($row->time))?></td>
								<td><?=date('H:i:s', strtotime($row->time))?></td>
							</tr>
						<?php 
								$no++;
								}
							}else{
						?>
							<tr>
								<td colspan="4" align="center">Data is empty</td>
							</tr>
						<?php 
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once '/../templates/footer.php';
?>