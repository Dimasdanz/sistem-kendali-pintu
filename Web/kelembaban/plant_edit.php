<?php 
	include_once '/../includes/connection.php';
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
					<?php 
						$query = "select * from plants where id=$_POST[edit]";
						$result = mysql_query($query);
						$data = mysql_fetch_row($result);
					?>
					<form role="form" id="user-form" method="post" action="/kelembaban/includes/plant_exec/">
						<input type="hidden" name="id" value="<?=$data[0]?>">
						<div class="form-group">
							<label>Name</label>
							<div>
								<input type="text" class="form-control" name="name" placeholder="Name" value="<?=$data[1]?>">
							</div>
						</div>
						<div class="form-group">
							<?php 
								$selected = array('','','');
								if($data[2] == "dry"){
									$selected[0] = 'selected';
								}
								if($data[2] == "humid"){
									$selected[1] = 'selected';
								}
								if($data[2] == "water"){
									$selected[2] = 'selected';
								}
							?>
							<label>Humidity</label>
							<div>
								<select name="humidity" class="form-control">
									<option value="dry" <?=$selected[0]?>>Dry Soil</option>
									<option value="humid" <?=$selected[1]?>>Humid Soil</option>
									<option value="water" <?=$selected[2]?>>In-Water</option>
								</select>
							</div>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
							<button type="submit" class="btn btn-danger" name="delete" value="delete">Delete</button>
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