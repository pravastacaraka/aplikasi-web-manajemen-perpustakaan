<?php 
	$id 	= @$_GET['id'];
	$sql 	= $koneksi->query("SELECT * FROM buku WHERE id='$id'");
	$tampil = $sql->fetch_assoc();
?>

<div class="container">
	<div class="row">
		<h1 style="text-transform: uppercase; margin: 10px 0 0 0; font-family: Verdana">Informasi Buku<br><h1 style="text-transform: uppercase; margin: 0; font-family: Verdana; font-size: 24px">"<?= $tampil['judul']; ?>"</h1></h1><br><br>

		<form method="post">
		<table cellspacing="0" width="70%" align="center" style="text-align: left">
			<tr class="baris-data" style="border-top: 0">
				<td rowspan="10" style="background-color: #f4f4f4; text-align: center; width: 40%; border: 1px solid #f4f4f4; font-weight: 600">NO IMAGE</td>
				<td style="width: 15%">Judul</td>
				<td style="width: 10px">:</td>
				<td><?= $tampil['judul']; ?></td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Kode Buku</td>
				<td style="width: 10px">:</td>
				<td><?= $tampil['id']; ?></td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Kode ISBN</td>
				<td style="width: 10px">:</td>
				<td>-</td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Pengarang</td>
				<td style="width: 10px">:</td>
				<td><?= $tampil['pengarang']; ?></td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Penerbit</td>
				<td style="width: 10px">:</td>
				<td><?= $tampil['penerbit']; ?></td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Tahun Terbit</td>
				<td style="width: 10px">:</td>
				<td><?= $tampil['tahun']; ?></td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Sinopsis</td>
				<td style="width: 10px">:</td>
				<td>-</td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Lokasi Rak</td>
				<td style="width: 10px">:</td>
				<td><?= $tampil['lokasi']; ?></td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Jumlah Buku</td>
				<td style="width: 10px">:</td>
				<td><?= $tampil['jumlah']; ?></td>
			</tr>
			<tr class="baris-data">
				<td style="width: 15%">Status Buku</td>
				<td style="width: 10px">:</td>
				<td>
					<?php 
					if($tampil['jumlah'] > 0)
						echo '<div style="color: green">Ada</div>';
					else
						echo '<div style="color: red">Dipinjam</div>';
					?>
				</td>
			</tr>

			<tr>
				<td colspan="4" style="text-align: center">
				<?php 
					if($tampil['jumlah'] > 0){
				?>
				<br>
				<input class="btn-edit" type="submit" value="Pinjam Buku" name="pinjam"  title="Mau Pinjam Buku?" />
				<?php 
					$pinjam = @$_POST['pinjam'];

					if($pinjam){
				?>
						<script type="text/javascript">
							alert("Silahkan login terlebih dulu sebelum klik pinjam!");
							window.location.href="?page=buku&action=detail&id=<?= $tampil['id']; ?>";
						</script>
				<?php
					}
					}	
				?>
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>