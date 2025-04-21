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
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .sidebar { height: 100vh; width: 250px; position: fixed; background: #343a40; color: white; padding-top: 20px; }
        .sidebar a { color: white; padding: 15px; display: block; text-decoration: none; }
        .sidebar a:hover { background: #495057; }
        .content { margin-left: 260px; padding: 20px; }
        .card { background: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); }
        .table thead { background: #007bff; color: white; }
        .pengaduan-text { max-width: 300px; word-wrap: break-word; white-space: pre-wrap; overflow: hidden; text-overflow: ellipsis; }
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
        <?php
        if (isset($_GET['page']) && $_GET['page'] == 'laporan') {
            echo '<div class="container card mt-5 p-5">';
            echo '<h2 class="text-center m-5 text-primary">Data Pengaduan</h2>';
            echo '<a class="btn btn-success mb-3 border-0" href="tambah.php"><i class="bi bi-pencil-square"></i> Tulis Pengaduan</a>';
            echo '<table class="table table-striped table-hover">';
            echo '<thead><tr><th>No</th><th>Tanggal Pengaduan</th><th>Laporan</th><th>Bukti</th><th>Action</th></tr></thead><tbody>';
            $query = "SELECT * FROM laporan ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $row['tgl'] . '</td>';
                echo '<td class="pengaduan-text" title="' . htmlspecialchars($row['pengaduan']) . '">' . htmlspecialchars(substr($row['pengaduan'], 0, 100)) . '...</td>';
                echo '<td><img class="rounded m-1" src="gambar/' . $row['bukti'] . '" width=100></td>';
                echo '<td>';
                echo '<a class="btn btn-warning mt-3" href="haledit.php?id=' . $row['id'] . '"><i class="bi bi-pencil-square"></i></a> ';
                echo '<a class="btn btn-danger mt-3" href="hapus.php?id=' . $row['id'] . '"><i class="bi bi-trash"></i></a>';
                echo '</td></tr>';
                $no++;
            }
            echo '</tbody></table></div>';
        } else {
            echo "<h2>Selamat Datang, $username!</h2>";
        
            if ($username == 'admin') {
                // Untuk admin: tampilkan jumlah total laporan
                $total = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM laporan");
                $data = mysqli_fetch_assoc($total);
                echo "<div class='card p-4 mt-4'>";
                echo "<h4>Total Laporan Masuk: <span class='text-primary'>" . $data['jumlah'] . "</span></h4>";
                echo "</div>";
            } else {
                // Untuk pegawai: tampilkan laporan milik sendiri + status
                echo "<div class='container card mt-4 p-4'>";
                echo "<h4 class='mb-4 text-primary'>Laporan Anda</h4>";
                echo "<table class='table table-striped'>";
                echo "<thead><tr><th>No</th><th>Tanggal</th><th>Pengaduan</th><th>Status</th></tr></thead><tbody>";
        
                $query = "SELECT * FROM laporan WHERE username = '$username' ORDER BY id DESC";
                $result = mysqli_query($koneksi, $query);
                $no = 1;
        
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>" . htmlspecialchars($row['tgl']) . "</td>";
                    echo "<td class='pengaduan-text' title='" . htmlspecialchars($row['pengaduan']) . "'>" . htmlspecialchars(substr($row['pengaduan'], 0, 50)) . "...</td>";
                    echo "<td>";
                    if ($row['status'] == 'selesai') {
                        echo "<span class='badge bg-success'>Selesai</span>";
                    } elseif ($row['status'] == 'ditolak') {
                        echo "<span class='badge bg-danger'>Ditolak</span>";
                    } else {
                        echo "<span class='badge bg-warning text-dark'>Proses</span>";
                    }
                    echo "</td></tr>";
                    $no++;
                }
        
                echo "</tbody></table></div>";
            }
        }
        ?>
    </div>
</body>
</html>
