<?php 

	$id = @$_GET['id'];
	$judul = @$_GET['judul'];
	$tgl_kembali = @$_GET['tgl_kembali'];

	// Memisahkan tanggal dan menambahkan hari
	$kembali = strtotime($tgl_kembali);
	$hasil = date('d-m-Y', strtotime('+7 day', $kembali));

	$sql = $koneksi->query("UPDATE report SET tgl_kembali='$hasil' WHERE id='$id'");
	if($sql) {

?>

	<script type="text/javascript">
		alert("Perpanjangan berhasil!");
		window.location.href="?page=transaksi";	
	</script>

<?php
	} else {
?>

	<script type="text/javascript">
		alert("Perpanjangan gagal, Silahkan ulangi lagi!");
		window.location.href="?page=transaksi";	
	</script>

<?php
	}
?>