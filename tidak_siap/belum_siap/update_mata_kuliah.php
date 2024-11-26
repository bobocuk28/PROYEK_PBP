<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
    $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
    $semester = $_POST['semester'];
    $nama_dosen = $_POST['nama_dosen'];

    // Update query
    $query = "
        UPDATE mata_kuliah mk
        JOIN mata_kuliah_dosen mkd ON mk.kode_mata_kuliah = mkd.kode_mata_kuliah
        JOIN dosen d ON mkd.nip = d.nip
        SET mk.nama_mata_kuliah = '$nama_mata_kuliah', 
            mk.semester = '$semester', 
            d.nama_dosen = '$nama_dosen'
        WHERE mk.kode_mata_kuliah = '$kode_mata_kuliah'
    ";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='management_mata_kuliah.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
