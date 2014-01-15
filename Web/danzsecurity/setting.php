<?php 
	include_once '/../templates/header.php';
	include_once '/../templates/navbar.php';
	include_once 'includes/hw_function.php';
	$active = array('','','','');
	$active[3] = 'active';
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
			?>
			<?php 
				if(isset($_SESSION['error'])){
			?>
			<div class="row">
				<div class="col-sm-12">
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Oh Snap!</strong> <?=$_SESSION['error'];?>
					</div>
				</div>
			</div>
			<?php 
					unset($_SESSION['error']);
				}
			?>
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<h3 class="panel-title">Device Setting</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" name="device_setting" action="/danzsecurity/includes/hw_exec/">
						<?php 
							if(get_condition() == '1'){
						?>
						<div class="form-group">
							<div class="row">
								<label class="col-sm-3 control-label">Password Attemps</label>
								<div class="col-sm-6">
									<input type="number" class="form-control" name="password_attempts" placeholder="Password Attempts" value="<?=get_attempts()?>">
									<span class="help-block">Set 0 for infinite attempts</span>
								</div>
								<div class="col-sm-3">
									<button type="submit" class="btn btn-primary" name="apply" value="apply">Apply</button>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-sm-3 control-label">Device Status</label>
								<div class="col-sm-6">
									<input type="hidden" name="status" id="status">
									<?php 
										if(get_status() == '1'){
									?>
										<a class="btn btn-danger" id="device_power">Turn Off</a>
									<?php 
										}else{
									?>
										<a class="btn btn-success" id="device_power">Turn On</a>
									<?php 
										}
									?>
								</div>
							</div>
						</div>
						<?php 
							}else{
						?>
						<div class="row">
							<label class="col-sm-12 text-center">Device Locked</label>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<input type="hidden" name="condition" id="condition">
								<a class="btn btn-danger" id="device_condition">Unlock Now!</a>
							</div>
						</div>
						<?php 
							}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once '/../templates/footer.php';
?>