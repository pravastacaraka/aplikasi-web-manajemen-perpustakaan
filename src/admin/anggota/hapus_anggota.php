<?php 

	$id = @$_GET['id'];
	
	$koneksi->query("DELETE FROM anggota WHERE id='$id'");

?>

<script type="text/javascript">
	window.location.href="?page=anggota";
	alert('Data berhasil dihapus!')
</script>