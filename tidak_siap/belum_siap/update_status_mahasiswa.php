<?php
include('db.php');

// Pastikan data POST tersedia
if (!isset($_POST['status']) || !isset($_POST['nim'])) {
    echo "Data tidak valid.";
    exit();
}

$status = $_POST['status'];
$nim = $_POST['nim'];

// Update status mahasiswa di database
$sql_update = "UPDATE mahasiswa SET status = '$status' WHERE nim = '$nim'";
if ($conn->query($sql_update) === TRUE) {
    echo "Status berhasil diubah menjadi $status.";
} else {
    echo "Gagal mengubah status: " . $conn->error;
}
?>
