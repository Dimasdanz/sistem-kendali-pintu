<?php 
	include_once '/../templates/header.php';
	include_once '/../templates/navbar.php';
	include_once '/includes/user_function.php';
	$active = array('','','','');
	$active[1] = 'active';
?>
<div class="container">
	<?php include_once '/view/header.php'?>
	<div class="row">
		<?php include_once 'view/navbar.php';?>
		<div class="col-sm-9">
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<h3 class="panel-title">User</h3>
				</div>
				<div class="panel-body">
					<form role="form" id="user-form" method="post" action="/danzsecurity/includes/user_exec/">
						<div class="form-group">
							<label>User ID</label>
							<div>
								<input type="text" class="form-control" name="userid" id="userid" placeholder="User ID" readonly value="<?=user_auto_id()?>">
							</div>
						</div>
						<div class="form-group">
							<label>Name</label>
							<div>
								<input type="text" class="form-control" name="name" id="name" placeholder="Name">
								<span id="name-error" style="color: red !important;"></span>
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div>
								<input type="text" class="form-control" name="password" id="password" placeholder="Password"  maxlength="8">
								<span id="password-error" style="color: red !important;"></span>
								<span class="help-block">Numeric only. Max 8 characters</span>
							</div>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-primary" name="add" value="add">Add</button>
							<a class="btn btn-success" href="/danzsecurity/database">Cancel</a>
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