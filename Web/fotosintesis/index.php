<?php 
	include_once '/../templates/header.php';
	include_once '/../templates/navbar.php';
	$active = array('','','');
	$active[0] = 'active';
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
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">Today's Log</h3>
					<h4 class="panel-title pull-right">Tanggal : <?=date('d F Y')?></h4>
				</div>
				<div class="table-responsive">
					<div class="today_log"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once '/../templates/footer.php';
?>