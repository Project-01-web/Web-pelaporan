<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="gambar/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .sidebar { height: 100vh; width: 250px; position: fixed; background: #343a40; color: white; padding-top: 20px; }
        .sidebar a { color: white; padding: 15px; display: block; text-decoration: none; }
        .sidebar a:hover { background: #495057; }
        .content { margin-left: 260px; padding: 20px; }
    </style>
</head>
<body class="bg-light">
    <div class="sidebar">
        <h4 class="text-center">Dashboard</h4>
        <a href="index.php?page=dashboard"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="profile.php"><i class="bi bi-person"></i> Profile</a>
        <a href="index.php?page=laporan"><i class="bi bi-card-list"></i> Laporan</a>
        <a href="logout.php" class="text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <div class="content">
        <?php
        if (isset($_GET['page']) && $_GET['page'] == 'laporan') {
            include 'laporan.php';
        } else {
            echo "<h2>Selamat Datang, $username!</h2>";
            echo "<p>Pilih menu di sebelah kiri untuk navigasi.</p>";
        }
        ?>
    </div>
</body>
</html>
