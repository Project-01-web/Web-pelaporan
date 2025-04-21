<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $nama_db = "layanan_pengaduan"; 
  $koneksi = mysqli_connect($host, $user, $pass, $nama_db);

  // Cek apakah koneksi berhasil
  if (!$koneksi) {
      die("Koneksi ke database gagal: " . mysqli_connect_error());
  }
?>