<?php 
	include_once 'templates/header.php';
	include_once 'templates/navbar.php';
?>
<div class="container">
	<div class="page-header">
		<h3>Fotosintesis Kecambah</h3>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<img src="/assets/images/fotosintesis/logo.png" class="img-rounded img-responsive center-block" style="width: 480px;">
			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					<h3 class="panel-title">Cara Penggunaan</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">1. Hubungkan konektor adapter dan kabel RJ45 pada port ethernet shield</li>
					<li class="list-group-item">2. Tunggu hingga  LED indikator koneksi menyala</li>
					<li class="list-group-item">3. Masukkan lux target pada field yang disediakan</li>
					<li class="list-group-item">4. Klik button Apply</li>
					<li class="list-group-item">5. Jika lux target kurang dari intensitas cahaya yang dibaca sensor maka flourecents light otomatis akan menyala</li>
					<li class="list-group-item">6. Lux yang dibaca sensor secara realtime akan ditampilkan pada LCD I2C.</li>
					<li class="list-group-item">7. Setiap perubahan lux akan disimpan dan ditampilkan pada data logger web.</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once 'templates/footer.php';
?>