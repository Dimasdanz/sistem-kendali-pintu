<?php 
	include_once 'templates/header.php';
	include_once 'templates/navbar.php';
?>
<div class="container">
	<div class="page-header">
		<h3>Kelembaban Tanah</h3>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<img src="/assets/images/kelembaban/logo.gif" class="img-rounded img-responsive center-block">
			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					<h3 class="panel-title">Deskripsi Sistem</h3>
				</div>
				<div class="panel-body">
					<p class="text-justify">
						Alat ini menyiram otomatis bila ambang bawah kelembaban tanah telah dicapai dan akan berhenti apa bila menyentuh ambang atas.
					</p>
					<p class="text-justify">
						Alat ini memiliki 3 kategori kelembaban tanah yaitu, Kering, lembab, dan berair. yang memiliki ambang atas dan bawah yang cukup berbeda- beda.
					</p>
					<p class="text-justify">
						Pemilik tanaman bisa mengganti tanaman yang dirawat bahkan menambahkan tanaman baru.
					</p>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					<h3 class="panel-title">Cara Kerja Sistem</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">1. Tancapkan sensor pada tanaman yang anda inginkan</li>
					<li class="list-group-item">2. Pilih jenis tanaman pada web sesuai dengan tanaman yang di tancapi sensor</li>
					<li class="list-group-item">3. Apabila belum ada jenis tanaman, silahkan tambahkan tanaman baru dan pilih kategori kelembabannya</li>
					<li class="list-group-item">4. Rasakan manfaatnya!</li>
					
				</ul>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once 'templates/footer.php';
?>