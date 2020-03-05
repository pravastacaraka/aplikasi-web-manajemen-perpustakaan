<?php include 'koneksi.php'; ?>
<?php include 'login.php'; ?>

<html>
<head>
	<title>Perpustakaan Online</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css" />
</head>

<body class="body">
	<div id="wrapper">
		<!-- HEADER WRAPPER -->
		<div class="container">
			<div class="row">
				<div id="header">
					<div class="header-title">
						PERPUSTAKAAN ONLINE PENS<br>
						<div style="font-size: 26px;">PROJECT WORKSHOP DATABASE</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- NAVBAR -->
		<ul id="navbar">
			<li class="navbar-left"><a href="index.php" style="border-right: 1px solid #0a3363"><i class="fas fa-home fa-sm"></i> Home</a></li>
			<li class="navbar-left"><a href="?page=buku">Daftar Buku</a></li>
			<li class="navbar-kanan"><a href="#" data-toggle="modal" data-target="#formLogin" class="navbar-login"><i class="fas fa-sign-in-alt fa-sm"></i> Login</a></li>
		</ul>

		<!-- ISI KONTEN -->
		<?php 
			$page = @$_GET['page'];
			$action = @$_GET['action'];

			if($page == "buku"){
				if($action == ""){
					include 'page/buku/daftar_buku.php';
				} elseif($action == "detail"){
					include 'page/buku/informasi_buku.php';
				}
			} else {

		?>
	<!-- MAIN WRAPPER -->
	<div class="container">
		<div class="row">
			<img src="<?php echo $url; ?>/assets/logo.gif"></img></center>
			<h1 style="text-transform: uppercase; font-size: 50px; margin-bottom: 0">Selamat Datang</h1>
			<h2 style="text-transform: uppercase; font-size: 25px; margin-top: 0">Di Perpustakaan Online PENS</h2><br><br>
			<div style="font-size: 18px">Anda dapat menikmati layanan ini secara online, seperti :<br>
			<br>
			
			1. Melihat daftar buku apa saja yang ada di Perpus PENS<br>
			2. Melihat kesediaan buku<br></div>
		</div>
	</div>
		<?php
			}
		?>
		
		<!-- FOOTER -->
		<div id="footer">
			Develop by SRT ©2018 - All Rights Reserved
		</div>
	</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>