<?php 
	$id 	= @$_GET['id'];
	$sql 	= $koneksi->query("select * from buku where id='$id'");
	$tampil = $sql->fetch_assoc();
	$tampil_tahun = $tampil['tahun'];
?>

<div class="container">
	<div class="row" style="text-align: left">
		<h1 style="text-transform: uppercase; text-align: center">Formulir Pengubahan Data Buku</h1><br>
		<form method="POST">
			<table cellspacing="0" width="100%" style="text-align: left">
				<tr>
					<td colspan="3"><label style="margin-bottom: 0;">Judul Buku :</label><br><input class="input-default" type="text" name="judul" value="<?= $tampil['judul']; ?>" /></td>
					<td colspan="3"><label style="margin-bottom: 0;">Nama Pengarang :</label><br><input class="input-default" type="text" name="pengarang" value="<?= $tampil['pengarang']; ?>" /></td>
				</tr>

				<tr>
					<td colspan="5"><label style="margin-bottom: 0;">Penerbit :</label><br><input class="input-default" type="text" name="penerbit" value="<?= $tampil['penerbit']; ?>" /></td>
					<td><label style="margin-bottom: 0;">Lokasi Rak :</label><br><input class="input-default" type="text" name="lokasi" value="<?= $tampil['lokasi']; ?>" /></td>
				</tr>

				<tr>
					<td colspan="6"><label style="margin-bottom: 0;">Sinopsis :</label><br><textarea class="input-default" type="text" style="height: 180px"><?php echo '-'; ?></textarea></td>
				</tr>

				<tr>
					<td><label style="margin-bottom: 0;">Jumlah Buku :</label><br><input class="input-default" type="number" name="jumlah" value="<?= $tampil['jumlah']; ?>" /></td>
					<td><label style="margin-bottom: 0;">Tahun Terbit :</label><br><select class="select-default" name="tahun">
						<?php
							$tahun = date("Y");
							for($i=$tahun; $i>=$tahun-35; $i--){
								if($i==$tampil_tahun){
									echo '<option value="'.$i.'" selected>'.$i.'</option>';
								} else {
									echo '<option value="'.$i.'">'.$i.'</option>';
								}
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
	$judul 		= @$_POST['judul'];
	$pengarang 	= @$_POST['pengarang'];
	$penerbit 	= @$_POST['penerbit'];
	$lokasi 	= @$_POST['lokasi'];
	$sinopsis 	= @$_POST['sinopsis'];
	$tahun 		= @$_POST['tahun'];
	$jumlah 	= @$_POST['jumlah'];
	$simpan 	= @$_POST['simpan'];
	$cancel 	= @$_POST['cancel'];
	$reset		= @$_POST['reset'];
	
	if($simpan){
		$sql = $koneksi->query("update buku set judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun='$tahun', jumlah='$jumlah' where id='$id'");
		
		if($sql){
			?>
			<script type="text/javascript">
				alert("Perubahan berhasil disimpan!");
				window.location.href="?page=buku";
			</script>
			<?php
		}
	} elseif($cancel){
		?>
		<script type="text/javascript">
			window.location.href="?page=buku";
		</script>
		<?php
	}
?>