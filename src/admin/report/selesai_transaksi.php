<?php 

	$id = @$_GET['id'];
	$judul = @$_GET['judul'];
	
	$sql = $koneksi->query("UPDATE report SET status='Selesai' WHERE id='$id'");
	$sql = $koneksi->query("UPDATE buku SET jumlah=(jumlah+1) WHERE judul='$judul'");

?>
	<script type="text/javascript">
		alert("Transaksi berhasil diselesaikan!");
		window.location.href="?page=transaksi";
	</script>