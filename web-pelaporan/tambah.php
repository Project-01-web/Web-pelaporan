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
    <title>Tambah Pengaduan</title>
    <link rel="icon" type="image/png" href="gambar/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .sidebar { height: 100vh; width: 250px; position: fixed; background: #343a40; color: white; padding-top: 20px; }
        .sidebar a { color: white; padding: 15px; display: block; text-decoration: none; }
        .sidebar a:hover { background: #495057; }
        .content { margin-left: 260px; padding: 20px; }
        .card { background: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); padding: 20px; }
        .form-control { border-radius: 5px; }
        .btn-primary { background-color: #007bff; border: none; }
        .btn-success { background-color: #28a745; border: none; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center">Dashboard</h4>
        <a href="index.php?page=dashboard"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="profile.php"><i class="bi bi-person"></i> Profile</a>
        <a href="index.php?page=laporan"><i class="bi bi-card-list"></i> Laporan</a>
        <a href="logout.php" class="text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <div class="content">
        <div class="container card">
            <h3 class="text-center text-primary">Tambah Pengaduan</h3>
            <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Tanggal Pengaduan</label>
                    <input class="form-control" type="text" name="tgl" value="<?php echo date('d/m/Y'); ?>" readonly />
                </div>
                <div class="mb-3">
                    <label class="form-label">Pengaduan</label>
                    <textarea class="form-control" name="pengaduan" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bukti</label>
                    <input class="form-control" type="file" name="bukti" required />
                </div>
                <div>
                    <button class="btn btn-success" type="submit">Simpan Pengaduan</button>
                    <a class="btn btn-primary" href="index.php?page=laporan">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
