<?php include "../../koneksi.php" ?>
<?php $judulErr = $pengarangErr = $penerbitErr = $tahunErr = ""; ?>
		
<html>
<head>
	<title>Tambah Buku | Manajemen Online</title>
	
	<link rel="stylesheet" type="text/css" href="../../css/style2.css"/>
<style>
#main {
	margin: 0 150px;
	text-align: left;
}
</style>	
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div class="header-title">
				PUSAT MANAJEMEN ONLINE PENS<br>
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
			<br><h1 style="text-transform: uppercase; text-align: center">Formulir Penambahan Buku</h1><br>
			<form method="POST">
				<label>Judul Buku :</label><br>
				<input class="input-default" type="text" name="judul" placeholder="Judul Buku" ><br>
				<!--<span class="error">* <?php echo $judulErr; ?></span>-->
				
				<label>Nama Pengarang :</label><br>
				<input class="input-default" type="text" name="pengarang" placeholder="Nama Pengarang" ><br>
				
				<label>Penerbit :</label><br>
				<input class="input-default" type="text" name="penerbit" placeholder="Penerbit" ><br>

				<label>Sinopsis :</label><br>
				<textarea class="input-default" style="max-width: 100%; max-height: 100px" name="sinopsis" placeholder="Sinopsis Isi Buku"></textarea><br>
				
				<label>Jumlah Buku :</label><br>
				<input class="input-default" type="number" name="jumlah" placeholder="Jumlah Buku" ><br>

				<label>Lokasi Rak :</label><br>
				<input class="input-default" type="text" name="lokasi" placeholder="Lokasi Rak" ><br>

				<label>Tahun Terbit :</label><br>
				<select name="tahun" style="width: 20%">
					<?php
						$tahun = date("Y");
						for($i=$tahun; $i>=$tahun-35; $i--){
							echo '<option value="'.$i.'">'.$i.'</option>';
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
	$jumlah		= @$_POST['jumlah'];
	$simpan 	= @$_POST['simpan'];
	$cancel		= @$_POST['cancel'];

	//if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($judul)) {
			$judulErr = "Name is required";
		}
	//}
		
	if($simpan){
		$sql = $koneksi->query("insert into buku (judul, pengarang, penerbit, lokasi, sinopsis, tahun, jumlah) values ('$judul', '$pengarang', '$penerbit', 'lokasi', 'sinopsis', '$tahun', '$jumlah')");
		
		if($sql){
			?>
			<script type="text/javascript">
				alert("Data berhasil disimpan!");
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