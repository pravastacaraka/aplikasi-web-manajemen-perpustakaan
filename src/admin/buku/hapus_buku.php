<?php 

	$id = @$_GET['id'];
	
	$koneksi->query("DELETE FROM buku WHERE id='$id'");

?>

<script type="text/javascript">
	window.location.href="?page=buku";
	alert('Data berhasil dihapus!')
</script>