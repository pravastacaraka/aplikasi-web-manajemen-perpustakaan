<?php

session_start();

if( !isset($_POST['username']) ) { header('location: index.php'); exit(); }

$error = '';
require 'koneksi.php'; // Menyisipkan file koneksi

$username = trim($_POST['username']);
$password = trim($_POST['password']);
 
if(strlen($username) < 2) {
    // Jika ada error dari kolom username yang kosong
    $error = 'Username tidak boleh kosong';
} elseif(strlen($password) < 2) {
    // Jika ada error dari kolom password yang kosong
    $error = 'Password tidak boleh kosong';
} else {
 
    // Escape String, ubah semua karakter ke bentuk string
    $username = $koneksi->escape_string($username);
    $password = $koneksi->escape_string($password);
 
    // Hash dengan md5
    $password = md5($password);

    // SQL command untuk memilih data berdasarkan parameter $username dan $password yang di inputkan
    $sql = "SELECT nama, level FROM users 
            WHERE username='$username' 
            AND password='$password' LIMIT 1";
 
    // Melakukan perintah
    $query = $koneksi->query($sql);

    // Check query
    if(!$query){
        die('Oops!! Database gagal '. $koneksi->error);
    } elseif($query->num_rows == 1) {    
        // Jika data yang dimaksud ada maka ditampilkan
        $row = $query->fetch_assoc();
        
        // Data nama disimpan di session browser
        $_SESSION['nama_user'] = $row['nama']; 
        $_SESSION['akses']     = $row['level'];
 
        if($row['level'] == 'admin')
        {
            // Data hak Admin di set
            $_SESSION['saya_admin'] = 'TRUE';
        }
 
        // Menuju halaman sesuai hak akses
        header('location:'.$url.'/'.$_SESSION['akses'].'/');
        exit();
 
    } else {
        
        // Jika data yang dimaksud tidak ada
        $error = 'Username dan Password Tidak ditemukan';
    }
 
}
 
if(!empty($error)) {
    # Simpan error pada session
    $_SESSION['error'] = $error;
    header('location:'.$url.'/index.php');
    exit();
}

/*if (isset($_POST['username'])) { // Check apakah ada pengiriman data
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = $koneksi->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

    if ($sql->num_rows > 0) { // Jika ada data user
        $row = $sql->fetch_assoc();
        $_SESSION['namaLog'] = $row['nama']; // Menyimpan nama yang login pada session
        header('location: admin/admin.php');

    } else { // Jika datanya tidak ada
        echo "<script>alert('Username & Password Salah !!!'); window.location.href='index.php'</script>";
    }
    exit();
}*/

?>