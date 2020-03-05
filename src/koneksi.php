<?php
	
	$url    = 'http://localhost/projectkuliah';
	$koneksi = new mysqli("localhost","root","","projectkuliah");
	
	if($koneksi->connect_error)
	{
	    die( 'Oops!! Koneksi Gagal : '. $koneksi->connect_error );
	}
 
	$url = rtrim($url,'/');

?>