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
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Database</h3>
						</div>
						<div class="table-responsive">
							<form method="post" action="/danzsecurity/user_edit/">
								<table class="table table-border table-hover table-condensed">
									<thead>
										<tr>
											<th style="width: 5%;">No. </th>
											<th style="width: 40%;">Name</th>
											<th style="width: 10%;">ID</th>
											<th style="width: 30%;">Password</th>
											<th style="width: 15%;">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$no = 1;
										$user = get_all_user();
										if(!empty($user)){
											foreach($user as $row){
									?>
										<tr>
											<td><?=$no?></td>
											<td><?=$row->name?></td>
											<td><?=$row->userid?></td>
											<td><?=$row->password?></td>
											<td>
												<button class="btn btn-link btn-xs" type="submit" name="edit" value="<?=$row->userid?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
											</td>
										</tr>
									<?php 
											$no++;
											}
										}else{
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
					<a href="/danzsecurity/user_add/" class="btn btn-primary pull-right">Add New User</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once '/../templates/footer.php';
?>