<?php 
	$id 	= @$_GET['id'];
	$sql 	= $koneksi->query("SELECT * FROM anggota WHERE id='$id'");
	$tampil = $sql->fetch_assoc();
?>

<div class="container">
	<div class="row" style="text-align: left">
		<h1 style="text-transform: uppercase; text-align: center">Formulir Pengubahan Data Anggota</h1><br>
		<form method="POST">
			<table cellspacing="0" width="100%" style="text-align: left">
				<tr>
					<td><label style="margin-bottom: 0;">NRP :</label><br><input class="input-default" type="text" value="<?= $tampil['nrp']; ?>" style="cursor: not-allowed;" disabled /></td>
					<td colspan="4"><label style="margin-bottom: 0;">Nama Lengkap :</label><br><input class="input-default" type="text" name="nama" value="<?= $tampil['nama']; ?>" /></td>
				</tr>

				<tr>
					<td colspan="5"><label style="margin-bottom: 0;">Alamat :</label><br><textarea class="input-default" type="text" name="alamat" style="height: 180px"><?= $tampil['alamat']; ?></textarea></td>
				</tr>

				<tr>
					<td><label style="margin-bottom: 0;">Program Studi :</label><br><select class="select-default" style="cursor: not-allowed;" disabled>
						<?php
							echo '<option value="'.$tampil['prodi'].'" selected>'.$tampil['prodi'].'</option>';
						?>
					</select></td>
					<td><label style="margin-bottom: 0;">Jenis Kelamin :</label><br><select class="select-default" name="kelamin">
						<?php
							if($tampil['kelamin'] == "L"){
								echo '<option value="L" selected>Laki-Laki</option>';
								echo '<option value="P" >Perempuan</option>';
							} elseif($tampil['kelamin'] == "P") {
								echo '<option value="L" >Laki-Laki</option>';
								echo '<option value="P" selected>Perempuan</option>';
							}
						?>
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
	$nama 		= @$_POST['nama'];
	$kelamin 	= @$_POST['kelamin'];
	$alamat 	= @$_POST['alamat'];
	$simpan 	= @$_POST['simpan'];
	$cancel 	= @$_POST['cancel'];
	$reset		= @$_POST['reset'];
	
	if($simpan){
		$sql = $koneksi->query("UPDATE anggota SET nama='$nama', kelamin='$kelamin', alamat='$alamat' WHERE id='$id'");
		
		if($sql){
			?>
			<script type="text/javascript">
				alert("Perubahan berhasil disimpan!");
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