<div class="container">
	<div class="row">
		<br><h1 style="text-transform: uppercase; margin: 10px 0; font-family: Verdana">Daftar Anggota Perpustakaan PENS</h1><br>
		
		<!-- TABLE PENCARIAN -->
		<table cellspacing="0" width="100%">
			<tr>
				<td class="baris-cari">
					<form action="" method="post" style="width: 100%; margin-bottom: 0;">
						<div class="input-group" style="display: flex">
							<!--<div class="input-group-label">
								<i class="fa fa-search"></i>
							</div>-->
							<input class="input-group-field" type="text" name="input_cari" placeholder="Cari berdasarkan nama..." title="Cari Anggota?" >
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
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">NRP</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Nama Anggota</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Alamat</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600;">Program Studi</div></th>
				<th class="baris-header"><div style="font-size: 18px;margin: 0 auto;font-weight:600; width: 10%%">Jenis Kelamin</div></th>
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
						$sql = $koneksi->query("SELECT * FROM anggota WHERE nama LIKE '%$input_cari%' LIMIT $mulai, $limit") or die(mysql_error);
					} else {
						$sql = $koneksi->query("SELECT * FROM anggota ORDER BY nrp ASC LIMIT $mulai, $limit") or die(mysql_error);
					}
				} else {
					$sql = $koneksi->query("SELECT * FROM anggota ORDER BY nrp ASC LIMIT $mulai, $limit") or die(mysql_error);
				}
				
				$cek 		= $sql->num_rows;
				
				if($cek < 1) {
			?>
			<tr> 
				<!-- ALERT JIKA DATA 0 -->
				<td colspan="7" class="baris-data"><div style="text-align: center;font-size: 17px; padding: 20px">Data Tidak Ditemukan</div></td>
			</tr>
			<?php
				} else {
					while($data = $sql->fetch_assoc()) {	
			?>
			<tr class="baris-data">
				<td class="baris-data"><div style="text-align: center;font-size: 17px"><?= $no++; ?></div></td>
				<td class="baris-data"><div style="text-align: center;font-size: 17px"><?= $data['nrp']; ?></div></td>
				<td class="baris-data"><div style="text-align: left;font-size: 17px"><?= $data['nama']; ?></div></td>
				<td class="baris-data"><div style="text-align: center;font-size: 17px;"><?= $data['alamat']; ?></div></td>
				<td class="baris-data"><div style="text-align: center;font-size: 17px"><?= $data['prodi']; ?></div></td>
				<td class="baris-data" style="width: 10%""><div style="text-align: center;font-size: 17px;"><?= $data['kelamin']; ?></div></td>
				<td align="center" style="padding-right: 1px; width: 4%"><div style="text-align: center; font-size: 22px;">
					<a href="?page=anggota&action=edit&id=<?= $data['id']; ?>" title="Ubah Data"><i class="far fa-edit btn-fa btn-fa-info"></i></a>
				</div></td>
				<td align="center" style="padding-left: 1px; width: 4%"><div style="text-align: center;font-size: 22px">
					<a onclick="return confirm ('Apakah anda yakin untuk menghapus data ini?')" href="?page=anggota&action=del&id=<?= $data['id']; ?>" title="Hapus Data"><i class="far fa-trash-alt btn-fa btn-fa-danger"></i></a>
				</div></td>
			</tr>
			<?php
					}
			?>
			<!-- BARIS PAGINATION -->
			<tr>
				<td colspan="7" class="baris-paging">
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
							<li><a href="?page=anggota&p=1">First</a></li>
							<li><a href="?page=anggota&p=<?php echo $link_prev; ?>">&laquo;</a></li>
					<?php
					}
					?>
					
					<!-- LINK NUMBER -->
					<?php
						$sql2 = $koneksi->query("SELECT COUNT(*) AS jumlah FROM anggota");
						$get_jumlah = $sql2->fetch_assoc();
						
						$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
						$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
						$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
						$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
						
						for($i = $start_number; $i <= $end_number; $i++){
							$link_active = ($page == $i)? ' class="active"' : '';
					?>
						<li <?php echo $link_active; ?>><a href="?page=anggota&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
						<li><a href="?page=anggota&p=<?php echo $link_next; ?>">&raquo;</a></li>
						<li><a href="?page=anggota&p=<?php echo $jumlah_page; ?>">Last</a></li>
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
				<td colspan="7"><br><a href="?page=anggota&action=tambah" class="btn-edit" title="Tambah Daftar Anggota">Tambah Daftar Anggota</a></td>
			</tr>
			
			<!--<tr>
				<th class="baris-footer" colspan="8"></th>
			</tr>-->
		</table>
	</div>
</div>