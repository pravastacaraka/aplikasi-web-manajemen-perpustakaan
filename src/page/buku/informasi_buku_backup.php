<?php 
	include "../../koneksi.php";
	$id 	= @$_GET['id'];
	$sql 	= $koneksi->query("select * from buku where id='$id'");
	$tampil = $sql->fetch_assoc();
	$tampil_tahun = $tampil['tahun'];
?>	
<?php include "../../login.php" ?>

<html>
<head>
	<title><?= $tampil['judul']; ?> | Perpustakaan Online</title>
	
	<link rel="stylesheet" type="text/css" href="../../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css" />
</head>

<body style="color: #000;">
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
			<li class="navbar-left"><a href="../../index.php" style="border-right: 1px solid #0a3363">Home</a></li>
			<li class="navbar-left"><a href="daftar_buku.php" style="border-right: 1px solid #0a3363">Daftar Buku</a></li>
			<li class="navbar-kanan"><a href="#" data-toggle="modal" data-target="#formLogin" class="navbar-login">Login</a></li>
		</ul>
			
		<div class="container">
			<div class="row">
				<h1 style="text-transform: uppercase; margin: 10px 0 0 0; font-family: Verdana">Informasi Buku<br><h1 style="text-transform: uppercase; margin: 0; font-family: Verdana; font-size: 24px">"<?= $tampil['judul']; ?>"</h1></h1><br><br>

				<form method="post">
				<table cellspacing="0" width="80%" align="center">
					<tr class="baris-data" style="border-top: 0">
						<td style="text-align: left; width: 20%">Judul</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left"><?= $tampil['judul']; ?></td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Kode Buku</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left"><?= $tampil['id']; ?></td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Kode ISBN</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left"><?= $tampil['id']; ?></td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Pengarang</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left"><?= $tampil['pengarang']; ?></td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Penerbit</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left"><?= $tampil['penerbit']; ?></td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Tahun Terbit</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left"><?= $tampil['tahun']; ?></td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Sinopsis</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left">-</td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Lokasi Rak</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left;"><?= $tampil['lokasi']; ?></td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Jumlah Buku</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left;"><?= $tampil['jumlah']; ?></td>
					</tr>
					<tr class="baris-data">
						<td style="text-align: left; width: 20%">Status Buku</td>
						<td style="text-align: left; width: 10px">:</td>
						<td style="text-align: left;">
							<?php 
							if($tampil['jumlah'] >= 1)
								echo '<div style="color: green">Ada</div>';
							else
								echo '<div style="color: red">Dipinjam</div>';
							?>
						</td>
					</tr>
				</table>

				<?php 
					if($tampil['jumlah'] >= 1){
				?>
				<br>
				<input class="btn-edit" type="submit" value="Pinjam Buku" name="pinjam" />
				<?php 
					$pinjam = @$_POST['pinjam'];
					$jumlah = @$_POST['jumlah'];

					if($pinjam){

						$jumlah = $tampil['jumlah'] - 1;
						$sql = $koneksi->query("update buku set jumlah='$jumlah' where id='$id'");
	
						if($sql){
				?>
							<script type="text/javascript">
								alert("Silahkan ambil buku di rak dan tunjukkan kepada petugas!");
								window.location.href="informasi_buku.php?id=<?= $tampil['id']; ?>";
							</script>
				<?php
						} else {
							$jumlah = $tampil['jumlah'] + 1;
							$sql = $koneksi->query("insert into buku (jumlah) values ('$jumlah')");
				?>
							<script type="text/javascript">
								alert("Peminjaman gagal, silahkan hubungi petugas!");
								window.location.href="informasi_buku.php?id=<?= $tampil['id']; ?>";
							</script>
				<?php	
						}
					}
					}	
				?>
				</form>
			</div>
		</div>
		<div id="footer">
			Created by Pravasta Caraka ©2018 - All Rights Reserved
		</div>
	</div>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>