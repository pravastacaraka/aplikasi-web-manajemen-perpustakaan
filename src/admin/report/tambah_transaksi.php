<?php 

	// Memisahkan tanggal dan menambahkan hari
	$hariini = date('d-m-Y');
	$kembali = strtotime($hariini);
	$hasil = date('d-m-Y', strtotime('+7 day', $kembali));

?>

<div class="container">
	<div class="row">
		<h1 style="text-transform: uppercase; text-align: center">Formulir Peminjaman Buku</h1><br>
		<form method="POST">
			<table cellspacing="0" width="50%" style="text-align: left" align="center">
				<tr>
					<td colspan="2">
						<label style="margin-bottom: 0;">Judul Buku :</label><br>
						<select class="select-default" name="buku">
							<?php
								$sql = $koneksi->query("SELECT * FROM buku ORDER BY judul ASC");
								
								while($data = $sql->fetch_assoc()) {
									$jumlah = $data['jumlah'];
									if($jumlah >= 1)
										echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
								}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<label style="margin-bottom: 0;">Nama Peminjam :</label><br>
						<select class="select-default" name="nama">
							<?php
								$sql = $koneksi->query("SELECT * FROM anggota ORDER BY nrp ASC");
								
								while($data = $sql->fetch_assoc()) {
									echo "<option value='$data[nrp].$data[nama]'>$data[nrp] - $data[nama]</option>";
								}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td>
						<label style="margin-bottom: 0;">Tanggal Peminjaman :</label><br>
						<input class="input-default" type="text" name="tgl_pinjam" value="<?= $hariini; ?>" readonly />
					</td>
					<td>
						<label style="margin-bottom: 0;">Tanggal Pengembalian :</label><br>
						<input class="input-default" type="text" name="tgl_kembali" value="<?= $hasil; ?>" readonly />
					</td>
				</tr>

				<tr style="text-align: center">
					<td colspan="2">
						<input class="btn-edit" type="submit" name="simpan" value="Simpan" />
						<input class="btn-edit" type="submit" name="batal" value="Batal" />
						<input class="btn-edit" type="reset" name="reset" value="Reset" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php
	
	if(isset($_POST['simpan'])) {
		$tgl_pinjam = $_POST['tgl_pinjam'];
		$tgl_kembali = $_POST['tgl_kembali'];

		// Memisahkan id dan judul buku
		$buku = $_POST['buku'];
		$buku_explode = explode(".", $buku);
		$id = $buku_explode[0];
		$judul = $buku_explode[1];

		// Memisahkan nrp dan nama
		$nama = $_POST['nama'];
		$nama_explode = explode(".", $nama);
		$nrp = $nama_explode[0];
		$nama = $nama_explode[1];

		$sql = $koneksi->query("SELECT * FROM buku WHERE judul='$judul'");
		while($data = $sql->fetch_assoc()) {

			$jumlah = $data['jumlah'];

			if($jumlah > 0) {
				$sql = $koneksi->query("INSERT INTO report (judul, nrp, nama, tgl_pinjam, tgl_kembali) VALUES ('$judul', '$nrp', '$nama', '$tgl_pinjam', '$tgl_kembali')");

				$sql2 = $koneksi->query("UPDATE buku SET jumlah=(jumlah-1) WHERE id='$id'");
?>			
				<script type="text/javascript">
					alert("Data berhasil disimpan!");
					window.location.href="?page=transaksi";
				</script>
<?php
			} else {
?>
			<script type="text/javascript">
				alert("Maaf jumlah buku kurang, silahkan update!");
				window.location.href="?page=transaksi";
			</script>
<?php
			}
		}
	} elseif(isset($_POST['batal'])) {
?>
		<script type="text/javascript">
				window.location.href="?page=transaksi";
		</script>
<?php
	}
?>