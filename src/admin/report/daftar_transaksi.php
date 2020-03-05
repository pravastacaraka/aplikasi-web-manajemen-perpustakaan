<div class="container">
	<div class="row">
		<br><h1 style="text-transform: uppercase; margin: 10px 0; font-family: Verdana">Daftar Peminjaman Buku di Perpustakaan PENS</h1><br>
		
		<!-- TABLE PENCARIAN -->
		<table cellspacing="0" width="100%">
			<tr>
				<td class="baris-cari">
					<form action="" method="post" style="width: 100%; margin-bottom: 0;">
						<div class="input-group" style="display: flex">
							<!--<div class="input-group-label">
								<i class="fa fa-search"></i>
							</div>-->
							<input class="input-group-field" type="text" name="input_cari" placeholder="Cari berdasarkan judul..." title="Cari Buku yang Di Pinjam?" >
							<input class="btn-edit" type="submit" name="cari2" value="Cari" style="width: 10%; margin-left: -2px">
							<!--id="myInput" onkeyup="myFunction()"-->
						</div>
					</form>
				</td>
			</tr>
		</table>
		<br>
	</div>

	<div class="row">
		<!-- TABLE DAFTAR BUKU -->
		<table cellspacing="0" width="100%">
			<tr>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">No</div></th>
				<th class="baris-header" style="width: 25%;"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Judul</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">NRP</div></th>
				<th class="baris-header" style="width: 15%;"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Nama</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Tgl. Pinjam</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Tgl. Kembali</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Terlambat</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Status</div></th>
				<th class="baris-header" colspan="2" style="width: 8%"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Aksi</div></th>
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
						$sql = $koneksi->query("SELECT * FROM report WHERE judul LIKE '%$input_cari%' LIMIT $mulai, $limit");
					} else {
						$sql = $koneksi->query("SELECT * FROM report WHERE status='Pinjam' ORDER BY tgl_pinjam ASC LIMIT $mulai, $limit");
					}
				} else {
					$sql = $koneksi->query("SELECT * FROM report WHERE status='Pinjam' ORDER BY tgl_pinjam ASC LIMIT $mulai, $limit");
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
				<td><div style="text-align: center;font-size: 17px"><?= $no++; ?></div></td>
				<td style="width: 25%;"><div style="text-align: left;font-size: 17px"><?= $data['judul']; ?></div></td>
				<td><div style="text-align: left;font-size: 17px"><?= $data['nrp']; ?></div></td>
				<td style="width: 15%;"><div style="text-align: left;font-size: 17px"><?= $data['nama']; ?></div></td>
				<td><div style="text-align: center;font-size: 17px;"><?= $data['tgl_pinjam']; ?></div></td>
				<td><div style="text-align: center;font-size: 17px"><?= $data['tgl_kembali']; ?></div></td>
				<td><div style="text-align: center;font-size: 17px">
					<?php 

						if($data['status'] == "Pinjam") {
							$nominal_denda = 1000;

							$tgl_kembali2 = $data['tgl_kembali'];
							$tgl_hariini2 = date('Y-m-d');

							$hari = telat($tgl_kembali2, $tgl_hariini2);
							$denda = $hari * $nominal_denda;
							$format_denda = number_format($denda, 0, ',', '.');

							if($hari>0)
								echo "<div style='color: red'>$hari Hari<br><div style='font-size: 12px'>(Rp $format_denda)</div></div>";
							else
								echo "<div style='color: green'>-</div>";
						}

					?>
				</div></td>
				<td><div style="text-align: center;font-size: 17px"><?= $data['status']; ?></div></td>
					<?php

						if($hari > 0) {

					?>
				<td align="center" style="padding-right: 1px; width: 4%"><div style="text-align: center; font-size: 22px;">
					<a href="?page=transaksi&action=selesai&id=<?= $data['id']; ?>&judul=<?= $data['judul']; ?>" title="Sudah Dikembalikan"><i class="fas fa-check btn-fa btn-fa-succes"></i></a>
				</div></td>

				<td align="center" style="padding-left: 1px; width: 4%"><div style="text-align: center;font-size: 22px">
					<a><i class="fa fa-plus btn-fa-disabled"></i></a>
				</div></td>
					<?php 

						} else {

					?>
				<td align="center" style="padding-right: 1px"><div style="text-align: center; font-size: 22px;">
					<a href="?page=transaksi&action=selesai&id=<?= $data['id']; ?>&judul=<?= $data['judul']; ?>" title="Sudah Dikembalikan"><i class="fas fa-check btn-fa btn-fa-succes"></i></a>
				</div></td>

				<td align="center" style="padding-left: 1px"><div style="text-align: center;font-size: 22px">
					<a onclick="return confirm ('Apakah anda yakin untuk memperpanjang transaksi ini?')" href="?page=transaksi&action=perpanjang&id=<?= $data['id']; ?>&judul=<?= $data['judul'];?>&tgl_kembali=<?= $data['tgl_kembali'];?>" title="Perpanjang"><i class="fa fa-plus btn-fa btn-fa-info"></i></a>
				</div></td>
					<?php

						} 

					?>
			</tr>
			<?php 

					}
			?>
			<!-- BARIS PAGINATION -->
			<tr>
				<td colspan="10" class="baris-paging">
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
							<li><a href="?page=transaksi&p=1">First</a></li>
							<li><a href="?page=transaksi&p=<?php echo $link_prev; ?>">&laquo;</a></li>
					<?php
					}
					?>
					
					<!-- LINK NUMBER -->
					<?php
						$sql2 = $koneksi->query("SELECT COUNT(*) AS jumlah FROM report");
						$get_jumlah = $sql2->fetch_assoc();
						
						$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
						$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
						$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
						$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
						
						for($i = $start_number; $i <= $end_number; $i++){
							$link_active = ($page == $i)? ' class="active"' : '';
					?>
						<li <?php echo $link_active; ?>><a href="?page=transaksi&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
						<li><a href="?page=transaksi&p=<?php echo $link_next; ?>">&raquo;</a></li>
						<li><a href="?page=transaksi&p=<?php echo $jumlah_page; ?>">Last</a></li>
					<?php
						}
					?>
					</ul>
				</td>
			</tr>
			<?php
				}
			?>

			<tr style="text-align: center">
				<td colspan="10"><br><a href="?page=transaksi&action=tambah" class="btn-edit" title="Tambah Buku">Tambah Peminjaman Buku</a></td>
			</tr>
			
			<!--<tr>
				<th class="baris-footer" colspan="8"></th>
			</tr>-->
		</table>
	</div>
</div>