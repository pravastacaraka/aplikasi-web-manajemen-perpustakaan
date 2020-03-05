<?php 

session_start();
session_destroy(); // Hapus session yang tersimpan
 
header('location:index.php'); // Kembali kehome
exit();

?>