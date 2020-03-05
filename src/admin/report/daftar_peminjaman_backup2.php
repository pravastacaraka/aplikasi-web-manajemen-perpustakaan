<?php include "../../koneksi.php" ?>

<html>
<head>
	<title>Daftar Peminjaman | Perpustakaan Online</title>
	
	<link rel="stylesheet" type="text/css" href="../../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/font-awesome.min.css">
	<script type="text/javascript" src="../../assets/js/searchTable.js"></script>
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div class="header-title">
				PERPUSTAKAAN ONLINE PENS<br>
				<div style="font-size: 26px;">PROJECT WORKSHOP DATABASE</div>
			</div>
		</div>
		
		<ul id="navbar">
			<li class="navbar-left"><a href="../../index.php" style="border-right: 1px solid #0a3363">Home</a></li>
			<li class="navbar-left"><a href="../buku/daftar_buku.php" style="border-right: 1px solid #0a3363">Daftar Buku</a></li>
			<li class="navbar-left"><a href="daftar_peminjaman.php">Daftar Peminjaman</a></li>
			<li class="navbar-right"><a href="daftar_peminjaman.php">Masuk</a></li>
		</ul>
			
		<div id="main"><center>
			<br><h1 style="text-transform: uppercase; margin: 10px 0; font-family: Verdana">Daftar Peminjaman di Perpustakaan PENS</h1><br><br>
			<table cellspacing="0" width="95%">
				<tr>
					<!--<td class="baris-cari" width="10%">Pencarian Buku : </td>-->
					<td class="baris-cari">
						<div class="input-group">
							<div class="input-group-label">
								<i class="fa fa-search"></i>
							</div>
							<input class="input-group-field" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan judul..." title="Cari buku?">
						</div>
					</td>
				</tr>
			</table>
			<br>
			<table cellspacing="0" width="95%" id="myTable">
				
				<tr>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">No</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Judul Buku</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Penerbit</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Pengarang</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Tahun</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Jumlah</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Status</div></th>
					<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Aksi</div></th>
				</tr>
				
				<?php
					$limit 		= 10; // Jumlah data per halamannya
					$page 		= (isset($_GET['p']))? $_GET['p'] : 1; // Cek apakah terdapat data page pada URL
					$mulai 		= ($page - 1) * $limit; // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					//$result 	= $koneksi->query("SELECT * FROM buku");
					//$total 		= $result->num_rows;
					//$pages 		= ceil($total/$limit);            
					$sql 		= $koneksi->query("select * from buku LIMIT $mulai, $limit") or die(mysql_error);
					$no 		= $mulai+1; // Untuk penomoran tabel
					while($data = $sql->fetch_assoc()) {	
				?>
				<tr class="baris-data">
					<td><div style="text-align: center;font-size: 17px"><?= $no++; ?></div></td>
					<td><div style="text-align: left;font-size: 17px"><?= $data['judul']; ?></div></td>
					<td><div style="text-align: left;font-size: 17px"><?= $data['penerbit']; ?></div></td>
					<td><div style="text-align: left;font-size: 17px;"><?= $data['pengarang']; ?></div></td>
					<td><div style="text-align: center;font-size: 17px"><?= $data['tahun']; ?></div></td>
					<td><div style="text-align: center;font-size: 17px">1</div></td>
					<td><div style="text-align: center;font-size: 17px">Ada</div></td>
					<td><center><div style="text-align: center;font-size: 24px"><a href="ubah_buku.php?id=<?= $data['id']; ?>"><i class="fa fa-edit btn-fa btn-fa-info"></i></a>    <a onclick="return confirm ('Apakah anda yakin untuk menghapus data ini?')" href="hapus_buku.php?id=<?= $data['id']; ?>"><i class="fa fa-trash btn-fa btn-fa-danger"></i></a></div></center></td>
				</tr>
				<?php } ?>
				
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
						// Buat query untuk menghitung semua jumlah data
						$sql2 = $koneksi->query("SELECT COUNT(*) AS jumlah FROM buku");
						//$sql2->execute(); // Eksekusi querynya
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
				
				<!--<tr>
					<th class="baris-footer" colspan="8"></th>
				</tr>-->
			</table>
			
			<br><br>
			<a href="tambah_buku.php" class="btn">Tambah Data Buku</a>
			<br><br>
		</center></div>
		
		<div id="footer">
			Created by Pravasta Caraka ©2018 - All Rights Reserved
		</div>
	</div>
</body>
</html>