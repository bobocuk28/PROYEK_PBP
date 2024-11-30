<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login dan memiliki akses sebagai akademik
if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] != 'akademik') {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['user_email'];
$sql = "SELECT * FROM akademik WHERE email = '$email'";
$result = $conn->query($sql);
$akademik_data = $result->fetch_assoc();

// Ambil nama fakultas berdasarkan id_fakultas yang ada pada data akademik
$id_fakultas = $akademik_data['id_fakultas'];
$sql_fakultas = "SELECT nama_fakultas FROM fakultas WHERE id_fakultas = '$id_fakultas'";
$result_fakultas = $conn->query($sql_fakultas);
$fakultas_data = $result_fakultas->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Akademik</a>
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
                        <h4 class="card-title text-center"><?php echo $akademik_data['nama']; ?></h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>NIP:</strong> <?php echo $akademik_data['nip']; ?></li>
                            <li class="list-group-item"><strong>Nama:</strong> <?php echo $akademik_data['nama']; ?></li>
                            <li class="list-group-item"><strong>Fakultas:</strong> <?php echo isset($fakultas_data['nama_fakultas']) ? $fakultas_data['nama_fakultas'] : 'Tidak tersedia'; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol untuk navigasi -->
        <div class="mt-4 text-center">
            <a href="input_ruangan.php" class="btn btn-primary">Manajemen Ruangan</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
