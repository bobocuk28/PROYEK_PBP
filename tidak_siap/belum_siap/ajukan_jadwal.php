<?php
session_start();
include('db.php');

// Pastikan hanya dosen dengan role ketua_prodi yang bisa mengakses halaman ini
if ($_SESSION['user_type'] != 'dosen' || $_SESSION['role'] != 'ketua_prodi') {
    header("Location: index.php");
    exit();
}

// Proses untuk mengajukan jadwal
if (isset($_GET['id_jadwal'])) {
    $id_jadwal = $_GET['id_jadwal'];

    // Update status jadwal menjadi 'terajukan'
    $sql_update = "UPDATE jadwal_kuliah SET status = 'diajukan' WHERE id_jadwal = $id_jadwal";
    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Jadwal berhasil diajukan');</script>";
        echo "<script>window.location.href = 'manajemen_jadwal.php';</script>";
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}
?>
