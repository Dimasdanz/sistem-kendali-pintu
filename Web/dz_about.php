<?php 
	include_once 'templates/header.php';
	include_once 'templates/navbar.php';
?>
<div class="container">
	<div class="page-header">
		<h3>DanzSecurity</h3>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<img src="/assets/images/danzsecurity/banner.png" class="img-rounded img-responsive" style="width: 1280px;">
			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					<h3 class="panel-title">Deskripsi Sistem</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">1. Password terdiri dari ID Pengguna dan Password yang digabungkan</li>
					<li class="list-group-item">2. Sistem dapat di aktifkan atau di non-aktifkan melalui web</li>
					<li class="list-group-item">3. Jumlah kesempatan salah masukan password dapat dikonfigurasi melalui web</li>
					<li class="list-group-item">4. Sistem akan terkunci ketika masukan password salah sebanyak jumlah kesempatan</li>
					<li class="list-group-item">5. Sistem hanya dapat dibuka melalui web</li>
					<li class="list-group-item">6. Setiap password benar, sistem diaktifkan/dinon-aktifkan, sistem terkunci/terbuka, maka perangkat Android yang terdaftar akan menerima notifikasi</li>
					<li class="list-group-item">7. Perangkat Android otomatis terdaftar jika telah login menggunakan aplikasi DanzSecurity</li>
					<li class="list-group-item">8. Perangkat Android hanya dapat melihat konfigurasi perangkat, data logger, dan menerima notifikasi</li>
				</ul>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					<h3 class="panel-title">Cara Penggunaan</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">1. Masukkan Password</li>
					<li class="list-group-item">2. Pintu akan terbuka jika Password benar</li>
					<li class="list-group-item">3. Perangkat Android akan menerima notifikasi jika password benar</li>
					<li class="list-group-item">4. Pintu akan tertutup otomatis ketika sensor magnetic tertutup</li>
					<li class="list-group-item">5. Jika masukan salah, pengguna dapat memasukkan password kembali sebanyak jumlah kesempatan yang dikonfigurasi pada server</li>
					<li class="list-group-item">6. Jika masukan salah sebanyak jumlah kesempatan, maka sistem akan terkunci dan hanya dapat dibuka melalui web</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php 
	include_once 'templates/footer.php';
?>