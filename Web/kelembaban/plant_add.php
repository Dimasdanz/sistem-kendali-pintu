<?php 
	include_once '/../templates/header.php';
	include_once '/../templates/navbar.php';
	$active = array('','');
	$active[1] = 'active';
?>
<div class="container">
	<?php include_once '/view/header.php'?>
	<div class="row">
		<?php include_once 'view/navbar.php';?>
		<div class="col-sm-9">
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<h3 class="panel-title">Plant</h3>
				</div>
				<div class="panel-body">
					<form role="form" id="user-form" method="post" action="/kelembaban/includes/plant_exec/">
						<div class="form-group">
							<label>Name</label>
							<div>
								<input type="text" class="form-control" name="name" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label>Humidity</label>
							<div>
								<select name="humidity" class="form-control">
									<option value="dry">Dry Soil</option>
									<option value="humid">Humid Soil</option>
									<option value="water">In-Water</option>
								</select>
							</div>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-primary" name="add" value="add">Add</button>
							<a class="btn btn-warning" href="/kelembaban/plants/">Cancel</a>
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