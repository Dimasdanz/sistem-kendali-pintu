<?php 
	include_once '/../templates/header.php';
	include_once '/../templates/navbar.php';
	$active = array('','','');
	$active[2] = 'active';
?>
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
						<strong>Success!</strong> <?=$_SESSION['message'];?>
					</div>
				</div>
			</div>
			<?php 
					unset($_SESSION['message']);
				}
				$lux_setting = trim(file_get_contents('device/lux_setting.txt'), '<>');
			?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Fotosintesis</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" name="device_setting" action="/fotosintesis/includes/hw_exec/">
						<div class="form-group">
							<div class="row">
								<label class="col-sm-3 control-label">Lux Setting</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" name="lux_setting" placeholder="Lux Setting" value="<?=$lux_setting?>">
									<span class="help-block">Triggered when sensor value is above setting</span>
								</div>
								<div class="col-sm-3">
									<button type="submit" class="btn btn-primary" name="apply" value="apply">Apply</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once '/../templates/footer.php';
?>