<?php
include_once '/../includes/connection.php';
	include_once '/../templates/header.php';
	include_once '/../templates/navbar.php';
	$active = array ('','','');
	$active [1] = 'active';
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
								<th style="width: 5%;">No.</th>
								<th style="width: 55%;">Lux Level</th>
								<th style="width: 20%;">Date</th>
								<th style="width: 20%;">Time</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$query = "select * from fotosintesis_log order by time desc";
						$result = mysql_query ( $query );
						if (mysql_num_rows ( $result ) > 0) {
							while ( true == $data = mysql_fetch_object ( $result ) ) {
								$row [] = $data;
							}
						} else {
							$row = NULL;
						}
						if (! empty ( $row )) {
							foreach ( $row as $val ) {
								?>
							<tr>
								<td><?=$no?></td>
								<td><?=$val->lux?></td>
								<td><?=date('d F Y', strtotime($val->time))?></td>
								<td><?=date('H:i:s', strtotime($val->time))?></td>
							</tr>
						<?php
								$no ++;
							}
						} else {
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