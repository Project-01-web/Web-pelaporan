<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl = mysqli_real_escape_string($koneksi, $_POST['tgl']);
    $pengaduan = mysqli_real_escape_string($koneksi, $_POST['pengaduan']);

    // Cek apakah file diunggah
    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] == 0) {
        $bukti = $_FILES['bukti']['name'];
        $tmp_name = $_FILES['bukti']['tmp_name'];
        $file_size = $_FILES['bukti']['size'];
        $file_ext = strtolower(pathinfo($bukti, PATHINFO_EXTENSION));

        // Validasi jenis file
        $allowed_ext = ['jpg', 'jpeg', 'png', 'pdf'];
        if (!in_array($file_ext, $allowed_ext)) {
            echo "<script>alert('Format file tidak didukung! Hanya JPG, JPEG, PNG, PDF.'); window.history.back();</script>";
            exit();
        }

        // Batasi ukuran file (maks 2MB)
        if ($file_size > 2 * 1024 * 1024) {
            echo "<script>alert('Ukuran file terlalu besar! Maksimal 2MB.'); window.history.back();</script>";
            exit();
        }

        // Gunakan nama unik untuk file
        $new_filename = uniqid() . "." . $file_ext;
        $target_dir = "gambar/";
        $bukti_path = $target_dir . $new_filename;

        if (move_uploaded_file($tmp_name, $bukti_path)) {
            // Simpan ke database
            $query = "INSERT INTO laporan (tgl, pengaduan, bukti) VALUES ('$tgl', '$pengaduan', '$new_filename')";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                echo "<script>alert('Laporan pengaduan berhasil ditambahkan!'); window.location='index.php?page=laporan';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan laporan pengaduan!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload bukti!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Harap unggah bukti pengaduan!'); window.history.back();</script>";
    }
}
?>
