<?php
$servername = "localhost:3307"; // Ganti dengan server Anda
$username = "root";        // Ganti dengan username database Anda
$password = "";            // Ganti dengan password database Anda
$dbname = "tidak_siap_db"; // Nama database

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
