<?php
include_once '/../includes/connection.php';
include_once '/../templates/header.php';
include_once '/../templates/navbar.php';
$active = array ('','','');
$active [0] = 'active';
?>
<script>
	function get_log(){
		$('.log').load('/temperature/view/log');
	}
	setInterval('get_log()', 100);
</script>
<div class="container">
	<?php include_once '/view/header.php'?>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">Temperature Log</h3>
				</div>
				<div class="table-responsive">
					<div class="log"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once '/../templates/footer.php';
?>