<?php 

	include '../koneksi.php';

	session_start();
	 
	if(!isset($_SESSION['saya_admin'])) {
	    header('location:./../'.$_SESSION['akses']);
	    exit();
	}
	 
	$nama = (isset($_SESSION['nama_user'])) ? $_SESSION['nama_user'] : '';

?>

<html>
<head>
	<title>Perpustakaan Online</title>
	
	<link rel="stylesheet" type="text/css" href="../css/style2.css"/>
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css" />
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
			<li class="navbar-left"><a href="index.php" style="border-right: 1px solid #0a3363">Home</a></li>
			<li class="navbar-left"><a href="?page=daftar_buku.php" style="border-right: 1px solid #0a3363">Daftar Buku</a></li>
			<li class="navbar-left"><a href="?page=daftar_peminjaman.php" style="border-right: 1px solid #0a3363">Report Peminjaman</a></li>
			<li class="navbar-kanan"><a href="../logout.php">Logout</a></li>
			<li class="navbar-kanan"><span style="border-right: 1px solid #0a3363">Halo, <?= $nama; ?></span></li>
		</ul>
		
		<!-- MAIN WRAPPER -->
		<div class="container">
			<div class="row">
				<img src="../assets/logo.gif"></img></center>
				<h1 style="text-transform: uppercase; font-size: 50px; margin-bottom: 0">Selamat Datang</h1>
				<h2 style="text-transform: uppercase; font-size: 25px; margin-top: 0">Di Perpustakaan Online PENS</h2><br><br>
				<div style="font-size: 18px">Anda dapat menikmati layanan ini secara online, seperti :<br>
				<br>
				
				1. Melihat daftar buku apa saja yang ada di Perpus PENS<br>
				2. Melihat kesediaan buku<br></div>
			</div>
		</div>
		
		<!-- FOOTER -->
		<div id="footer">
			Created by Pravasta Caraka ©2018 - All Rights Reserved
		</div>
	</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>