<?php
session_start();
include('db.php');

// Pastikan hanya dosen dengan role ketua_prodi yang bisa mengakses halaman ini
if ($_SESSION['user_type'] != 'dosen' || $_SESSION['role'] != 'ketua_prodi') {
    header("Location: index.php");
    exit();
}

// Proses untuk mengajukan semua jadwal yang belum disetujui
$sql_update_all = "UPDATE jadwal_kuliah SET status = 'terajukan' WHERE status = 'belum disetujui' AND id_prodi = ".$_SESSION['user_prodi'];
if ($conn->query($sql_update_all) === TRUE) {
    echo "<script>alert('Semua jadwal berhasil diajukan');</script>";
    echo "<script>window.location.href = 'manajemen_jadwal.php';</script>";
} else {
    echo "Error: " . $sql_update_all . "<br>" . $conn->error;
}
?>
