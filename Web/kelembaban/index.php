<?php
include_once '/../includes/connection.php';
include_once '/../templates/header.php';
include_once '/../templates/navbar.php';
$active = array (
		'',
		'',
		'' 
);
$active [0] = 'active';
?>
<script>
	function get_today_log(){
		$('.today_log').load('/fotosintesis/view/today_log');
	}
	setInterval('get_today_log()', 100);
</script>
<div class="container">
	<?php include_once '/view/header.php'?>
	<div class="row">
		<?php include_once 'view/navbar.php';?>
		<div class="col-sm-9">
			<?php 
				if(isset($_SESSION['message'])){
			?>
			<div class="row">
				<div class="col-sm-12">
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?=$_SESSION['message'];?>
					</div>
				</div>
			</div>
			<?php 
					unset($_SESSION['message']);
				}
			?>
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">Plant Selector</h3>
				</div>
				<div class="table-responsive">
					<form method="post" action="/kelembaban/includes/select_exec/">
						<table class="table table-border table-hover table-condensed">
							<thead>
								<tr>
									<th style="width: 5%;">No.</th>
									<th style="width: 45%;">Name</th>
									<th style="width: 20%;">Humidity</th>
									<th style="width: 15%;">Pot 1</th>
									<th style="width: 15%;">Pot 2</th>
								</tr>
							</thead>
							<tbody>
									<?php
									$no = 1;
									$query = "select * from plants order by id desc";
									$result = mysql_query ( $query );
									if (mysql_num_rows ( $result ) > 0) {
										while ( true == $data = mysql_fetch_object ( $result ) ) {
											$plants [] = $data;
										}
									} else {
										$plants = NULL;
									}
									if (! empty ( $plants )) {
										foreach ( $plants as $row ) {
											?>
										<tr>
									<td><?=$no?></td>
									<td><?=$row->name?></td>
									<td><?=$row->humidity?></td>
									<td>
										<button class="btn btn-link btn-xs" type="submit" name="select_one" value="<?=$row->id?>">
											<span class="glyphicon glyphicon-check"></span> Select Plant
										</button>
									</td>
									<td>
										<button class="btn btn-link btn-xs" type="submit" name="select_two" value="<?=$row->id?>">
											<span class="glyphicon glyphicon-check"></span> Select Plant
										</button>
									</td>
								</tr>
									<?php
											$no ++;
										}
									} else {
										?>
										<tr>
									<td colspan="5" align="center">Data is empty</td>
								</tr>
									<?php
									}
									?>
									</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once '/../templates/footer.php';
?>