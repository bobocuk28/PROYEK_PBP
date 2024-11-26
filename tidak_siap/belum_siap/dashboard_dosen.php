<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login dan memiliki status yang valid
if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] != 'dosen') {
    header("Location: index.php");
    exit();
}

// Ambil data dosen berdasarkan email yang ada di session
$email = $_SESSION['user_email'];
$sql = "SELECT * FROM dosen WHERE email = '$email'";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();

// Ambil status jabatan dari data dosen
$status_jabatan = $user_data['status_jabatan']; // status_jabatan bisa berupa dosen, dosen wali, ketua program studi, dekan
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Dosen</a>
            <div class="d-flex">
                <!-- Tombol logout -->
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?php echo $user_data['nama']; ?></h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Email:</strong> <?php echo $user_data['email']; ?></li>
                            <li class="list-group-item"><strong>NIP:</strong> <?php echo $user_data['nip']; ?></li>
                            <li class="list-group-item"><strong>Alamat:</strong> <?php echo $user_data['alamat']; ?></li>
                            <li class="list-group-item"><strong>No Telpon:</strong> <?php echo $user_data['no_telpon']; ?></li>
                            <li class="list-group-item"><strong>Jabatan:</strong> <?php echo $user_data['status_jabatan']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Berdasarkan Jabatan -->
        <div class="mt-4 text-center">
            <?php if ($status_jabatan == 'ketua program studi') : ?>
                <a href="management_mata_kuliah.php" class="btn btn-primary">Management Mata Kuliah</a>
            <?php elseif ($status_jabatan == 'dosen' || $status_jabatan == 'dosen wali') : ?>
                <a href="jadwal_mata_kuliah_dosen.php" class="btn btn-primary">Jadwal Mata Kuliah Dosen</a>
            <?php endif; ?>
            
            <?php if ($status_jabatan == 'dosen wali') : ?>
                <a href="mahasiswa_dosen_wali.php" class="btn btn-secondary">Mahasiswa Dosen Wali</a>
            <?php endif; ?>
            
            <?php if ($status_jabatan == 'dekan') : ?>
                <a href="persetujuan_ruangan.php" class="btn btn-success">Persetujuan Ruangan</a>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
