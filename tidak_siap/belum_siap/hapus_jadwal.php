<?php
session_start();
include('db.php');

// Pastikan hanya dosen dengan role ketua_prodi yang bisa mengakses halaman ini
if ($_SESSION['user_type'] != 'dosen' || $_SESSION['role'] != 'ketua_prodi') {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id_jadwal'])) {
    $id_jadwal = $_GET['id_jadwal'];

    // Hapus jadwal
    $sql_delete = "DELETE FROM jadwal_kuliah WHERE id_jadwal = $id_jadwal";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<script>alert('Jadwal berhasil dihapus');</script>";
        echo "<script>window.location.href = 'manajemen_jadwal.php';</script>";
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
}
?>
