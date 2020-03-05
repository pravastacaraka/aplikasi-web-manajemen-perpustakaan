<div class="container">
	<div class="row" style="text-align: left">
		<h1 style="text-transform: uppercase; text-align: center">Formulir Penambahan Data Anggota</h1><br>
		<form method="POST">
			<table cellspacing="0" width="100%" style="text-align: left">
				<tr>
					<td><label style="margin-bottom: 0;">NRP :</label><br><input class="input-default" type="text" name="nrp" placeholder="NRP" /></td>
					<td colspan="4"><label style="margin-bottom: 0;">Nama Lengkap :</label><br><input class="input-default" type="text" name="nama"  placeholder="Nama Lengkap" /></td>
				</tr>

				<tr>
					<td colspan="5"><label style="margin-bottom: 0;">Alamat :</label><br><textarea class="input-default" type="text" name="alamat" style="height: 180px" placeholder="Alamat Lengkap"></textarea></td>
				</tr>

				<tr>
					<td><label style="margin-bottom: 0;">Program Studi :</label><br><select class="select-default" name="prodi">
						<option value="D3 Multimedia Broadcasting">D3 Multimedia Broadcasting</option>
						<option value="D3 Teknik Elektronika">D3 Teknik Elektronika</option>
						<option value="D3 Teknik Elektronika Industri">D3 Teknik Elektronika Industri</option>
						<option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
						<option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
						<option value="D4 Teknik Elektronika">D4 Teknik Elektronika</option>
						<option value="D4 Teknik Elektronika Industri">D4 Teknik Elektronika Industri</option>
						<option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
						<option value="D4 Teknik Komputer">D4 Teknik Komputer</option>
						<option value="D4 Teknik Mekatronika">D4 Teknik Mekatronika</option>
						<option value="D4 Teknik Telekomunikasi">D4 Teknik Telekomunikasi</option>
						<option value="D4 Teknologi Game">D4 Teknologi Game</option>
						<option value="D4 Sistem Pembangkit Energi">D4 Sistem Pembangkit Energi</option>
					</select></td>
					<td><label style="margin-bottom: 0;">Jenis Kelamin :</label><br><select class="select-default" name="kelamin">
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
					</select></td>
					<td><label style="margin-bottom: 0;display:none;">Jumlah Buku :</label><br><input class="input-default" type="number" value="<?= $tampil['jumlah']; ?>" style="width: 20%;display:none;"/></td>
					<td><label style="margin-bottom: 0;display:none;">Jumlah Buku :</label><br><input class="input-default" type="number" value="<?= $tampil['jumlah']; ?>" style="width: 20%;display:none;"/></td>
					<td colspan="6">
						<div style="text-align: right; margin-top: 25px;">
							<input class="btn-edit" type="submit" name="simpan" value="Simpan" />
							<input class="btn-edit" type="submit" name="cancel" value="Batal" />
							<input class="btn-edit" type="reset" name="reset" value="Reset" />
						</div>
					</td>	
				</tr>
			</table>

			
		</form>
	</div>
</div>

<?php
	$nrp 		= @$_POST['nrp'];
	$nama 		= @$_POST['nama'];
	$alamat 	= @$_POST['alamat'];
	$prodi 		= @$_POST['prodi'];
	$kelamin 	= @$_POST['kelamin'];
	$simpan 	= @$_POST['simpan'];
	$cancel 	= @$_POST['cancel'];
	$reset		= @$_POST['reset'];
	
	if($simpan){
		$sql = $koneksi->query("INSERT INTO anggota (nrp, nama, alamat, prodi, kelamin) VALUES ('$nrp', '$nama', '$alamat', '$prodi', '$kelamin')");
		
		if($sql){
			?>
			<script type="text/javascript">
				alert("Data berhasil disimpan!");
				window.location.href="?page=anggota";
			</script>
			<?php
		}
	} elseif($cancel){
		?>
		<script type="text/javascript">
			window.location.href="?page=anggota";
		</script>
		<?php
	}
?>