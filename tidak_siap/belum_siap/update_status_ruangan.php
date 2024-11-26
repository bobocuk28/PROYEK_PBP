<?php
include('db.php');

// Ambil data dari POST
$id = $_POST['id'];
$action = $_POST['action'];

// Validasi input
if (!$id || !$action) {
    echo "Data tidak valid.";
    exit();
}

// Tentukan status berdasarkan aksi
$status = ($action === 'approve') ? 'disetujui' : 'ditolak';

// Perbarui status di database
$sql_update = "UPDATE mata_kuliah_ruang SET status = '$status' WHERE id = '$id'";
if ($conn->query($sql_update) === TRUE) {
    echo "Status berhasil diperbarui menjadi $status.";
} else {
    echo "Gagal memperbarui status: " . $conn->error;
}
?>
