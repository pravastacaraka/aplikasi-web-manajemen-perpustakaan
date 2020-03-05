<?php include "../../koneksi.php" ?>
<?php 
	$id 	= @$_GET['id'];
	$sql 	= $koneksi->query("select * from buku where id='$id'");
	$tampil = $sql->fetch_assoc();
	$tampil_tahun = $tampil['tahun'];
?>	
<html>
<head>
	<title>Ubah Data Buku | Perpustakaan Online</title>
	
	<link rel="stylesheet" type="text/css" href="../../css/style2.css"/>
<style>
#main {
	margin: 0 150px;
	text-align: left;
}
table, th, td {
	border: 1px solid #000;
	padding: 8px
}
</style>	
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
			<li class="navbar-left"><a href="daftar_buku.php" style="border-right: 1px solid #0a3363">Daftar Buku</a></li>
			<li class="navbar-left"><a href="../report/daftar_peminjaman.php">Daftar Peminjaman</a></li>
			<li class="navbar-right"><a href="../report/daftar_peminjaman.php">Masuk</a></li>
		</ul>
			
		<div id="main">
			<br><h1 style="text-transform: uppercase; text-align: center">Formulir Pengubahan Data Buku</h1><br>
			<form method="POST">
				<label>Judul Buku :</label><br>
				<input class="input-default" type="text" name="judul" value="<?= $tampil['judul']; ?>" />
				
				<label>Nama Pengarang :</label><br>
				<input class="input-default" type="text" name="pengarang" value="<?= $tampil['pengarang']; ?>" />
				
				<label>Penerbit :</label><br>
				<input class="input-default" type="text" name="penerbit" value="<?= $tampil['penerbit']; ?>" />

				<label>Sinopsis :</label><br>
				<input class="input-default" type="text" name="sinopsis" value="<?= $tampil['sinopsis']; ?>" />

				<label>Lokasi Rak :</label><br>
				<input class="input-default" type="text" name="lokasi" value="<?= $tampil['lokasi']; ?>" />
				
				<label>Jumlah Buku :</label><br>
				<input class="input-default" type="number" name="jumlah" value="<?= $tampil['jumlah']; ?>" />
				
				<label>Tahun Terbit :</label><br>
				<select name="tahun" style="width: 20%">
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
				</select>
				<br><br><br>
				<div class="button" style="text-align: center">
					<input type="submit" name="simpan" value="Simpan" />
					<input type="submit" name="cancel" value="Batal" />
					<input type="reset" name="reset" value="Reset" />
				</div>
			</form>
			<br>
		</div>
		
		<div id="footer">
			Created by Pravasta Caraka ©2018 - All Rights Reserved
		</div>
	</div>
</body>
</html>

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
				window.location.href="daftar_buku.php";
			</script>
			<?php
		}
	} elseif($cancel){
		?>
		<script type="text/javascript">
			window.location.href="daftar_buku.php";
		</script>
		<?php
	}
?>