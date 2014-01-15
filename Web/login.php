<?php 
	include_once 'templates/header.php';
?>
<div class="container login">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 text-center well">
			<form accept-charset="UTF-8" role="form">
				<legend>Login</legend>
				<fieldset>
					<div class="form-group">
						<input class="form-control" placeholder="E-mail" name="email" type="text">
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Password" name="password" type="password" value="">
					</div>
					<input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
				</fieldset>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 text-center">
			<hr>
			<p class="text-muted credit">Copyright &copy; 2013 Teknik Komputer</p>
			<p class="text-muted credit small">Created and Designed by <a href="https://twitter.com/Dimasdanz/" target="_blank">Dimas Rullyan Danu</a></p>
			<p class="text-muted credit small">Powered by Bootstrap 3.0</p>
		</div>
	</div>
</div>