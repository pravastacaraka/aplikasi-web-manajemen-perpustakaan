<div class="container">
	<div class="row">
		<h1 style="text-transform: uppercase; text-align: center">Formulir Penambahan Buku</h1><br>
		<form method="POST">
			<table cellspacing="0" width="100%" style="text-align: left">
				<tr>
					<td colspan="3">
						<label style="margin-bottom: 0;">Judul Buku :</label><br>
						<input class="input-default" type="text" name="judul" placeholder="Judul Buku" >
						<!--<span class="error">* <?php echo $judulErr; ?></span>-->
					</td>
				</tr>

				<tr>
					<td colspan="3">
						<label style="margin-bottom: 0;">Nama Pengarang :</label><br>
						<input class="input-default" type="text" name="pengarang" placeholder="Nama Pengarang" >
					</td>
				</tr>

				<tr>
					<td colspan="3">
						<label style="margin-bottom: 0;">Penerbit :</label><br>
						<input class="input-default" type="text" name="penerbit" placeholder="Penerbit" >
					</td>
				</tr>

				<tr>
					<td colspan="3">
						<label style="margin-bottom: 0;">Sinopsis :</label><br>
						<textarea class="input-default" style="max-width: 100%; max-height: 300px" placeholder="Sinopsis Isi Buku"></textarea>
					</td>
				</tr>

				<tr>
					<td>
						<label style="margin-bottom: 0;">Lokasi Rak :</label><br>
						<input class="input-default" type="text" name="lokasi" placeholder="Lokasi Rak" >
					</td>
					<td>
						<label style="margin-bottom: 0;">Jumlah Buku :</label><br>
						<input class="input-default" type="number" name="jumlah" placeholder="Jumlah Buku" >
					</td>
					<td>
						<label style="margin-bottom: 0;">Tahun Terbit :</label><br>
						<select class="select-default" name="tahun">
							<?php
								$tahun = date("Y");
								for($i=$tahun; $i>=$tahun-35; $i--){
									echo '<option value="'.$i.'">'.$i.'</option>';
								}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="3" style="text-align: center">
						<input class="btn-edit" type="submit" name="simpan" value="Simpan" />
						<input class="btn-edit" type="submit" name="cancel" value="Batal" />
						<input class="btn-edit" type="reset" name="reset" value="Reset" />
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
	$jumlah		= @$_POST['jumlah'];
	$simpan 	= @$_POST['simpan'];
	$cancel		= @$_POST['cancel'];

	//if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//if (empty($judul)) {
			//$judulErr = "Name is required";
		//}
	//}
		
	if($simpan){
		$sql = $koneksi->query("insert into buku (judul, pengarang, penerbit, lokasi, tahun, jumlah) values ('$judul', '$pengarang', '$penerbit', 'lokasi', '$tahun', '$jumlah')");
		
		if($sql){
			?>
			<script type="text/javascript">
				alert("Data berhasil disimpan!");
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