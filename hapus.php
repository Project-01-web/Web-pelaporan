<?php
session_start(); // Mulai session untuk menyimpan notifikasi
include 'koneksi.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Jalankan query DELETE
    $query = "DELETE FROM laporan WHERE id='$id'";
    $hasil_query = mysqli_query($koneksi, $query);

    if ($hasil_query) {
        $_SESSION['notif'] = "Laporan berhasil dihapus!";
        $_SESSION['notif_type'] = "success";
    } else {
        $_SESSION['notif'] = "Gagal menghapus laporan!";
        $_SESSION['notif_type'] = "danger";
    }
}

// Redirect kembali ke halaman sebelumnya
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
