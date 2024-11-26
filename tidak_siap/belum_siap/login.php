<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek di tabel mahasiswa
    $sql_mahasiswa = "SELECT * FROM mahasiswa WHERE email = '$email' AND password = '$password'";
    $result_mahasiswa = $conn->query($sql_mahasiswa);

    if ($result_mahasiswa->num_rows > 0) {
        // Data mahasiswa ditemukan, set session dan arahkan ke dashboard mahasiswa
        $user_data = $result_mahasiswa->fetch_assoc();
        $_SESSION['user_type'] = 'mahasiswa';
        $_SESSION['user_email'] = $email;
        $_SESSION['user_nim'] = $user_data['nim']; // Menyimpan NIM sebagai ID
        header("Location: dashboard_mahasiswa.php");
        exit();
    }

    // Cek di tabel dosen
    $sql_dosen = "SELECT * FROM dosen WHERE email = '$email' AND password = '$password'";
    $result_dosen = $conn->query($sql_dosen);

    if ($result_dosen->num_rows > 0) {
        // Data dosen ditemukan, set session dan arahkan ke dashboard dosen
        $user_data = $result_dosen->fetch_assoc();
        $_SESSION['user_type'] = 'dosen';
        $_SESSION['user_email'] = $email;
        $_SESSION['user_nip'] = $user_data['nip']; // Menyimpan NIP sebagai ID
        header("Location: dashboard_dosen.php");
        exit();
    }

    // Jika email dan password tidak ditemukan
    echo "<script>alert('Email atau password salah!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
}
?>
