<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login dan adalah dosen wali
if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] != 'dosen' ) {
    header("Location: index.php");
    exit();
}

// Ambil data dosen yang login
$email = $_SESSION['user_email'];
$sql = "SELECT * FROM dosen WHERE email = '$email'";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();

// Ambil NIP dosen wali yang login
$nip = $user_data['nip'];

// Query untuk mengambil data mahasiswa yang dibimbing oleh dosen wali
$sql_mahasiswa = "
    SELECT m.nama, m.nim, m.semester, m.status 
    FROM mahasiswa AS m JOIN dosen AS dw ON m.dosen_wali = dw.nip 
    WHERE dw.nip = '$nip'
";
$result_mahasiswa = $conn->query($sql_mahasiswa);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Dosen Wali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Dosen Wali</a>
            <div class="d-flex">
                <!-- Tombol logout -->
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Mahasiswa yang Dibimbing oleh <?php echo $user_data['nama']; ?></h3>
        
        <!-- Tabel Mahasiswa yang Dibimbing -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Semester</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_mahasiswa->num_rows > 0) : ?>
                        <?php while ($row = $result_mahasiswa->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['nim']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada mahasiswa yang dibimbing.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
