<?php 

	include '../../koneksi.php';

	session_start();
	 
	if(!isset($_SESSION['saya_admin'])) {
	    header('location:./../'.$_SESSION['akses']);
	    exit();
	}
	 
	$nama = (isset($_SESSION['nama_user'])) ? $_SESSION['nama_user'] : '';

?>

<html>
<head>
	<title>Daftar Buku | Perpustakaan Online</title>
	
	<link rel="stylesheet" type="text/css" href="../../css/style2.css"/>
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
			<li class="navbar-left"><a href="../index.php" style="border-right: 1px solid #0a3363">Home</a></li>
			<li class="navbar-left"><a href="daftar_buku.php" style="border-right: 1px solid #0a3363">Daftar Buku</a></li>
			<li class="navbar-left"><a href="../report/daftar_peminjaman.php">Report Peminjaman</a></li>
			<li class="navbar-kanan"><a href="../../logout.php">Logout</a></li>
			<li class="navbar-kanan"><span style="border-right: 1px solid #0a3363">Halo, <?= $nama; ?></span></li>
		</ul>
		
		<div class="container">
			<div class="row">
				<br><h1 style="text-transform: uppercase; margin: 10px 0; font-family: Verdana">Daftar Buku di Perpustakaan PENS</h1><br>
				
				<!-- TABLE PENCARIAN -->
				<table cellspacing="0" width="100%">
					<tr>
						<td class="baris-cari">
							<form action="" method="post" style="width: 100%; margin-bottom: 0;">
								<div class="input-group" style="display: flex">
									<!--<div class="input-group-label">
										<i class="fa fa-search"></i>
									</div>-->
									<input class="input-group-field" type="text" name="input_cari" placeholder="Cari berdasarkan judul..." title="Cari buku?" >
									<input class="btn-edit" type="submit" name="cari2" value="Cari" style="width: 10%; margin-left: -2px">
									<!--id="myInput" onkeyup="myFunction()"-->
								</div>
							</form>
						</td>
					</tr>
				</table>
				<br>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
			<!-- TABLE DAFTAR BUKU -->
			<table cellspacing="0" width="100%">
				
				<tr>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">No</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Judul Buku</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Penerbit</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Pengarang</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Tahun</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Jumlah</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Status</div></th>
					<th class="baris-header" colspan="2"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Aksi</div></th>
				</tr>
				
				<?php
					$input_cari = @$_POST['input_cari'];
					$cari 		= @$_POST['cari2'];
					$limit 		= 10; // Jumlah data per halamannya
					$page 		= (isset($_GET['p']))? $_GET['p'] : 1; // Cek apakah terdapat data page pada URL
					$mulai 		= ($page - 1) * $limit; // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$no 		= $mulai+1; // Untuk penomoran tabel
					
					if($cari){
						if($input_cari != "") {
							$sql = $koneksi->query("SELECT * FROM buku WHERE judul LIKE '%$input_cari%' LIMIT $mulai, $limit") or die(mysql_error);
						} else {
							$sql = $koneksi->query("SELECT * FROM buku LIMIT $mulai, $limit") or die(mysql_error);
						}
					} else {
						$sql = $koneksi->query("SELECT * FROM buku LIMIT $mulai, $limit") or die(mysql_error);
					}
					
					$cek 		= $sql->num_rows;
					
					if($cek < 1) {
				?>
				<tr> 
					<!-- ALERT JIKA DATA 0 -->
					<td colspan="8" class="baris-data"><div style="text-align: center;font-size: 17px; padding: 20px">Data Tidak Ditemukan</div></td>
				</tr>
				<?php
					} else {
						while($data = $sql->fetch_assoc()) {	
				?>
				<tr class="baris-data">
					<td class="baris-data"><div style="text-align: center;font-size: 17px"><?= $no++; ?></div></td>
					<td class="baris-data"><div style="text-align: left;font-size: 17px"><?= $data['judul']; ?></div></td>
					<td class="baris-data"><div style="text-align: left;font-size: 17px"><?= $data['penerbit']; ?></div></td>
					<td class="baris-data"><div style="text-align: left;font-size: 17px;"><?= $data['pengarang']; ?></div></td>
					<td class="baris-data"><div style="text-align: center;font-size: 17px"><?= $data['tahun']; ?></div></td>
					<td class="baris-data"><div style="text-align: center;font-size: 17px"><?= $data['jumlah']; ?></div></td>
					<td class="baris-data"><div style="text-align: center;font-size: 17px">
						<?php 
							if($data['jumlah'] >= 1)
								echo '<div style="color: green">Ada</div>';
							else
								echo '<div style="color: red">Dipinjam</div>';
						?>
					</div></td>
					<td align="center" style="padding-right: 0"><div style="text-align: center; font-size: 22px;">
						<a href="ubah_buku.php?id=<?= $data['id']; ?>" title="Edit Data"><i class="fa fa-edit btn-fa btn-fa-info"></i></a>
					</div></td>
					<td align="center" style="padding-left: 0"><div style="text-align: center;font-size: 22px">
						<a onclick="return confirm ('Apakah anda yakin untuk menghapus data ini?')" href="hapus_buku.php?id=<?= $data['id']; ?>" title="Delete Data"><i class="fa fa-trash btn-fa btn-fa-danger"></i></a>
					</div></td>
				</tr>
				<?php
						}
				?>
				<!-- BARIS PAGINATION -->
				<tr>
					<td colspan="8" class="baris-paging">
						<ul class="pagination">
						<!-- LINK FIRST AND PREV -->
						<?php
							if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
						?>
								<li class="disabled"><a href="#">First</a></li>
								<li class="disabled"><a href="#">&laquo;</a></li>
						<?php
						} else { // Jika page bukan page ke 1
							$link_prev = ($page > 1)? $page - 1 : 1;
						?>
								<li><a href="daftar_buku.php?p=1">First</a></li>
								<li><a href="daftar_buku.php?p=<?php echo $link_prev; ?>">&laquo;</a></li>
						<?php
						}
						?>
						
						<!-- LINK NUMBER -->
						<?php
							$sql2 = $koneksi->query("SELECT COUNT(*) AS jumlah FROM buku");
							$get_jumlah = $sql2->fetch_assoc();
							
							$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
							$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
							$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
							$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
							
							for($i = $start_number; $i <= $end_number; $i++){
								$link_active = ($page == $i)? ' class="active"' : '';
						?>
							<li <?php echo $link_active; ?>><a href="daftar_buku.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php
						}
						?>
						
						<!-- LINK NEXT AND LAST -->
						<?php
							// Jika page sama dengan jumlah page, maka disable link NEXT nya
							// Artinya page tersebut adalah page terakhir 
							if($page == $jumlah_page){ // Jika page terakhir
						?>
							<li class="disabled"><a href="#">&raquo;</a></li>
							<li class="disabled"><a href="#">Last</a></li>
						<?php
							} else { // Jika Bukan page terakhir
								$link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
						?>
							<li><a href="daftar_buku.php?p=<?php echo $link_next; ?>">&raquo;</a></li>
							<li><a href="daftar_buku.php?p=<?php echo $jumlah_page; ?>">Last</a></li>
						<?php
							}
						?>
						</ul>
					</td>
				</tr>
				<?php
					}
				?>
				
				<!--<tr>
					<th class="baris-footer" colspan="8"></th>
				</tr>-->
			</table>
			<br>
			<a href="tambah_buku.php" class="btn-edit" title="Tambah Buku">Tambah Data Buku</a>
		</div>
	</div>
		
		<div id="footer">
			Created by Pravasta Caraka ©2018 - All Rights Reserved
		</div>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>